<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category_id',
    ];
    //With Category Model
    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //With UserDonation Model
    public function userdonations() 
    {
        return $this->hasMany(UserDonation::class,'donation_id');
    }
}
