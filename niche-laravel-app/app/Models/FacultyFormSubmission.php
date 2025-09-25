<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacultyFormSubmission extends Model
{
    use HasFactory, SoftDeletes;

    // Status constants
    public const STATUS_PENDING = 'pending';
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_FORWARDED = 'forwarded';

    protected $fillable = ['form_type', 'note', 'document_path', 'document_filename', 'document_size', 'document_mime', 'submitted_by', 'submitted_at', 'status', 'reviewed_by', 'reviewed_at', 'review_remarks'];

    protected function casts(): array
    {
        return [
            'document_size' => 'integer',
            'submitted_at' => 'datetime',
            'reviewed_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Relationships
     */
    public function submitter()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    /**
     * Scopes
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', self::STATUS_ACCEPTED);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', self::STATUS_REJECTED);
    }

    public function scopeByFormType($query, $formType)
    {
        return $query->where('form_type', $formType);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('submitted_at', '>=', now()->subDays($days));
    }

    /**
     * Accessors
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_ACCEPTED => 'Accepted',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_FORWARDED => 'Forwarded',
            default => 'Pending',
        };
    }

    public function getDocumentUrlAttribute()
    {
        return $this->document_path ? \Storage::url($this->document_path) : null;
    }

    public function getFormattedDocumentSizeAttribute(): string
    {
        if (!$this->document_size) {
            return 'Unknown';
        }

        $bytes = $this->document_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Helper Methods
     */
    public function isAAccepted(): bool
    {
        return $this->status === self::STATUS_ACCEPTED;
    }

    public function isRejected(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function hasDocument(): bool
    {
        return !empty($this->document_path);
    }

    /**
     * Business Logic
     */
    public function markAsAccepted(User $reviewer, ?string $remarks = null): void
    {
        $this->update([
            'status' => self::STATUS_ACCEPTED,
            'reviewed_by' => $reviewer->id,
            'reviewed_at' => now(),
            'review_remarks' => $remarks,
        ]);
    }

    public function markAsRejected(User $reviewer, ?string $remarks = null): void
    {
        $this->update([
            'status' => self::STATUS_REJECTED,
            'reviewed_by' => $reviewer->id,
            'reviewed_at' => now(),
            'review_remarks' => $remarks,
        ]);
    }
}
