<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminActivityLog extends Model
{
    use HasFactory;

    // Action constants
    public const ACTION_CREATED = 'created';
    public const ACTION_UPDATED = 'updated';
    public const ACTION_DELETED = 'deleted';
    public const ACTION_APPROVED = 'approved';
    public const ACTION_REJECTED = 'rejected';
    public const ACTION_ARCHIVED = 'archived';
    public const ACTION_RESTORED = 'restored';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['admin_id', 'action', 'target_table', 'target_id', 'performed_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'performed_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Get the target model instance
     */
    public function target()
    {
        return $this->morphTo(name: 'target', type: 'target_table', id: 'target_id');
    }

    /**
     * Scopes
     */
    public function scopeForAdmin($query, $adminId)
    {
        return $query->where('admin_id', $adminId);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('performed_at', '>=', now()->subDays($days));
    }

    public function scopeForTarget($query, $model)
    {
        return $query->where([
            'target_table' => $model->getTable(),
            'target_id' => $model->getKey(),
        ]);
    }

    /**
     * Helper Methods
     */
    public function getActionLabelAttribute(): string
    {
        return match ($this->action) {
            self::ACTION_CREATED => 'Created',
            self::ACTION_UPDATED => 'Updated',
            self::ACTION_DELETED => 'Deleted',
            self::ACTION_APPROVED => 'Approved',
            self::ACTION_REJECTED => 'Rejected',
            self::ACTION_ARCHIVED => 'Archived',
            self::ACTION_RESTORED => 'Restored',
            default => ucfirst($this->action),
        };
    }

    /**
     * Create a new activity log entry
     */
    public static function log(User $admin, string $action, Model $target): self
    {
        return self::create([
            'admin_id' => $admin->id,
            'action' => $action,
            'target_table' => $target->getTable(),
            'target_id' => $target->getKey(),
            'performed_at' => now(),
        ]);
    }
}
