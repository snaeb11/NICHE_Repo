<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    public const ROLE_STUDENT = 'student';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_SUPER_ADMIN = 'super_admin';

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'account_type', 'program_id', 'status', 'verification_code', 'verification_code_expires_at'];
    protected $hidden = ['password', 'remember_token'];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'verification_code_expires_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'submitted_by');
    }
    public function reviewedSubmissions()
    {
        return $this->hasMany(Submission::class, 'reviewed_by');
    }

    public function getVerificationCodeAttribute($value)
    {
        return $value;
    }

    // app/Models/User.php
    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
