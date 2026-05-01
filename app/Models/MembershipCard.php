<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'card_number'
    ];

    // A Membership Card belongs to one Member (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}