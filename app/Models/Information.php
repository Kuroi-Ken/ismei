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
}