<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.form', ['blog' => new Blog(), 'formAction' => route('admin.blogs.store'), 'formMethod' => 'POST']);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $targetDir = public_path('images/blog-covers');
            if (! is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $file->move($targetDir, $filename);
            $data['image'] = 'blog-covers/' . $filename;
        }
        $blog = Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('admin_success', 'Blog article created.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.form', ['blog' => $blog, 'formAction' => route('admin.blogs.update', $blog), 'formMethod' => 'PUT']);
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $data = $this->validatedData($request, $blog);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $targetDir = public_path('images/blog-covers');
            if (! is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $file->move($targetDir, $filename);
            $data['image'] = 'blog-covers/' . $filename;
        }
        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('admin_success', 'Blog article updated.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return back()->with('admin_success', 'Blog article deleted.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate(['image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120']]);
        $file = $request->file('image');
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
        $targetDir = public_path('images/blog-content');
        if (! is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $file->move($targetDir, $filename);

        return response()->json(['url' => asset('images/blog-content/'.$filename)]);
    }

    private function validatedData(Request $request, ?Blog $blog = null): array
    {
        // Normalize a typed slug before validation so spaces become URL-safe hyphens.
        $request->merge([
            'slug' => Str::slug($request->input('slug') ?: $request->input('title')),
        ]);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', 'unique:blogs,slug,'.($blog?->id ?? 'NULL')],
            'content' => ['required', 'string'],
            'image' => [$blog?->exists ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
        ]);

        $data['slug'] = Str::slug($data['slug'] ?: $data['title']);
        $data['content'] = $this->sanitizeContent($data['content']);
        $data['excerpt'] = Str::limit(trim(strip_tags($data['content'])), 220);
        $data['author'] = 'Agasthiya Mahashiva Nadi Peedam';
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
