@extends('layouts.master')
@section('judul')
  Tambah Product Buku
@endsection
@section('content')

<a href="/product/create" class="btn btn-primary btn-sm my-2">
  Tambah
</a>


  <diav class="container mt-4">

    @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif



    {{-- Grid Produk: 1 baris berisi 3 produk --}}
    <div class="row">
        @foreach($products as $item)
        <div class="col-md-4 mb-4"> {{-- 12 dibagi 4 kolom = 3 produk per baris --}}
            <div class="card h-100 border-0 shadow-sm">
                
                {{-- Gambar Produk dari folder public/images --}}
                <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" 
                     style="max-height: 300px; width: 60%; object-fit: cover" alt="{{ $item->name }}">
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title font-weight-bold text-truncate">{{ $item->name }}</h5>
                    
                    <p class="text-primary font-weight-bold mb-1">
                        Rp {{ number_format($item->price, 0, ',', '.') }}
                    </p>
                    
                    <p class="text-muted small">Jumlah Stock: {{ $item->stock }}</p>
                    
                    <p class="card-text small text-muted">
                        {{ Str::limit($item->description, 80) }}
                    </p>

                    {{-- Form Aksi: Menggunakan metode yang diminta --}}
                    <form action="/product/{{ $item->id }}" method="POST" class="mt-auto">
                        @csrf
                        @method("DELETE")

                        {{-- Tombol Read More --}}
                        <div class="mb-2">
                            <a href="/product/{{ $item->id }}" class="btn btn-primary w-100 rounded-pill">
                                Read More
                            </a>
                        </div>

                        {{-- Baris Tombol Edit & Delete --}}
                        <div class="d-flex" style="gap: 10px;">
                            <a href="/product/{{ $item->id }}/edit" class="btn btn-warning rounded-pill flex-fill text-dark font-weight-bold btn-sm">
                                Edit
                            </a>
                            
                            {{-- Tombol Delete menggunakan input type submit --}}
                            <input type="submit" value="Delete" class="btn btn-danger rounded-pill flex-fill font-weight-bold btn-sm" 
                                   onclick="return confirm('Yakin ingin menghapus produk {{ $item->name }}?')">
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</diav>
@endsection