<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pamflet extends Model
{
    protected $fillable = [
        'title',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope: only active pamflets, ordered.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order')->orderBy('id');
    }

    /**
     * Returns the image URL.
     */
    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}