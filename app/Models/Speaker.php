<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'name',
        'title',
        'institution',
        'country',
        'photo',
        'bio',
        'presentation_title',
        'presentation_abstract',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope: only active speakers, ordered.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order')->orderBy('id');
    }

    /**
     * Full display name: title + name.
     */
    public function getFullNameAttribute(): string
    {
        return trim("{$this->title} {$this->name}");
    }

    /**
     * Returns photo URL or a placeholder.
     */
    public function getPhotoUrlAttribute(): string
    {
        return $this->photo
            ? asset('storage/' . $this->photo)
            : asset('assets/test.jpeg');
    }
}