@extends('layouts.app') 

@section('title', 'Tambah Artikel Baru') 

@section('content')
<style>/* Form Container Styles */
.form-container {
    max-width: 800px;
    margin: 100px auto 50px;
    background: var(--card);
    border-radius: 24px;
    box-shadow: 0 20px 60px var(--shadow-medium);
    padding: 3rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
}

/* Gradient accent line */
.form-container::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-accent);
}

.form-container h1 {
    color: var(--text);
    text-align: center;
    margin-bottom: 1.5rem;
    font-size: 2rem;
    font-weight: 600;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.form-container p {
    text-align: center;
    margin-bottom: 2rem;
    color: var(--text-light);
}

.form-container a {
    color: var(--primary);
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}

.form-container a:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

label {
    font-weight: 600;
    color: var(--text);
    margin-bottom: 0.5rem;
    display: block;
    font-size: 1rem;
}

input[type="text"],
input[type="date"],
input[type="file"],
textarea {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: var(--bg);
    color: var(--text);
    box-shadow: 0 2px 8px var(--shadow);
}

input[type="text"]:focus,
input[type="date"]:focus,
textarea:focus {
    outline: none;
    border-color: var(--primary);
    background: var(--card);
    box-shadow: 0 4px 20px var(--shadow-medium);
    transform: translateY(-2px);
}

textarea {
    min-height: 150px;
    resize: vertical;
    font-family: inherit;
    line-height: 1.6;
}

/* File Input Styling */
input[type="file"] {
    padding: 1rem;
    background-color: var(--bg);
    cursor: pointer;
    border: 2px solid rgba(255, 255, 255, 0.1);
}

input[type="file"]::file-selector-button {
    background: var(--gradient-primary);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    margin-right: 1rem;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

input[type="file"]::file-selector-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
}

/* Submit Button */
.btn-submit {
    background: var(--gradient-primary);
    color: white;
    border: none;
    padding: 1.25rem 2rem;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 1rem;
    width: 100%;
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
    position: relative;
    overflow: hidden;
}

.btn-submit::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.btn-submit:hover::before {
    left: 100%;
}

.btn-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(37, 99, 235, 0.4);
}

.btn-submit:active {
    transform: translateY(-1px);
}

/* Back Link */
.mt-3 {
    text-align: center;
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.mt-3 a {
    color: var(--text-light);
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    background: var(--bg);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 2px 8px var(--shadow);
}

.mt-3 a:hover {
    color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px var(--shadow-medium);
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .form-container {
        padding: 2rem 1.5rem !important;
        margin: 80px 1rem 2rem;
        border-radius: 20px;
    }
    
    .form-container h1 {
        font-size: 1.75rem;
    }
    
    input[type="text"],
    input[type="date"],
    input[type="file"],
    textarea {
        padding: 0.875rem 1rem;
    }
    
    .btn-submit {
        padding: 1.125rem 1.5rem;
        font-size: 1rem;
    }
    
    .mt-3 a {
        padding: 0.625rem 1.25rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .form-container {
        padding: 1.5rem 1rem !important;
        border-radius: 16px;
    }
    
    .form-container h1 {
        font-size: 1.5rem;
    }
}

/* Form Validation Styles */
input:invalid:not(:focus):not(:placeholder-shown),
textarea:invalid:not(:focus):not(:placeholder-shown) {
    border-color: #ef4444;
    background: rgba(239, 68, 68, 0.05);
}

input:valid:not(:focus):not(:placeholder-shown),
textarea:valid:not(:focus):not(:placeholder-shown) {
    border-color: #10b981;
    background: rgba(16, 185, 129, 0.05);
}

/* Loading State */
.btn-submit:disabled {
    background: var(--text-lighter);
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

.btn-submit:disabled:hover {
    transform: none;
    box-shadow: none;
}

/* Dark mode specific adjustments */
body.dark-mode input[type="text"],
body.dark-mode input[type="date"],
body.dark-mode input[type="file"],
body.dark-mode textarea {
    background: rgba(30, 41, 59, 0.5);
}

body.dark-mode .mt-3 a {
    background: rgba(30, 41, 59, 0.8);
}

/* Animation for form elements */
.form-group {
    animation: fadeInUp 0.6s ease-out both;
}

.form-group:nth-child(1) { animation-delay: 0.1s; }
.form-group:nth-child(2) { animation-delay: 0.2s; }
.form-group:nth-child(3) { animation-delay: 0.3s; }
.form-group:nth-child(4) { animation-delay: 0.4s; }
.form-group:nth-child(5) { animation-delay: 0.5s; }
.form-group:nth-child(6) { animation-delay: 0.6s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

    <div class="form-container" style="padding: 50px 20px;">
        {{-- Transitional: Formulir ini memungkinkan pengguna membuat artikel. --}}
        <h1>Buat Artikel Baru</h1>
        
        {{-- Active voice: Kita arahkan pengguna untuk kembali melihat semua artikel. --}}
        <p><a href="{{ route('blogs.index') }}">← Lihat Semua Artikel</a></p> 

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" required><br>
        
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required><br>
        
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required><br>
        
            <label for="isi">Isi:</label>
            <textarea id="isi" name="isi" required></textarea><br>
        
            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" required><br>
        
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*"><br>
        
            {{-- Active voice: Tekan tombol ini untuk menyimpan data. --}}
            <button type="submit" class="btn btn-submit">Simpan Artikel</button>
        </form>
        
        {{-- Tautan kembali. --}}
        <p class="mt-3"><a href="{{ route('blogs.index') }}">Kembali ke Beranda</a></p>
    </div>

@endsection