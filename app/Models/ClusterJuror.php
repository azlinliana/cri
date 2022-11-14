<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClusterJuror extends Model
{
    use HasFactory;

    protected $fillable = [
        'juror_id',
        'cluster_id',
    ];
}
