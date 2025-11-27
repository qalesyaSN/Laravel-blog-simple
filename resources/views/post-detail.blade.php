@extends('layouts.page')
@section('title', $post->title)
@section('content')
    <div class="container my-5">
        <div class="row">
            
            <!-- KOLOM KIRI: KONTEN ARTIKEL -->
            <div class="col-lg-8">
                
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb breadcrumb-neo">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $post->category->name }}</a></li>
                        
                    </ol>
                </nav>

                <article class="neo-box p-4 p-md-5 mb-5">
                    
                    <header class="article-header">
                        <div class="skew-header-wrapper" style="padding: 5px 15px; margin-bottom: 15px; transform: skewX(-10deg) scale(0.8); transform-origin: left;">
                            <h5 class="skew-header-text" style="font-size: 1rem;">{{ $post->category->name }}</h5>
                        </div>

                        <h1 class="display-5 mb-3" style="font-weight: 800; line-height: 1.2;">{{ $post->title }}</h1>
                        
                        <!-- META TAGS UPDATE -->
                        <div class="article-meta text-muted">
                            <span><i class="fas fa-user"></i> {{ $post->author->name }}</span>
                            <span><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }} </span>
                            
                        </div>
                    </header>

                    <div class="featured-image-wrapper">
                        <img src="/storage/{{ $post->thumbnail }}" class="img-fluid w-100" alt="Featured Image">
                    </div>

                    <div class="article-content">
                         {!! $post->content !!}
                    </div>

                </article>
                
                                    <div class="author-box">
                        <img src="https://placehold.co/100x100/black/white?text=AD" alt="Author" class="author-img">
                        <div>
                            <h5 class="fw-bold mb-1">DITULIS OLEH: {{ $post->author->name }}</h5>
                            <p class="mb-2 small">Web Developer yang suka kopi hitam dan desain yang bikin sakit mata tapi estetik.</p>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-dark"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-dark"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>


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
@endsection