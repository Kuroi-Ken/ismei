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
        'image2',
        'release_date',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Auto-set release_date when creating a new record.
     */
    protected static function booted(): void
    {
        static::creating(function (Information $info) {
            if (empty($info->release_date)) {
                $info->release_date = now()->format('d F Y');
            }
        });
    }

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
     * Returns the primary image URL or null.
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Returns the secondary image URL or null.
     */
    public function getImage2UrlAttribute(): ?string
    {
        return $this->image2 ? asset('storage/' . $this->image2) : null;
    }

    /**
     * Human-readable "time ago" using Carbon / diffForHumans on created_at.
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at
            ? $this->created_at->diffForHumans()
            : 'Unknown date';
    }

    /**
     * Scope: search by title or body keywords.
     */
    public function scopeSearch($query, ?string $keyword)
    {
        if (!$keyword) {
            return $query;
        }

        return $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', '%' . $keyword . '%')
              ->orWhere('body', 'like', '%' . $keyword . '%');
        });
    }

    /**
     * Scope: only active optional items with content, ordered latest first.
     */
    public function scopePublished($query)
    {
        return $query->where('type', 'optional')
                     ->where('is_active', true)
                     ->whereNotNull('title')
                     ->where('title', '!=', '')
                     ->latest();
    }
}