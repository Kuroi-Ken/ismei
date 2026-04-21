<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLogo extends Model
{
    protected $fillable = ['name', 'path', 'order'];

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}