<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : Response
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'tax' => 'required',
            'manufacturing_cost' => 'required',
            'value' => 'required',
        ],
            [
                'name.required' => 'Name required',
                'description.required' => 'Description required',
                'image.required' => 'Image required.',
                'tax.required' => 'Tax required.',
                'manufacturing_cost.required' => 'Manufacturing cost required.',
                'value.required' => 'Value required.',
            ]
        );

        if ($validator->fails()) {
            return redirect('product/create')
                ->withErrors($validator)
                ->withInput();
        }

        $product = new Product();
        $product->name = strtoupper($request->name);
        $product->description = strtoupper($request->description);
        $product->image = $request->image;
        $product->tax = $request->tax;
        $product->manufacturing_cost = $request->manufacturing_cost;
        $product->value = $request->value;
        $product->created_at = \Carbon\Carbon::now();
        $product->updated_at = \Carbon\Carbon::now();
        $product->save();

        return Inertia::render('Shop/CreateProduct', [
            'status' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('/product/create', ['vehicle' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return ($product);
    }

    /**
     * Display the specified resource.
     *
     * @return array
     */
    public function all($filter)
    {
        $products = [];
        if($filter){
            $products = Product::whereLike('name',  "%".$filter."%")->get();
        }else{
            $products = Product::all();

        }
        return $products;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) : Response
    {

        $product = Product::find($request->id);
        $product->name = strtoupper($request->name);
        $product->description = strtoupper($request->description);
        $product->image = $request->image;
        $product->tax = $request->tax;
        $product->manufacturing_cost = $request->manufacturing_cost;
        $product->value = $request->value;
        $product->updated_at = \Carbon\Carbon::now();
        $product->save();


        return Inertia::render('Shop/EditProduct', [
            'product' => $product,
            'status' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/product');
    }
}
