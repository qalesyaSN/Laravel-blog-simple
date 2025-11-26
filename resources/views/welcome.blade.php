<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeoBlog - Brutalist Bootstrap</title>
    
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
            font-size: 1.8rem;
            background: var(--accent-3);
            padding: 5px 15px;
            border: 2px solid black;
            box-shadow: 4px 4px 0px black;
            margin-right: 2rem;
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

        /* --- NEW SKEWED TITLE STYLE (Black Box) --- */
        .skew-header-wrapper {
            display: inline-block;
            transform: skewX(-10deg); /* Miring ke kiri */
            background-color: #000;   /* Hitam Pekat */
            padding: 8px 25px;
            margin-bottom: 25px;
            /* Shadow Kuning agar kontras */
            box-shadow: 5px 5px 0px var(--accent-3); 
            border: 2px solid black; /* Menjaga ketajaman */
        }

        .skew-header-text {
            transform: skewX(10deg); /* Text tegak kembali */
            color: #fff; /* Teks Putih */
            font-weight: 800;
            font-size: 1.5rem;
            margin: 0;
            line-height: 1.2;
            letter-spacing: 1px;
        }

        /* --- Blog Card --- */
        .blog-card {
            background: #fff;
            border: var(--border-width) solid black;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .blog-img-wrapper {
            width: 100%;
            height: 220px;
            border-bottom: var(--border-width) solid black;
            overflow: hidden;
            background-color: #eee;
            position: relative;
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
            flex-grow: 1;
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

        .blog-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 0.85rem;
            color: #000;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            padding: 8px 0;
            margin-bottom: 15px;
            background-color: #f4f4f4;
        }

        .blog-meta div {
            padding: 0 10px;
        }

        .meta-author {
            border-right: 2px solid black;
            font-weight: bold;
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
        }
        @keyframes marquee { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }

        .search-input { border: 3px solid black; border-radius: 0; padding: 10px; box-shadow: 4px 4px 0px rgba(0,0,0,0.2); }
        .search-input:focus { box-shadow: 4px 4px 0px black; border-color: black; outline: none; }
        
        /* Widget Title Update (Tanpa Background Hitam Full, tapi Border Bottom tebal) */
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
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">NEO<span style="color:white;">BLOG</span>.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    style="border: 3px solid black; border-radius: 0; box-shadow: 3px 3px 0 black; background: var(--accent-3);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end mt-3 mt-lg-0" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Marquee -->
    <div class="marquee-container">
        <div class="marquee-content">
            +++ SELAMAT DATANG DI NEOBLOG +++ JANGAN LUPA NGOPI HARI INI +++ CODING ITU MENYENANGKAN TAPI PUSING +++
        </div>
    </div>

    <!-- Hero Section -->
    <header class="py-5 bg-lines" style="border-bottom: 3px solid black;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="neo-box p-4 p-md-5" style="background: var(--accent-3);">
                        <h1 class="display-3 mb-3" style="text-transform: uppercase;">Berani Beda,<br>Berani Brutal.</h1>
                        <p class="lead mb-4">Blog teknologi, desain, dan kehidupan programmer dengan gaya yang tidak membosankan.</p>
                        <a href="#latest-posts" class="btn btn-neo btn-lg">Baca Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-center">
                    <div style="font-size: 10rem; line-height: 1;">👾</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container my-5" id="latest-posts">
        <div class="row">
            
            <!-- Blog Posts Area -->
            <div class="col-lg-8">
                <!-- Skewed Section Title: BLACK BOX STYLE -->
                <div class="skew-header-wrapper">
                    <h2 class="skew-header-text">LATEST DROPS</h2>
                </div>

                <div class="row">
                    <!-- Post Item 1 -->
                    <div class="col-md-6 mb-4">
                        <article class="blog-card neo-box h-100">
                            <div class="blog-img-wrapper">
                                <span class="category-badge" style="background: var(--accent-1);">DESAIN</span>
                                <img src="https://placehold.co/600x400/FF6B6B/000000?text=Neobrutalism&font=roboto" alt="Post">
                            </div>
                            <div class="blog-card-body justify-content-between">
                                <div>
                                    <h3 class="blog-title"><a href="#">Kenapa Neobrutalism Tren Lagi?</a></h3>
                                    <div class="blog-meta">
                                        <div class="meta-author"><i class="fas fa-user-circle me-1"></i> Admin</div>
                                        <div class="meta-date"><i class="far fa-calendar-alt me-1"></i> 26 Nov</div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-neo w-100 mt-2">Read More</a>
                            </div>
                        </article>
                    </div>

                    <!-- Post Item 2 -->
                    <div class="col-md-6 mb-4">
                        <article class="blog-card neo-box h-100">
                            <div class="blog-img-wrapper">
                                <span class="category-badge" style="background: var(--accent-2);">CODE</span>
                                <img src="https://placehold.co/600x400/4ECDC4/000000?text=React+JS&font=roboto" alt="Post">
                            </div>
                            <div class="blog-card-body justify-content-between">
                                <div>
                                    <h3 class="blog-title"><a href="#">React Hooks untuk Pemula</a></h3>
                                    <div class="blog-meta">
                                        <div class="meta-author"><i class="fas fa-user-circle me-1"></i> Dev1</div>
                                        <div class="meta-date"><i class="far fa-calendar-alt me-1"></i> 25 Nov</div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-neo w-100 mt-2">Read More</a>
                            </div>
                        </article>
                    </div>

                    <!-- Post Item 3 -->
                    <div class="col-md-6 mb-4">
                        <article class="blog-card neo-box h-100">
                            <div class="blog-img-wrapper">
                                <span class="category-badge" style="background: var(--accent-3);">LIFE</span>
                                <img src="https://placehold.co/600x400/FFE66D/000000?text=Work+Life&font=roboto" alt="Post">
                            </div>
                            <div class="blog-card-body justify-content-between">
                                <div>
                                    <h3 class="blog-title"><a href="#">Setup Meja Kerja 2024</a></h3>
                                    <div class="blog-meta">
                                        <div class="meta-author"><i class="fas fa-user-circle me-1"></i> Sarah</div>
                                        <div class="meta-date"><i class="far fa-calendar-alt me-1"></i> 20 Nov</div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-neo w-100 mt-2">Read More</a>
                            </div>
                        </article>
                    </div>

                    <!-- Post Item 4 -->
                    <div class="col-md-6 mb-4">
                        <article class="blog-card neo-box h-100">
                            <div class="blog-img-wrapper">
                                <span class="category-badge" style="background: var(--accent-4); color: white;">GAMES</span>
                                <img src="https://placehold.co/600x400/a06cd5/ffffff?text=Retro+Game&font=roboto" alt="Post">
                            </div>
                            <div class="blog-card-body justify-content-between">
                                <div>
                                    <h3 class="blog-title"><a href="#">Review Konsol Retro China</a></h3>
                                    <div class="blog-meta">
                                        <div class="meta-author"><i class="fas fa-user-circle me-1"></i> Gamer</div>
                                        <div class="meta-date"><i class="far fa-calendar-alt me-1"></i> 18 Nov</div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-neo w-100 mt-2">Read More</a>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#" style="border: 2px solid black; margin: 0 5px; color: #999;">PREV</a></li>
                        <li class="page-item active"><a class="page-link" href="#" style="background: black; color: white; border: 2px solid black; margin: 0 5px; box-shadow: 3px 3px 0 rgba(0,0,0,0.2);">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" style="border: 2px solid black; margin: 0 5px; color: black; box-shadow: 3px 3px 0 black;">2</a></li>
                        <li class="page-item"><a class="page-link" href="#" style="border: 2px solid black; margin: 0 5px; color: black; box-shadow: 3px 3px 0 black;">NEXT</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Search Widget -->
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

                <!-- Categories Widget -->
                <div class="mb-5">
                     <div class="skew-header-wrapper">
                        <h4 class="skew-header-text">KATEGORI</h4>
                    </div>
                    <div class="neo-box p-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Web Design <span class="badge bg-black rounded-0">12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                JavaScript <span class="badge bg-black rounded-0">8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Freelance <span class="badge bg-black rounded-0">5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tutorial <span class="badge bg-black rounded-0">20</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter Widget -->
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

    <!-- Footer -->
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


