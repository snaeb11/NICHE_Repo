<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    public const ROLE_STUDENT = 'student';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_SUPER_ADMIN = 'super_admin';

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'account_type', 'program_id', 'status'];
    protected $hidden = ['password', 'remember_token'];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
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

    // Accessors
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    public function getInitialsAttribute(): string
    {
        return Str::of($this->full_name)->trim()->explode(' ')->filter()->take(2)->map(fn($word) => strtoupper(mb_substr($word, 0, 1)))->join('');
    }

    // Helper Methods
    public function isAdmin(): bool
    {
        return in_array($this->account_type, [self::ROLE_ADMIN, self::ROLE_SUPER_ADMIN]);
    }
}
