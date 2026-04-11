@extends('layouts.master')
@section('judul')
  Tambah Products
@endsection
@section('content')


<form action="/product" method="POST" enctype="multipart/form-data">
  @csrf

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  
  <label for="category">Category</label>
  <select name="category_id" class="form-control">
      <option value="">--Select a Category--</option>

      @foreach($categories as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
      @endforeach
  </select> <br>

  
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control" accept="image/*">
  </div>

  <div class="mb-3">
    <label  class="form-label">Price</label>
    <input type="number" class="form-control" name="price" min="0">
  </div>

  <div class="mb-3">
    <label  class="form-label">Stock</label>
    <input type="number" class="form-control" name="stock" min="0">
  </div>

  <div class="mb-3">
    <label class="form-label">Description Name</label>
    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
    

