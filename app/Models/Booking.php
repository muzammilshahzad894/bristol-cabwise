<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    // protected $fillable = [
    //         'name',
    //         'email',
    //         'phone_number',
    //         'other_name',
    //         'other_email',
    //         'other_phone_number',
    //         'is_childseat',
    //         'is_meet_nd_greet',
    //         'pickup_location',
    //         'dropoff_location',
    //         'booking_date',
    //         'booking_time',
    //         'fleet_id',
    //         'service_id',
    //         'return_id',
    //         'return_date',
    //         'return_time',
    //         'no_of_passenger',
    //         'no_suit_case',
    //         'summary',
    //         'via_locations',
    //         'no_of_laugage',
    //         'flight_time',
    //         'flight_name',
    //         'flight_type',
    //         'payment_method',
    //         'is_payment',
    //         'is_draft',
    //         'user_id',
    //         'user_ip',
    //         'status',
    //         'total_price',
    //         'coupon_id',
    //         'discount_percentage',
    //         'discount_price',
    //         'reminder_sent',
    //         'assigned_to',
    //         'status_id',
    //         'is_extra_lauggage',
    // ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
