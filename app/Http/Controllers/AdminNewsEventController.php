<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminNewsEventController extends Controller
{
    public function index()
    {
        return view('admin.news-events.index', ['items' => NewsEvent::latest()->paginate(10)]);
    }

    public function create()
    {
        return view('admin.news-events.form', [
            'item' => new NewsEvent(),
            'formAction' => route('admin.news-events.store'),
            'formMethod' => 'POST',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $targetDir = public_path('images/news-covers');
            if (! is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $file->move($targetDir, $filename);
            $data['image'] = 'news-covers/' . $filename;
        } else {
            $data['image'] = null;
        }
        NewsEvent::create($data);

        return redirect()->route('admin.news-events.index')->with('admin_success', 'News update created.');
    }

    public function edit(NewsEvent $news_event)
    {
        return view('admin.news-events.form', [
            'item' => $news_event,
            'formAction' => route('admin.news-events.update', $news_event),
            'formMethod' => 'PUT',
        ]);
    }

    public function update(Request $request, NewsEvent $news_event): RedirectResponse
    {
        $data = $this->validatedData($request, $news_event);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $targetDir = public_path('images/news-covers');
            if (! is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $file->move($targetDir, $filename);
            $data['image'] = 'news-covers/' . $filename;
        }
        $news_event->update($data);

        return redirect()->route('admin.news-events.index')->with('admin_success', 'News update saved.');
    }

    public function destroy(NewsEvent $news_event): RedirectResponse
    {
        $news_event->delete();

        return back()->with('admin_success', 'News update deleted.');
    }

    private function validatedData(Request $request, ?NewsEvent $item = null): array
    {
        $request->merge(['slug' => Str::slug($request->input('slug') ?: $request->input('title'))]);
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', 'unique:news_events,slug,'.($item?->id ?? 'NULL')],
            'event_date' => ['required', 'date'],
            'content' => ['required', 'string'],
            'image' => [$item?->exists ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['content'] = $this->sanitizeContent($data['content']);
        $data['excerpt'] = Str::limit(trim(strip_tags($data['content'])), 220);
        $data['event_date'] = $data['event_date'];
        $data['published_at'] = now()->toDateString();
        $data['is_published'] = true;

        return $data;
    }

    private function sanitizeContent(string $content): string
    {
        $allowed = '<p><br><strong><b><em><i><u><h2><h3><ul><ol><li><a><img><blockquote>';
        $content = strip_tags($content, $allowed);

        return preg_replace_callback('/<([a-z0-9]+)([^>]*)>/i', function (array $match) {
            $tag = strtolower($match[1]);
            if (!in_array($tag, ['a', 'img'], true)) {
                return '<'.$tag.'>';
            }

            preg_match_all('/\s+(href|src|alt|title)\s*=\s*(["\'])(.*?)\2/i', $match[2], $attributes, PREG_SET_ORDER);
            $safe = [];
            foreach ($attributes as $attribute) {
                $name = strtolower($attribute[1]);
                $value = trim($attribute[3]);
                if (in_array($name, ['href', 'src'], true) && !preg_match('#^(https?://|/)#i', $value)) {
                    continue;
                }
                $safe[] = $name.'="'.e($value).'"';
            }
            if ($tag === 'a') {
                $safe[] = 'target="_blank"';
                $safe[] = 'rel="noopener noreferrer"';
            }

            return '<'.$tag.($safe ? ' '.implode(' ', $safe) : '').'>';
        }, $content);
    }
}
