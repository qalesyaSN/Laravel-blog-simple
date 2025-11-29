<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', \App\Models\Setting::get('site_title') ?? 'Blog')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Mega:wght@400;700&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-color: #fffdf2;
            --main-text: #000000;
            --accent-1: #FF6B6B; /* Red/Pink */
            --accent-2: #4ECDC4; /* Teal */
            --accent-3: #FFE66D; /* Yellow */
            --accent-4: #a06cd5; /* Purple */
            --border-width: 3px;
            --shadow-offset: 5px;
        }

        body {
            background-color: var(--bg-color);
            color: var(--main-text);
            font-family: 'Space Mono', monospace;
            overflow-x: hidden; /* Mencegah horizontal scroll akibat efek bayangan/skew */
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand, .display-3 {
            font-family: 'Lexend Mega', sans-serif;
            font-weight: 700;
            color: #000;
        }

        /* --- Neo Components Utilities --- */
        .neo-box {
            background: white;
            border: var(--border-width) solid black;
            box-shadow: var(--shadow-offset) var(--shadow-offset) 0px 0px black;
            border-radius: 0;
            transition: all 0.2s ease;
        }

        .neo-box:hover {
            transform: translate(-2px, -2px);
            box-shadow: calc(var(--shadow-offset) + 2px) calc(var(--shadow-offset) + 2px) 0px 0px black;
        }

        .btn-neo {
            background-color: var(--accent-3);
            border: var(--border-width) solid black;
            color: black;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 0;
            box-shadow: 4px 4px 0px 0px black;
            padding: 10px 20px;
            position: relative;
            transition: all 0.1s;
            display: inline-block;
            text-decoration: none;
        }

        .btn-neo:hover {
            background-color: var(--accent-3);
            box-shadow: 2px 2px 0px 0px black;
            top: 2px;
            left: 2px;
            border-color: black;
            color: black;
        }

        .btn-neo:active {
            box-shadow: 0px 0px 0px 0px black;
            top: 4px;
            left: 4px;
        }

        .btn-neo-secondary { background-color: var(--accent-2); }
        .btn-neo-dark { background-color: #000; color: #fff; }
        .btn-neo-dark:hover { color: #fff; background-color: #333; }

        /* --- Navbar FIXED --- */
        .navbar {
            border-bottom: var(--border-width) solid black;
            background-color: #fff;
            padding: 1.5rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            background: var(--accent-3);
            padding: 1px 8px;
            border: 2px solid black;
            box-shadow: 4px 4px 0px black;
            margin-right: 2rem;
            text-decoration: none;
        }

        .nav-link {
            color: black !important;
            font-weight: bold;
            text-transform: uppercase;
            border: 2px solid transparent;
            padding: 10px 20px !important;
            margin: 0 5px;
            transition: all 0.2s;
        }

        .nav-link:hover {
            border: 2px solid black;
            background-color: white;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0px black;
        }

        .nav-link.active {
            border: 2px solid black;
            background-color: var(--accent-1);
            box-shadow: 4px 4px 0px black;
            transform: translate(-2px, -2px);
        }

        /* --- Hero Section Helper --- */
        .bg-lines {
            background-image: repeating-linear-gradient(
                45deg,
                #fff,
                #fff 10px,
                #f0f0f0 10px,
                #f0f0f0 20px
            );
        }

        /* --- SKEWED TITLE STYLE (Black Box) --- */
        .skew-header-wrapper {
            display: inline-block;
            transform: skewX(-10deg);
            background-color: #000;
            padding: 8px 25px;
            margin-bottom: 25px;
            box-shadow: 5px 5px 0px var(--accent-3); 
            border: 2px solid black;
        }

        .skew-header-text {
            transform: skewX(10deg);
            color: #fff;
            font-weight: 800;
            font-size: 1.5rem;
            margin: 0;
            line-height: 1.2;
            letter-spacing: 1px;
        }

        /* --- Blog Card Layout Fix (Flexbox) --- */
        .blog-card {
            background: #fff;
            border: var(--border-width) solid black;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            height: 100%; /* Agar tinggi kartu rata */
            position: relative;
        }

        .blog-img-wrapper {
            width: 100%;
            height: 220px;
            border-bottom: var(--border-width) solid black;
            overflow: hidden;
            background-color: #eee;
            position: relative;
            flex-shrink: 0; /* Mencegah gambar menyusut */
        }

        .blog-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
            transition: filter 0.3s;
        }
        
        .blog-card:hover .blog-img-wrapper img {
            filter: grayscale(0%);
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-2);
            border: 2px solid black;
            padding: 5px 12px;
            font-weight: bold;
            font-size: 0.85rem;
            box-shadow: 3px 3px 0px black;
            z-index: 2;
        }

        .blog-card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1; /* Body mengisi sisa ruang */
        }

        .blog-title {
            font-size: 1.4rem;
            line-height: 1.3;
            margin-bottom: 15px;
            margin-top: 5px;
            font-weight: 800;
        }
        
        .blog-title a {
            text-decoration: none;
            color: black;
            background-image: linear-gradient(120deg, var(--accent-3) 0%, var(--accent-3) 100%);
            background-repeat: no-repeat;
            background-size: 100% 0em;
            background-position: 0 88%;
            transition: background-size 0.25s ease-in;
        }
        
        .blog-card:hover .blog-title a {
            background-size: 100% 0.4em;
        }

        /* Meta Data Styling (Mobile Friendly) */
        .blog-meta {
            display: flex;
            flex-wrap: wrap; /* Agar turun ke bawah jika layar sempit */
            align-items: center;
            gap: 10px; /* Jarak antar elemen & baris */
            font-size: 0.85rem;
            color: #000;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            padding: 10px 0;
            margin-bottom: 20px;
            margin-top: auto; /* Mendorong ke bawah (Sticky Footer effect di dalam card) */
            background-color: #fff;
        }

        .blog-meta span {
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .blog-meta i { margin-right: 5px; }

        /* Wrapper Tombol agar rapi */
        .btn-read-more-wrapper {
            margin-top: 0;
        }

        /* --- Footer & Widgets --- */
        footer {
            border-top: var(--border-width) solid black;
            background: white;
            padding: 50px 0 30px 0;
            margin-top: 80px;
        }

        .marquee-container {
            border-bottom: var(--border-width) solid black;
            background: var(--accent-1);
            overflow: hidden;
            padding: 10px 0;
        }
        .marquee-content {
            white-space: nowrap;
            animation: marquee 20s linear infinite;
            font-weight: bold;
            font-size: 1.2rem;
            text-transform: uppercase;
        }
        @keyframes marquee { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }

        .search-input { border: 3px solid black; border-radius: 0; padding: 10px; box-shadow: 4px 4px 0px rgba(0,0,0,0.2); }
        .search-input:focus { box-shadow: 4px 4px 0px black; border-color: black; outline: none; }
        
        .widget-title { 
            background: black; 
            color: white; 
            padding: 10px; 
            margin: -23px -23px 20px -23px; 
            text-align: center; 
            border-bottom: 3px solid black; 
        }
        
        .list-group-item { border: none; border-bottom: 2px solid black; border-radius: 0; padding: 12px; font-weight: bold; }
        .list-group-item:hover { background-color: var(--accent-3); cursor: pointer; }
        
        /* ========================================================
           2. CSS KHUSUS HALAMAN DETAIL (UPDATED)
           ======================================================== */
        
        .breadcrumb-neo .breadcrumb-item { font-weight: bold; text-transform: uppercase; font-size: 0.9rem; }
        .breadcrumb-neo .breadcrumb-item a { color: black; text-decoration: none; border-bottom: 2px solid var(--accent-2); }
        .breadcrumb-neo .breadcrumb-item a:hover { background-color: var(--accent-2); }
        .breadcrumb-neo .breadcrumb-item + .breadcrumb-item::before { content: ">"; color: black; font-weight: 900; }

        /* Header Artikel */
        .article-header {
            border-bottom: 3px solid black;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        /* --- PERBAIKAN META TAG (FLEXBOX GAP) --- */
        .article-meta {
            display: flex;
            flex-wrap: wrap; /* Mengizinkan elemen turun ke bawah jika sempit */
            gap: 10px;       /* Memberi jarak otomatis (atas-bawah & kiri-kanan) */
            align-items: center;
        }

        .article-meta span {
            font-weight: bold;
            font-size: 0.9rem;
            display: inline-flex; /* Agar icon dan text sejajar rapi */
            align-items: center;
            background: #eee;
            padding: 5px 12px;    /* Padding sedikit diperbesar agar lega */
            border: 1px solid black;
            white-space: nowrap;  /* Mencegah teks di dalam kotak patah */
        }
        
        .article-meta span i {
            margin-right: 8px;
        }
        /* ---------------------------------------- */

        .featured-image-wrapper { width: 100%; border: 3px solid black; box-shadow: 5px 5px 0px black; margin-bottom: 30px; overflow: hidden; }

        /* Konten Artikel */
        .article-content { font-size: 1.1rem; line-height: 1.8; }
        .article-content p { margin-bottom: 1.5rem; }
        .article-content p:first-of-type::first-letter { float: left; font-family: 'Lexend Mega', sans-serif; font-size: 4rem; line-height: 0.8; padding-right: 10px; padding-top: 5px; font-weight: 700; }
        .article-content blockquote { background: var(--accent-3); border: 3px solid black; padding: 20px; margin: 30px 0; font-style: italic; font-weight: bold; box-shadow: 5px 5px 0px black; }
        .article-content ul { list-style-type: square; padding-left: 20px; margin-bottom: 20px; }
        .article-content li { margin-bottom: 10px; font-weight: bold; }

        /* Author Box */
        .author-box { background: var(--accent-2); border: 3px solid black; padding: 25px; margin-top: 50px; box-shadow: 5px 5px 0px black; display: flex; align-items: center; gap: 20px; }
        .author-img { width: 80px; height: 80px; border: 3px solid black; border-radius: 50%; background: white; object-fit: cover; }

        /* Komentar */
        .comments-area { margin-top: 60px; }
        .comment-item { background: white; border: 3px solid black; padding: 20px; margin-bottom: 20px; position: relative; }
        .comment-header { display: flex; justify-content: space-between; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 15px; }
        .comment-avatar { width: 40px; height: 40px; background: black; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; border: 2px solid black; margin-right: 10px; }
        .reply-btn { font-size: 0.8rem; text-decoration: underline; color: black; font-weight: bold; cursor: pointer; }
        .reply-btn:hover { background-color: var(--accent-3); }
        .comment-form textarea { border: 3px solid black; border-radius: 0; padding: 15px; font-family: 'Space Mono', monospace; box-shadow: 4px 4px 0px rgba(0,0,0,0.2); resize: none; }
        .comment-form textarea:focus { box-shadow: 4px 4px 0px black; outline: none; border-color: black; }

        /* Responsive */
        @media (max-width: 768px) {
            .author-box { flex-direction: column; text-align: center; }
            .article-content p:first-of-type::first-letter { font-size: 3rem; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> >_</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    style="border: 3px solid black; border-radius: 0; box-shadow: 3px 3px 0 black; background: var(--accent-3);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end mt-3 mt-lg-0" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('articles*') ? 'active' : '' }}" href="#">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="#">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}" href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Yield -->
    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h2 class="fw-bold">{{ \App\Models\Setting::get('site_title') }}.</h2>
                    <p>{{ \App\Models\Setting::get('site_description') }}</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold border-bottom border-3 border-dark pb-2 d-inline-block">LINK</h5>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><a href="{{ url('/') }}" class="text-decoration-none text-dark fw-bold">> Home</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark fw-bold">> About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark fw-bold">> Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold border-bottom border-3 border-dark pb-2 d-inline-block">SOCIAL</h5>
                    <div class="d-flex gap-3 mt-3">
                        <a href="{{ \App\Models\Setting::get('social_twitter') }}" class="btn btn-neo-dark p-2 px-3" style="border: 2px solid black; box-shadow: 3px 3px 0 white;"><i class="fab fa-twitter"></i></a>
                        <a href="{{ \App\Models\Setting::get('social_instagram') }}" class="btn btn-neo-dark p-2 px-3" style="border: 2px solid black; box-shadow: 3px 3px 0 white;"><i class="fab fa-instagram"></i></a>
                        <a href="{{ \App\Models\Setting::get('social_facebook') }}" class="btn btn-neo-dark p-2 px-3" style="border: 2px solid black; box-shadow: 3px 3px 0 white;"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 pt-4 border-top border-dark">
                <p class="mb-0 fw-bold">&copy; 2025-{{ date('Y') }} {{ \App\Models\Setting::get('site_footer_text') }}.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

