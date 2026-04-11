<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\QueryException;


class products_controller extends Controller
{
    public function create()
    {
        $categories = category::all();
        return view('products.tambah', compact('categories'));

    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            
            'name' => 'required|min:5',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
        //    'required' => 'inputan :attribute wajib diisi minimal 5 character',
        //    'min' => 'inputan minimal :min character',
            'name.required' => 'Nama wajib diisi!',
            'description.required' => 'Description wajib diisi',
            'price.required' => 'Price wajib diisi',
            'stock.required' => 'Stock wajib diisi',
            'name.min' => 'Nama minimal harus 5 karakter.',
            'image.required' => 'Wajib mengunggah gambar produk.',
            'category_id.required' => 'Kategori wajib dipilih.',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) 
        {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $now = Carbon::now();


        DB::table('products')->insert([
            'name' => $request->input('name'),
            'image' => $imageName,
            'description' => $request->input('description'),
            'price' => $request -> input('price'),
            'stock' => $request -> input('stock'),
            'category_id' => $request->input('category_id'),
            'created_at' => $now,
            'updated_at' => $now

        ]);
        return redirect('/product')->with('success', 'Product berhasil ditambah');



    }
    public function index(){
        // Ada dua Metode
        // Metode 1 Menggunakan "Query Builder" = dengan memanggil langsung dari database -> ('products')
        // $products = DB::table('products')->get();
    
        // return view('products.index', ['products' => $products]);

        // Metode 2 Menggunakan "Eloquent ORM" = memilih beberapa variabel menggunakan metode dari Models/product.php
        $products = Product::all();
        return view('products.index', compact('products'));

        
    }
    public function show($id){
        $product = DB::table('products')->find($id);

        return view('products.detail',['product' => $product]);
   }
   

   public function edit($id)
   {
    // Mengambil data produk yang akan diedit
    $product = DB::table('products')->where('id', $id)->first();
    // Mengambil semua kategori untuk pilihan dropdown
    $categories = DB::table('categories')->get();

    return view('products.edit', compact('product', 'categories'));

    

   }

   public function update(Request $request, $id)
   {
    // 1. Validasi semua input
    $request->validate([
        'name' => 'required|min:5',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Opsional saat edit
    ]);

    // 2. Cari data lama
    $product = DB::table('products')->where('id', $id)->first();
    $imageName = $product->image; // Default pakai nama gambar lama

    // 3. Jika ada upload gambar baru
    if ($request->hasFile('image')) {
        // Hapus file lama di folder public/images jika ada
        if ($imageName && file_exists(public_path('images/' . $imageName))) {
            unlink(public_path('images/' . $imageName));
        }
        // Simpan gambar baru
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }
    $now = Carbon::now();

    // 4. Update semua variabel ke database
    DB::table('products')->where('id', $id)->update([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'image' => $imageName,
        'updated_at' => Carbon::now(),
    ]);

    return redirect('/product')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy($id)
{
    // 1. Cari data produk berdasarkan ID
    $product = \App\Models\Product::findOrFail($id);

    // 2. Hapus file gambar dari folder public/images jika file tersebut ada
    if ($product->image && file_exists(public_path('images/' . $product->image))) {
        unlink(public_path('images/' . $product->image));
    }

    // 3. Hapus data produk dari database
    $product->delete();

    // 4. Kembali ke halaman utama dengan pesan sukses
    return redirect('/product')->with('success', 'Produk berhasil dihapus!');
}
   
    //
}
