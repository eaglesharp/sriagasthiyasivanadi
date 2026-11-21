<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'image', 'author', 'published_at', 'is_published'];

    protected $casts = ['published_at' => 'date', 'is_published' => 'boolean'];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/nadi-deities.jpeg');
        }

        $parts = explode('/', $this->image, 2);
        $prefix = str_replace('_', '-', $parts[0]);
        $rest = $parts[1] ?? '';
        $normalized = $prefix . ($rest !== '' ? '/'.$rest : '');

        return asset('public/images/'.$normalized);
    }

    protected static function booted(): void
    {
        static::creating(function (Blog $blog) {
            $blog->slug ??= Str::slug($blog->title);
        });
    }
}
