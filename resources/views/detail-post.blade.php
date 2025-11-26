<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenapa Neobrutalism Tren Lagi? - NeoBlog</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Mega:wght@400;700&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* =========================================
           1. CSS GLOBAL (SAMA SEPERTI INDEX)
           ========================================= */
        :root {
            --bg-color: #fffdf2;
            --main-text: #000000;
            --accent-1: #FF6B6B; 
            --accent-2: #4ECDC4; 
            --accent-3: #FFE66D; 
            --accent-4: #a06cd5; 
            --border-width: 3px;
            --shadow-offset: 5px;
        }

        body {
            background-color: var(--bg-color);
            color: var(--main-text);
            font-family: 'Space Mono', monospace;
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand, .display-3 {
            font-family: 'Lexend Mega', sans-serif;
            font-weight: 700;
            color: #000;
        }

        /* Utilities Neo-Brutalism Dasar */
        .neo-box {
            background: white;
            border: var(--border-width) solid black;
            box-shadow: var(--shadow-offset) var(--shadow-offset) 0px 0px black;
            border-radius: 0;
            transition: all 0.2s ease;
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
        }
        .btn-neo:hover { top: 2px; left: 2px; box-shadow: 2px 2px 0px 0px black; background-color: var(--accent-3); border-color: black; }
        .btn-neo:active { top: 4px; left: 4px; box-shadow: 0px 0px 0px 0px black; }
        .btn-neo-secondary { background-color: var(--accent-2); }
        .btn-neo-dark { background-color: #000; color: #fff; }
        .btn-neo-dark:hover { color: #fff; background-color: #333; }

        /* Navbar & Footer */
        .navbar { border-bottom: var(--border-width) solid black; background-color: #fff; padding: 1.5rem 0; }
        .navbar-brand { font-size: 1.8rem; background: var(--accent-3); padding: 5px 15px; border: 2px solid black; box-shadow: 4px 4px 0px black; margin-right: 2rem; }
        .nav-link { color: black !important; font-weight: bold; text-transform: uppercase; border: 2px solid transparent; padding: 10px 20px !important; margin: 0 5px; transition: all 0.2s; }
        .nav-link:hover, .nav-link.active { border: 2px solid black; background-color: var(--accent-1); box-shadow: 4px 4px 0px black; transform: translate(-2px, -2px); }
        footer { border-top: var(--border-width) solid black; background: white; padding: 50px 0 30px 0; margin-top: 80px; }
        
        /* Widget Utilities */
        .search-input { border: 3px solid black; border-radius: 0; padding: 10px; box-shadow: 4px 4px 0px rgba(0,0,0,0.2); }
        .search-input:focus { box-shadow: 4px 4px 0px black; border-color: black; outline: none; }
        .skew-header-wrapper { display: inline-block; transform: skewX(-10deg); background-color: #000; padding: 8px 25px; margin-bottom: 25px; box-shadow: 5px 5px 0px var(--accent-3); border: 2px solid black; }
        .skew-header-text { transform: skewX(10deg); color: #fff; font-weight: 800; font-size: 1.5rem; margin: 0; line-height: 1.2; letter-spacing: 1px; }

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
            <a class="navbar-brand" href="index.html">NEO<span style="color:white;">BLOG</span>.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    style="border: 3px solid black; border-radius: 0; box-shadow: 3px 3px 0 black; background: var(--accent-3);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end mt-3 mt-lg-0" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container my-5">
        <div class="row">
            
            <!-- KOLOM KIRI: KONTEN ARTIKEL -->
            <div class="col-lg-8">
                
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb breadcrumb-neo">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Desain</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Single Post</li>
                    </ol>
                </nav>

                <article class="neo-box p-4 p-md-5 mb-5">
                    
                    <header class="article-header">
                        <div class="skew-header-wrapper" style="padding: 5px 15px; margin-bottom: 15px; transform: skewX(-10deg) scale(0.8); transform-origin: left;">
                            <h5 class="skew-header-text" style="font-size: 1rem;">DESAIN UI/UX</h5>
                        </div>

                        <h1 class="display-5 mb-3" style="font-weight: 800; line-height: 1.2;">Kenapa Neobrutalism Menjadi Tren UI di Tahun 2024?</h1>
                        
                        <!-- META TAGS UPDATE -->
                        <div class="article-meta text-muted">
                            <span><i class="fas fa-user"></i> Admin</span>
                            <span><i class="far fa-calendar-alt"></i> 26 Nov 2024</span>
                            <span><i class="far fa-comments"></i> 12 Komentar</span>
                        </div>
                    </header>

                    <div class="featured-image-wrapper">
                        <img src="https://placehold.co/800x450/FF6B6B/000000?text=NEOBRUTALISM&font=roboto" class="img-fluid w-100" alt="Featured Image">
                    </div>

                    <div class="article-content">
                        <p>Desain web terus berputar. Setelah bertahun-tahun didominasi oleh gaya "Clean", "Minimalist", dan material design yang serba rounded dan bayangan halus, kini muncul pemberontakan visual. Selamat datang di era <strong>Neobrutalism</strong>.</p>
                        
                        <h3>Apa itu Neobrutalism?</h3>
                        <p>Berbeda dengan Brutalism asli arsitektur tahun 50-an yang dingin dan kasar, Neobrutalism di web menggabungkan tata letak yang kasar dengan warna-warna yang sangat cerah, tipografi yang berani, dan garis tepi (stroke) hitam yang tebal.</p>

                        <blockquote>
                            "Desain yang baik tidak harus selalu terlihat bersih. Desain yang baik adalah desain yang berani menyampaikan pesan."
                        </blockquote>

                        <p>Berikut adalah karakteristik utamanya:</p>
                        <ul>
                            <li>Stroke / Border hitam tebal di semua elemen.</li>
                            <li>Warna kontras tinggi (Neon, Primary colors).</li>
                            <li>Bayangan solid tanpa blur (Hard shadows).</li>
                            <li>Font monospace atau sans-serif yang tebal.</li>
                        </ul>

                        <h3>Kenapa Orang Menyukainya?</h3>
                        <p>Di tengah lautan website yang terlihat sama (template Bootstrap standar), Neobrutalism menawarkan identitas yang kuat. Brand yang menggunakannya terlihat "jujur", "berani", dan "menyenangkan".</p>
                        
                        <div class="alert mt-4" style="background: var(--accent-1); border: 3px solid black; color: black; font-weight: bold;">
                            <i class="fas fa-exclamation-triangle me-2"></i> Note: Gaya ini mungkin tidak cocok untuk website korporat serius seperti Bank atau Rumah Sakit.
                        </div>
                    </div>

                    <div class="author-box">
                        <img src="https://placehold.co/100x100/black/white?text=AD" alt="Author" class="author-img">
                        <div>
                            <h5 class="fw-bold mb-1">DITULIS OLEH: ADMIN GANTENG</h5>
                            <p class="mb-2 small">Web Developer yang suka kopi hitam dan desain yang bikin sakit mata tapi estetik.</p>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-dark"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-dark"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>

                </article>

                <section class="comments-area">
                    <div class="skew-header-wrapper mb-4">
                        <h3 class="skew-header-text">KOMENTAR (3)</h3>
                    </div>

                    <div class="neo-box p-4 mb-5 comment-form" style="background: #f9f9f9;">
                        <h5 class="fw-bold mb-3">Tinggalkan Jejak</h5>
                        <div class="mb-3">
                            <input type="text" class="form-control search-input mb-3" placeholder="Nama Kamu">
                            <textarea class="form-control" rows="4" placeholder="Tulis komentar pedasmu di sini..."></textarea>
                        </div>
                        <button class="btn btn-neo">KIRIM KOMENTAR</button>
                    </div>

                    <div class="comment-list">
                        <div class="comment-item">
                            <div class="comment-header">
                                <div class="d-flex align-items-center">
                                    <div class="comment-avatar">UD</div>
                                    <div>
                                        <h6 class="fw-bold m-0">Ujang Design</h6>
                                        <small class="text-muted">2 jam yang lalu</small>
                                    </div>
                                </div>
                                <span class="reply-btn">REPLY</span>
                            </div>
                            <p class="mb-0">Setuju banget! Bosen liat web yang rounded-rounded terus. Ini lebih fresh!</p>
                        </div>

                        <div class="comment-item ms-5" style="border-color: var(--accent-4);">
                            <div class="comment-header">
                                <div class="d-flex align-items-center">
                                    <div class="comment-avatar" style="background: var(--accent-4);">AD</div>
                                    <div>
                                        <h6 class="fw-bold m-0">Admin (Author)</h6>
                                        <small class="text-muted">1 jam yang lalu</small>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0">Yoi kang Ujang! Gass terus brutalism.</p>
                        </div>

                        <div class="comment-item">
                            <div class="comment-header">
                                <div class="d-flex align-items-center">
                                    <div class="comment-avatar">ST</div>
                                    <div>
                                        <h6 class="fw-bold m-0">Siti Tech</h6>
                                        <small class="text-muted">Kemarin</small>
                                    </div>
                                </div>
                                <span class="reply-btn">REPLY</span>
                            </div>
                            <p class="mb-0">Tutorial implementasinya ditunggu min.</p>
                        </div>
                    </div>
                </section>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="mb-5">
                    <div class="skew-header-wrapper" style="box-shadow: 5px 5px 0px var(--accent-4);">
                        <h4 class="skew-header-text">SEARCH</h4>
                    </div>
                    <div class="neo-box p-4" style="background: var(--accent-4);">
                        <div class="input-group">
                            <input type="text" class="form-control search-input" placeholder="Keyword...">
                            <button class="btn btn-dark" style="border: 3px solid black; border-radius: 0;" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>

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

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h2 class="fw-bold">NEOBLOG.</h2>
                    <p>Dibuat dengan <i class="fas fa-heart text-danger"></i> dan Kopi.<br>
                    Style Neobrutalism berbasis Bootstrap 5.</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold border-bottom border-3 border-dark pb-2 d-inline-block">LINK PENTING</h5>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark fw-bold">> Home</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark fw-bold">> Tentang Kami</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark fw-bold">> Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold border-bottom border-3 border-dark pb-2 d-inline-block">SOCIAL</h5>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="btn btn-neo-dark p-2 px-3" style="border: 2px solid black; box-shadow: 3px 3px 0 white;"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-neo-dark p-2 px-3" style="border: 2px solid black; box-shadow: 3px 3px 0 white;"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-neo-dark p-2 px-3" style="border: 2px solid black; box-shadow: 3px 3px 0 white;"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 pt-4 border-top border-dark">
                <p class="mb-0 fw-bold">&copy; 2024 NEOBLOG. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


