<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDonation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'donation_id',
        'description',
        'total',
        'quantity'
    ];
    //With Donation Model
    public function donation() 
    {
        return $this->belongsTo(Donation::class,'donation_id');
    }

    //With User Model
    public function user() 
    {
        return $this->belongsTo(User::class,'user_id');
    }

    //With PaymentDetails Model
    public function paymenydetails() 
    {
        return $this->belongsTo(PaymentDetails::class);
    }
}
