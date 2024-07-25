<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRefundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|in:0,1,2,3',
            'amount' => 'required_if:status,3', // amount required if status is 3 = refunded
            'admin_message' => 'required',
        ];
    }
}
