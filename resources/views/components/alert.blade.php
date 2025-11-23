{{-- resources/views/components/alert.blade.php --}}

<div class="mb-3">
    {{-- 1. Cek Pesan SUKSES (Bootstrap 5) --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{-- Icon (Opsional, pastikan FontAwesome terinstall) --}}
            <i class="fas fa-check-circle me-2"></i> 
            
            <strong>Berhasil!</strong> {{ session('success') }}
            
            {{-- Tombol Close Khas Bootstrap 5 --}}
            {{-- Perhatikan: class="btn-close" dan data-bs-dismiss --}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 2. Cek Pesan ERROR (Bootstrap 5) --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Ups! Ada kesalahan input:</strong>
            </div>
            
            {{-- List Error --}}
            <ul class="mb-0 mt-2 ps-3"> {{-- ps-3 = padding-start (kiri) --}}
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
