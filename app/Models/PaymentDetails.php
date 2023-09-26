<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    use HasFactory;

    //With UserDonation Model
    public function userdonation() 
    {
        return $this->hasOne(UserDonation::class);
    }
}
