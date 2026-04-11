<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class category_controller extends Controller
{
    public function create(){
        return view('category.tambah');
       } //

    public function store(Request $request)
       {
        // return $request;
        $request->validate([
            
            'name' => 'required|min:5',
            'description' => 'required',
        ],
        [
           'required' => 'inputan :attribute wajib diisi minimal 5 character',
           'min' => 'inputan minimal :min character'
        ]);

        $now = Carbon::now();


        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now

        ]);
        return redirect('/category')->with('success', 'Category berhasil ditambah');
       }

       public function index()
       {
            $categories = DB::table('categories')->get();
    
            return view('category.index', ['categories' => $categories]);
                
       }
       public function show($id){
            $category = DB::table('categories')->find($id);

            return view('category.detail',['category' => $category]);
       }

       public function edit($id){
        $category = DB::table('categories')->find($id);

        return view('category.edit',['category' => $category]);
   }
   public function update($id, Request $request){

    $request->validate([
            
        'name' => 'required|min:5',
        'description' => 'required',
    ],
    [
       'required' => 'inputan :attribute wajib diisi minimal 5 character',
       'min' => 'inputan minimal :min character'
    ]);

    $now = Carbon::now();

    DB::table('categories')
    ->where('id', $id)
    ->update(
        [
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]
    );
    return redirect('/category')->with('success', 'Category berhasil diubah');
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/category')->with('success', 'category berhasil dihapus!');

    }


}
    