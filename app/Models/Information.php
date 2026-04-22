<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';

    protected $fillable = [
        'slug',
        'label',
        'type',
        'title',
        'body',
        'image',
        'release_date',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get a single record by slug, or null.
     */
    public static function findBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->first();
    }

    /**
     * True when this item has meaningful displayable content.
     */
    public function hasContent(): bool
    {
        return !empty(strip_tags($this->body ?? '')) || !empty($this->title);
    }

    /**
     * Returns the image URL or null.
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Human-readable "time ago" using Carbon / diffForHumans on created_at.
     * Examples: "3 minutes ago", "2 hours ago", "5 days ago"
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at
            ? $this->created_at->diffForHumans()
            : 'Unknown date';
    }
}