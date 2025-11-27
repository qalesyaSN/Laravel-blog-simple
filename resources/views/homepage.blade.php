@extends('layouts.page')

@section('title', 'Home - NeoBlog')

@section('content')

<!-- Marquee Section -->
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
            <!-- Decorative Icon (Desktop Only) -->
            <div class="col-lg-4 d-none d-lg-block text-center">
                <div style="font-size: 10rem; line-height: 1;">👾</div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container my-5" id="latest-posts">
    <div class="row">

        <!-- LEFT COLUMN: Blog Posts Area -->
        <div class="col-lg-8">
            
            <!-- Section Title -->
            <div class="skew-header-wrapper">
                <h2 class="skew-header-text">LATEST DROPS</h2>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                
                @forelse($posts as $post)
                    <div class="col">
                        <!-- Tambahkan h-100 agar tinggi kartu sama rata -->
                        <article class="blog-card neo-box h-100">
                            
                            <!-- Gambar Thumbnail -->
                            <div class="blog-img-wrapper">
                                <!-- Menggunakan Null Coalescing operator (??) jika kategori dihapus -->
                                <span class="category-badge" style="background: var(--accent-1);">
                                    {{ $post->category->name ?? 'Uncategorized' }}
                                </span>
                                
                                <!-- Menggunakan asset() untuk path gambar yang benar -->
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                     alt="{{ $post->title }}"
                                     onerror="this.src='https://placehold.co/600x400/eee/000?text=No+Image&font=roboto'">
                            </div>

                            <!-- Body Kartu -->
                            <div class="blog-card-body">
                                <h3 class="blog-title">
                                    <!-- Ganti route sesuai nama route di web.php -->
                                    <a href="{{ route('post.show', $post->slug ?? '#') }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <!-- Meta Data (Author & Date) -->
                                <!-- Class ini sudah kita fix CSS-nya agar ada gap & wrap -->
                                <div class="blog-meta">
                                    <span>
                                        <i class="fas fa-user-circle"></i> {{ $post->author->name ?? 'Admin' }}
                                    </span>
                                    <span class="d-none d-md-inline">|</span> <!-- Pemisah sembunyi di HP -->
                                    <span>
                                        <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                <!-- Tombol Read More (Dibungkus Div Wrapper agar rapi di bawah) -->
                                <div class="btn-read-more-wrapper">
                                    <a href="{{ route('post.show', $post->slug ?? '#') }}" class="btn btn-neo w-100">
                                        READ MORE
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>

                @empty
                    <!-- EMPTY STATE: Tampilan jika data kosong -->
                    <div class="col-12">
                        <div class="neo-box p-5 text-center" style="background: var(--accent-3); border-width: 3px;">
                            <div class="mb-3">
                                <i class="fas fa-ghost fa-4x"></i>
                            </div>
                            <h2 class="fw-bold display-6">ZONK! DATA KOSONG.</h2>
                            <p class="fw-bold mb-4" style="font-size: 1.1rem;">
                                Belum ada artikel yang ditulis nih. Penulisnya lagi sibuk ngopi.
                            </p>
                            <a href="{{ url('/') }}" class="btn btn-dark rounded-0 px-4 py-2 fw-bold border-2 border-dark">
                                <i class="fas fa-sync-alt me-2"></i> REFRESH HALAMAN
                            </a>
                        </div>
                    </div>
                @endforelse

            </div>

            <!-- Pagination -->
            <div class="mt-5">
                <!-- Jika menggunakan Pagination Laravel Default -->
                @if(method_exists($posts, 'links'))
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }} 
                        <!-- Note: Anda mungkin perlu mempublish vendor pagination laravel 
                             dan mengedit view-nya agar stylenya kotak (brutalist) -->
                    </div>
                @else
                    <!-- Fallback Static HTML Pagination (Sesuai Request Awal) -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center gap-2">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" style="border: 2px solid black; color: #999; border-radius: 0;">PREV</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#" style="background: black; color: white; border: 2px solid black; border-radius: 0; box-shadow: 3px 3px 0 var(--accent-3);">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" style="border: 2px solid black; color: black; border-radius: 0; box-shadow: 3px 3px 0 black;">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" style="border: 2px solid black; color: black; border-radius: 0; box-shadow: 3px 3px 0 black;">NEXT</a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>

        </div>

        <!-- RIGHT COLUMN: Sidebar -->
        <div class="col-lg-4 mt-5 mt-lg-0">
            
            <!-- Search Widget -->
            <div class="mb-5">
                <div class="skew-header-wrapper" style="box-shadow: 5px 5px 0px var(--accent-4);">
                    <h4 class="skew-header-text">SEARCH</h4>
                </div>
                <div class="neo-box p-4" style="background: var(--accent-4);">
                    <form action="{{ url('/') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control search-input" placeholder="Keyword..." value="{{ request('search') }}">
                            <button class="btn btn-dark" style="border: 3px solid black; border-radius: 0;" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="mb-5">
                <div class="skew-header-wrapper">
                    <h4 class="skew-header-text">KATEGORI</h4>
                </div>
                <div class="neo-box p-0">
                    <ul class="list-group list-group-flush">
                        <!-- Contoh Static, nanti bisa diganti loop category -->
                        @forelse($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $category->name }} <span class="badge bg-black rounded-0">{{ $category->posts_count }}</span>
                        </li>
                        @empty
                        
                        @endforelse
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

@endsection

