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
        $request->validate([
            'judul' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName(); // nama unik
            $tujuan = public_path('images'); // folder tujuan di public/images
            $file->move($tujuan, $namaFile); // pindahkan file ke folder public/images
            $data['gambar'] = 'images/' . $namaFile; // simpan path relatif
        }


        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil ditambahkan!');
    }


    // Menampilkan detail blog
    public function show($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('blogs.show', compact('blogs'));
    }

    // Menampilkan form edit blog
    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('blogs.edit', compact('blogs'));
    }

    // Update blog
    public function update(Request $request, $id)
    {
        $blogs = Blog::findOrFail($id);

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
            // hapus gambar lama jika ada
            if ($blogs->gambar && file_exists(public_path($blogs->gambar))) {
                unlink(public_path($blogs->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $tujuan = public_path('images');
            $file->move($tujuan, $namaFile);
            $data['gambar'] = 'images/' . $namaFile;
        }


        $blogs->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui!');
    }

    // Hapus blog
    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($blogs->gambar) {
            Storage::disk('public')->delete($blogs->gambar);
        }

        $blogs->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus!');
    }
}
