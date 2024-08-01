<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\EmailService;
use App\Http\Requests\SendCustomEmailRequest;
use App\Http\Requests\StoreEmailSettingRequest;
use App\Http\Requests\UpdateEmailSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\SendingEmailList;
use App\Models\EmailSetting;

class EmailController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index()
    {
        return view('admin.emails.index');
    }

    public function confirmBooking(Request $request)
    {
        try {
            $user = $this->user();
            $bookingDetails = $this->bookingDetails();

            $this->emailService->sendBookingConfirmation($user, $bookingDetails);

            return response()->json(['status' => 'success', 'message' => 'Booking confirmation email sent successfully'], 200);
        } catch (Exception $e) {
            Log::error('Error sending booking confirmation email: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending booking confirmation email'], 500);
        }
    }

    public function cancelBooking(Request $request)
    {
        try {
            $user = $this->user();
            $bookingDetails = $this->bookingDetails();

            $this->emailService->sendBookingCancellation($user, $bookingDetails);

            return response()->json(['status' => 'success', 'message' => 'Booking cancellation email sent successfully'], 200);
        } catch (Exception $e) {
            Log::error('Error sending booking cancellation email: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending booking cancellation email'], 500);
        }
    }

    public function reminderBooking(Request $request)
    {
        try {
            $user = $this->user();
            $bookingDetails = $this->bookingDetails();

            $this->emailService->sendBookingReminder($user, $bookingDetails);

            return response()->json(['status' => 'success', 'message' => 'Booking reminder email sent successfully'], 200);
        } catch (Exception $e) {
            Log::error('Error sending booking reminder email: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending booking reminder email'], 500);
        }
    }

    public function feedback(Request $request)
    {
        try {
            $user = $this->user();
            $feedbackLink = 'http://example.com/feedback';

            $this->emailService->sendThankYouFeedback($user, $feedbackLink);

            return response()->json(['status' => 'success', 'message' => 'Thank you feedback email sent successfully'], 200);
        } catch (Exception $e) {
            Log::error('Error sending thank you feedback email: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending thank you feedback email'], 500);
        }
    }

    public function user() {
        return (object) [
            'name' => 'John Doe',
            'email' => 'test@gmail.com',
        ];
    }

    public function bookingDetails() {
        $pickupDateTime = Carbon::createFromFormat('Y-m-d H:i', '2021-12-01 10:00:00');

        return (object) [
            'pickupLocation' => 'Airport',
            'dropoffLocation' => 'Hotel',
            'pickupDateTime' => $pickupDateTime->format('l, F j, Y, g:i A'),
        ];
    }

    public function customEmail()
    {
        return view('admin.emails.custom-email');
    }

    public function sendCustomEmail(SendCustomEmailRequest $request)
    {
        try {
            $data = [
                'userName' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            $this->emailService->sendCustomEmail($data);
            return back()->with('success', 'Custom email sent successfully');
        } catch (Exception $e) {
            Log::error('Error sending custom email: ' . $e->getMessage());
            return back()->with('error', 'Error sending custom email');
        }
    }
    
    public function emailSettings()
    {
        $emailSettings = EmailSetting::paginate(10);
        return view('admin.email-settings.index', compact('emailSettings'));
    }

    public function createEmailSettings()
    {
        $sendingEmailList = SendingEmailList::orderBy('id', 'asc')->get();
        return view('admin.email-settings.create', compact('sendingEmailList'));
    }

    public function storeEmailSettings(StoreEmailSettingRequest $request)
    {
        try {
            $data = $request->all();
            $storingData = [
                'user_name' => $data['user_name'],
                'user_email' => $data['user_email'],
                'receiving_emails' => implode(',', $data['receiving_emails']),
            ];

            EmailSetting::create($storingData);
            return redirect()->route('admin.email-settings.index')->with('success', 'Email settings created successfully');
        } catch (Exception $e) {
            Log::error('Error creating email settings: ' . $e->getMessage());
            return back()->with('error', 'Error creating email settings');
        }
    }

    public function editEmailSettings($id)
    {
        $emailSetting = EmailSetting::find($id);
        $sendingEmailList = SendingEmailList::orderBy('id', 'asc')->get();
        return view('admin.email-settings.edit', compact('emailSetting', 'sendingEmailList'));
    }

    public function updateEmailSettings(UpdateEmailSettingRequest $request, $id)
    {
        try {
            $data = $request->all();
            $storingData = [
                'user_name' => $data['user_name'],
                'user_email' => $data['user_email'],
                'receiving_emails' => implode(',', $data['receiving_emails']),
            ];

            EmailSetting::find($id)->update($storingData);
            return redirect()->route('admin.email-settings.index')->with('success', 'Email settings updated successfully');
        } catch (Exception $e) {
            Log::error('Error updating email settings: ' . $e->getMessage());
            return back()->with('error', 'Error updating email settings');
        }
    }

    public function deleteEmailSettings($id)
    {
        try {
            EmailSetting::find($id)->delete();
            return redirect()->route('admin.email-settings.index')->with('success', 'Email settings deleted successfully');
        } catch (Exception $e) {
            Log::error('Error deleting email settings: ' . $e->getMessage());
            return back()->with('error', 'Error deleting email settings');
        }
    }
}
