<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'user_name',
        'user_email',
        'card_number',
        'bank_name',
        'reason',
        'sort_code',
        'status',
        'amount',
        'admin_message',
    ];
}

