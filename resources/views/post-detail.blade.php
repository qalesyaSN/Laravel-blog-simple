@extends('layouts.page')

@section('title', $post->title)

@section('content')

    <!-- CSS TAMBAHAN KHUSUS HALAMAN INI -->
    <style>
        /* Style untuk Share Box */
        .share-box {
            background: var(--accent-3); /* Background Kuning */
            border: 3px solid black;
            padding: 25px;
            margin-top: 50px;
            /* Shadow kotak */
            box-shadow: 5px 5px 0px black;
        }

        .btn-share {
            border: 2px solid black;
            border-radius: 0;
            font-weight: bold;
            background: white;
            color: black;
            box-shadow: 3px 3px 0px black;
            transition: all 0.1s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            text-decoration: none;
        }

        .btn-share:hover {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0px black;
            border-color: black;
            color: black;
        }

        .btn-share:active {
            transform: translate(0, 0);
            box-shadow: 0px 0px 0px black;
        }

        /* Warna khusus saat hover */
        .btn-wa:hover { background-color: #25D366; color: white !important; }
        .btn-fb:hover { background-color: #1877F2; color: white !important; }
        .btn-tw:hover { background-color: #000000; color: white !important; }
        .btn-cp:hover { background-color: var(--accent-1); color: black !important; }
    </style>

    <div class="container my-5">
        <div class="row">
            
            <!-- KOLOM KIRI: KONTEN ARTIKEL -->
            <div class="col-lg-8">
                
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb breadcrumb-neo">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $post->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 20) }}</li>
                    </ol>
                </nav>

                <!-- Article Content -->
                <article class="neo-box p-4 p-md-5 mb-5">
                    
                    <header class="article-header">
                        <div class="skew-header-wrapper" style="padding: 5px 15px; margin-bottom: 15px; transform: skewX(-10deg) scale(0.8); transform-origin: left;">
                            <h5 class="skew-header-text" style="font-size: 1rem;">{{ $post->category->name }}</h5>
                        </div>

                        <h1 class="display-5 mb-3" style="font-weight: 800; line-height: 1.2;">{{ $post->title }}</h1>
                        
                        <!-- Article Meta -->
                        <div class="article-meta text-muted">
                            <span><i class="fas fa-user"></i> {{ $post->author->name }}</span>
                            <span><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }} </span>
                        </div>
                    </header>

                    <div class="featured-image-wrapper">
                        <!-- Menggunakan asset() lebih aman, tapi manual path juga oke -->
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="img-fluid w-100" alt="{{ $post->title }}" onerror="this.src='https://placehold.co/800x450/eee/000?text=No+Image&font=roboto'">
                    </div>

                    <div class="article-content">
                         {!! $post->content !!}
                    </div>

                </article>
                
                <!-- SHARE BOX (MENGGANTIKAN AUTHOR BOX) -->
                <div class="share-box">
                    <h5 class="fw-bold mb-3" style="text-transform: uppercase;">
                        <i class="fas fa-bullhorn me-2"></i> Bagikan Artikel Ini:
                    </h5>
                    
                    <div class="d-flex flex-wrap gap-3">
                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" target="_blank" class="btn-share btn-wa">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn-share btn-fb">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>

                        <!-- Twitter / X -->
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn-share btn-tw">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>

                        <!-- Copy Link -->
                        <button onclick="copyLink()" class="btn-share btn-cp" id="copyBtn">
                            <i class="fas fa-link"></i> Copy Link
                        </button>
                    </div>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                
                <!-- Search -->
                <div class="mb-5">
                    <div class="skew-header-wrapper" style="box-shadow: 5px 5px 0px var(--accent-4);">
                        <h4 class="skew-header-text">SEARCH</h4>
                    </div>
                    <div class="neo-box p-4" style="background: var(--accent-4);">
                        <form action="{{ url('/') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Keyword...">
                                <button class="btn btn-dark" style="border: 3px solid black; border-radius: 0;" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Baca Juga (Dummy / Static) -->
                <div class="mb-5">
                     <div class="skew-header-wrapper">
                        <h4 class="skew-header-text">BACA JUGA</h4>
                    </div>
                    <div class="neo-box p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none text-dark d-block">
                                    Tutorial CSS Grid Lengkap
                                    <small class="d-block text-muted mt-1">Design • 20 Nov</small>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none text-dark d-block">
                                    JavaScript ES6 Features
                                    <small class="d-block text-muted mt-1">Code • 18 Nov</small>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none text-dark d-block">
                                    Freelance vs Fulltime?
                                    <small class="d-block text-muted mt-1">Career • 15 Nov</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="mb-4">
                    <div class="skew-header-wrapper" style="box-shadow: 5px 5px 0px var(--accent-1);">
                        <h4 class="skew-header-text">SUBSCRIBE</h4>
                    </div>
                    <div class="neo-box p-4 text-center" style="background-image: radial-gradient(black 1px, transparent 0); background-size: 10px 10px; background-color: #fff;">
                        <i class="fas fa-paper-plane fa-3x mb-3" style="color: var(--accent-1); text-shadow: 3px 3px 0 black;"></i>
                        <p class="mt-2 bg-white p-1 border border-dark">Dapatkan update artikel terbaru langsung ke emailmu.</p>
                        <input type="email" class="form-control search-input mb-3" placeholder="Email Address">
                        <button class="btn btn-neo w-100 btn-neo-secondary">LANGGANAN</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Script Copy Link -->
    <script>
        function copyLink() {
            // Ambil URL saat ini
            var dummy = document.createElement('input'),
            text = window.location.href;
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);

            // Efek ganti teks tombol sebentar
            var btn = document.getElementById('copyBtn');
            var originalHtml = btn.innerHTML;
            
            btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
            setTimeout(function() {
                btn.innerHTML = originalHtml;
            }, 2000);
        }
    </script>

@endsection

