<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $table = 'user_request'; // Ensure this matches your table name
    public function fleet()
    {
        return $this->belongsTo(Fleet::class, 'fleet_id');
    }
}
