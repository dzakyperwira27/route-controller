<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        // 🔹 1. Ambil data dari database
        $blogsDB = Blog::latest()->get();

        // 🔹 2. Ambil data dari file JSON
        $jsonPath = public_path('data/articles.json'); // misal file JSON kamu disimpan di /public/data/
        $blogsJSON = [];

        if (file_exists($jsonPath)) {
            $blogsJSON = json_decode(file_get_contents($jsonPath), true);
        }

        // 🔹 3. Gabungkan keduanya (JSON dulu, lalu DB biar urut)
        $blogs = collect($blogsJSON)->concat($blogsDB);

        // Kirim ke view
        return view('index', compact('blogs'));
    }
}
