<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'title_entry',
        'cluster_id',
        'summary_of_invention',
        'applicant_consent',
        'status',
        'reason',
    ];

    public function participant() {
        return $this->belongsTo(Participant::class);
    }

    public function projectCoinventors() {
        return $this->hasMany(ProjectCoinventor::class);
    }

    public function projectJurors() {
        return $this->hasMany(ProjectJuror::class);
    }

    public function cluster() {
        return $this->belongsTo(Cluster::class);
    }

    public function jurors() {
        return $this->belongsToMany(Juror::class, 'project_jurors')->withTimestamps();
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function projectSubmission() {
        return $this->hasOne(ProjectSubmission::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
