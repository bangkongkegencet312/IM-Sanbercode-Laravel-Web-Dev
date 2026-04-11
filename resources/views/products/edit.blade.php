@extends('layouts.master')
@section('judul')
  Edit Category
@endsection
@section('content')

<form action="/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- PENTING: Laravel butuh ini untuk proses Update --}}

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $item)
                <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Change Image (Leave blank if not changing)</label><br>
        <input type="file" name="image" class="form-control">
        <small>Current: {{ $product->image }}</small>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="col-md-6 mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
        </div>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="10">{{ $product->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary rounded-pill w-100">Simpan Perubahan</button>
</form>




@endsection
    


 