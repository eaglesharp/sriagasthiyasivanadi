<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = ['title', 'slug', 'media_type', 'image', 'video_url', 'description', 'is_published', 'sort_order'];

    protected $casts = ['is_published' => 'boolean'];

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        // Normalize folder separator: some environments used `gallery_media` (underscore)
        // while others use `gallery-media` (hyphen). Convert any underscores in the
        // first path segment to hyphens so URLs point to the `images` public folder.
        $parts = explode('/', $this->image, 2);
        $prefix = str_replace('_', '-', $parts[0]);
        $rest = $parts[1] ?? '';
        $normalized = $prefix . ($rest !== '' ? '/'.$rest : '');

        return asset('public/images/'.$normalized);
    }
}
