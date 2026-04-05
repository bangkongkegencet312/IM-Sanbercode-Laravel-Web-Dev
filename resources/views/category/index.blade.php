@extends('layouts.master')
@section('judul')
  Tampil Category
@endsection
@section('content')

  <a href="/category/create" class="btn btn-promary btn-sm my-2">
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
        <th scope="col">#</th>
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
          <a href="/category/{{ $items->id }}" class="btn btn-sm btn-info">Detail</a>
          <a href="/category/{{ $items->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
        </td>
        
      </tr>
        
      @empty
        
      @endforelse

  

    </tbody>
  </table>

@endsection
    

