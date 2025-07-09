<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'full_name', 'degree'];

    /**
     * Get the submissions for this program.
     */
    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }

    /**
     * Get the inventory items for this program.
     */
    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Get the users enrolled in this program.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Scope for undergraduate programs.
     */
    public function scopeUndergraduate($query)
    {
        return $query->where('degree', 'Undergraduate');
    }

    /**
     * Scope for graduate programs.
     */
    public function scopeGraduate($query)
    {
        return $query->where('degree', 'Graduate');
    }

    /**
     * Get the program name with degree.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->name} ({$this->degree})";
    }
}
