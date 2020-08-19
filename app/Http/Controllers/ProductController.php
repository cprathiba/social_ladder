<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('products/index', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('products/create');
    }

    public function save(ProductStoreRequest $request)
    {
        try {

            $product = new Product();

            $validated = $request->validated();

            $product->product_name = \request('product_name');
            $product->price = \request('price');
            $product->discount = \request('discount');
            $product->description = \request('description');
            $product->image = Storage::disk('public_uploads')->put('/images', request()->file('image'));

            $product->save();

            return redirect('/admin/product/view');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['message', $exception->getMessage()]);
        }
    }

    public function editView($id)
    {
        $product = Product::find($id);

        return View::make('products.edit', compact('product'));
    }

    public function update($id, ProductStoreRequest $request)
    {
        try {

            $product = Product::findOrFail($id);

            $request->validated();

            $product->product_name = \request('product_name');
            $product->price = \request('price');
            $product->discount = \request('discount');
            $product->description = \request('description');
            $product->image = Storage::disk('public_uploads')->put('/images', request()->file('image'));

            $product->save();

            Session::flash('flash_message', 'Product successfully updated!');

            return redirect('/admin/product/view');

        } catch (\Exception $exception) {

        }




    }

}
