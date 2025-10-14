<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // Menampilkan semua blog
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    // Menampilkan form tambah blog
    public function create()
    {
        return view('blogs.create');
    }

    // Menyimpan blog baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048'
        ]);

        $data = $request->all();

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('images', 'public');
            $data['gambar'] = $path;
        }

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil ditambahkan!');
    }

    // Menampilkan detail blog
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    // Menampilkan form edit blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    // Update blog
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048'
        ]);

        $data = $request->all();

        // Upload gambar baru jika ada, hapus gambar lama
        if ($request->hasFile('gambar')) {
            if ($blog->gambar) {
                Storage::disk('public')->delete($blog->gambar);
            }
            $file = $request->file('gambar');
            $path = $file->store('images', 'public');
            $data['gambar'] = $path;
        }

        $blog->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui!');
    }

    // Hapus blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($blog->gambar) {
            Storage::disk('public')->delete($blog->gambar);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus!');
    }
}
