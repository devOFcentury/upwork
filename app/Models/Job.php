<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeOnline($query) {
        return $query->where('status', 1);
    }

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class);
    }

    public function isLiked() {
        if (Auth::check()) {
            return Auth::user()->likes->contains('id', $this->id);
        }
    }
}
