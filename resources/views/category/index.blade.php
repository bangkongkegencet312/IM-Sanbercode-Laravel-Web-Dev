@extends('layouts.master')
@section('judul')
  Tambah Category Buku
@endsection
@section('content')

  <a href="/category/create" class="btn btn-primary btn-sm my-2">
  Tambah
  </a>

  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      @forelse ($categories as $items)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $items->name }}</td>
        <td>
          
          <form action="/category/{{ $items->id }}" method="POST">
            
            @csrf
            @method("DELETE")
            <a href="/category/{{ $items->id }}" class="btn btn-sm btn-info">Detail</a>
            <a href="/category/{{ $items->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
            <input type="submit" value="Delete" class="btn btn-danger btn-sm"></input>


          </form>
        </td>
        
      </tr>
        
      @empty
        <tr>
          <td>Data category Masih kosong, silahkan ditambahkan</td>
        </tr>
      @endforelse

  

    </tbody>
  </table>

@endsection
    

