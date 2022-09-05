<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'organization',
        'faculty',
        'address_line_one',
        'address_line_two',
        'area',
        'state',
        'postal_code',
        'type'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
