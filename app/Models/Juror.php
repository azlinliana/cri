<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juror extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'organization',
        'faculty',
        'field_of_study',
        'expertise',
        'cv',
        'status',
        'reason',
        'reviewer',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
