<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = ['key', 'value', 'type'];

    public static function get(string $key, string $fallback = ''): string
    {
        $record = static::where('key', $key)->first();
        return $record ? $record->value : $fallback;
    }
}