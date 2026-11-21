<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminGalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index', ['items' => GalleryItem::latest()->paginate(12)]);
    }

    public function create()
    {
        return view('admin.gallery.form', [
            'item' => new GalleryItem(['media_type' => 'photo']),
            'formAction' => route('admin.gallery.store'),
            'formMethod' => 'POST',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $targetDir = public_path('images/gallery-media');
            if (! is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $file->move($targetDir, $filename);
            $data['image'] = 'gallery-media/' . $filename;
        } else {
            $data['image'] = null;
        }
        GalleryItem::create($data);

        return redirect()->route('admin.gallery.index')->with('admin_success', 'Media added to the gallery.');
    }

    public function edit(GalleryItem $gallery)
    {
        return view('admin.gallery.form', [
            'item' => $gallery,
            'formAction' => route('admin.gallery.update', $gallery),
            'formMethod' => 'PUT',
        ]);
    }

    public function update(Request $request, GalleryItem $gallery): RedirectResponse
    {
        $data = $this->validatedData($request, $gallery);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $targetDir = public_path('images/gallery-media');
            if (! is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $file->move($targetDir, $filename);
            $data['image'] = 'gallery-media/' . $filename;
        }
        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('admin_success', 'Gallery media updated.');
    }

    public function destroy(GalleryItem $gallery): RedirectResponse
    {
        $gallery->delete();

        return back()->with('admin_success', 'Gallery media deleted.');
    }

    private function validatedData(Request $request, ?GalleryItem $item = null): array
    {
        $data = $request->validate([
            'media_type' => ['required', 'in:photo,video'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
            'video_url' => ['nullable', 'url', 'max:500'],
        ]);

        if ($data['media_type'] === 'photo' && !$request->hasFile('image') && !$item?->image) {
            throw ValidationException::withMessages(['image' => 'Please choose an image.']);
        }

        if ($data['media_type'] === 'video' && !$request->filled('video_url') && !$item?->video_url) {
            throw ValidationException::withMessages(['video_url' => 'Please enter a video URL.']);
        }

        $name = $data['media_type'] === 'photo' ? 'Gallery Photo' : 'Gallery Video';
        $data['title'] = $item?->title ?: $name;
        $data['slug'] = $item?->slug ?: Str::uuid()->toString();
        $data['is_published'] = true;
        $data['sort_order'] = 0;

        return $data;
    }
}
