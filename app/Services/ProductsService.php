<?php


namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsService
{
    /**
     * Obtiene los productos
     *
     * @param $filter
     * @return mixed
     */
    public function getAll($filter)
    {
        if ($filter) {
            $products = Product::whereLike('name', "%" . $filter . "%")->get();
        } else {
            $products = Product::all();
        }

        return Inertia::render('Shop/ListProduct',      [
            'products' => $products
        ]);
    }

    /**
     * Guarda los productos
     *
     * @param  $request
     * @return mixed
     */

    public function store(Request $request)
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

        return $product;

    }


    /**
     * Detalle de producto
     *
     * @return mixed
     */


    public function show($id)
    {
        try {
            return Product::find($id);;
        }catch (\Exception $e){
            return array('error'=> true, 'message' =>$e->getMessage());
        }
    }




    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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

        return $product;
    }

}
