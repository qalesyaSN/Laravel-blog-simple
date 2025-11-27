@extends('layouts.page')
@section('title', '')
@section('content')
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
    
@forelse($posts as $post)
<!-- Post Item 1 -->
<div class="col-md-6 mb-4">
<article class="blog-card neo-box h-100">
<div class="blog-img-wrapper">
<span class="category-badge" style="background: var(--accent-1);">{{ $post->category->name }}</span>
<img src="/storage/{{ $post->thumbnail }}" alt="Post">
</div>
<div class="blog-card-body justify-content-between">
<div>
<h3 class="blog-title"><a href="#">{{ $post->title }}</a></h3>
<div class="blog-meta">
<div class="meta-author"><i class="fas fa-user-circle me-1"></i> {{ $post->author->name }}</div>
<div class="meta-date"><i class="far fa-calendar-alt me-1"></i> {{ $post->created_at->format('d M Y') }}</div>
</div>
</div>
<a href="#" class="btn btn-neo w-100 mt-2">Read More</a>
</div>
</article>
</div>
@empty
@endforelse
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

@endsection



