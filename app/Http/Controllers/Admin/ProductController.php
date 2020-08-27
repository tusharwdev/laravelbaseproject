<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List Of Product';
        $data['products'] = Product::with('category')->orderBy('id','DESC')->paginate(10);

        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['title'] = "Add Product";
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'status' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->status = $request->status;
        $product->stock = $request->stock;

        if($request->hasFile('image')){
            $image_path = $this->fileUpload($request->file('image'));
            $product->image = $image_path;
        }


        $product->save();

        session()->flash('success','Product Saved Successfully !');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $data['categories'] = Category::all();
        $data['title'] = "Edit Product";
        $data['product'] = $product;
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'status' => 'required'
        ]);


        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->color = $request->color;
        $product->size = $request->size;

        $product->status = $request->status;
        $product->stock = $request->stock;

        if($request->hasFile('image')){

           $image_path = $this->fileUpload($request->file('image'));

            if ($product->image != null && file_exists($product->image)){
                unlink($product->image);
            }
            $product->image = $image_path;
        }


        $product->save();
        session()->flash('success','Product Updated Successfully !');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if ($product->image != null && file_exists($product->image)){
            unlink($product->image);
        }

        $product->delete();
        session()->flash('success','Product Deleted Successfully !');
        return redirect()->route('product.index');
    }

    private function fileUpload($img){
        $path = 'images/product';

        $filename = rand(0000,9999).'_'.$img->getFilename().'_'.$img->getClientOriginalName();
        $img->move($path,$filename);

        return $path.'/'.$filename ;
    }
}
