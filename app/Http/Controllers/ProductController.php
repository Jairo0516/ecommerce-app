<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Services\ProductsService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{

    private $service;


    public function __construct(ProductsService $service)
    {
        $this->service = $service;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */

    public function create(Request $request)
    {
        try {
            $this->service->store($request);

            return Inertia::render('Shop/CreateProduct', [
                'status' => true,
            ]);
        }catch (\Exception $e){
            return array('error'=> true, 'message' =>$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function filter()
    {
        try {
            $product = $this->service->show(request('product'));

            return Inertia::render('Shop/ViewProduct', [
                'product' => $product
            ]);
        }catch (\Exception $e){
            return array('error'=> true, 'message' =>$e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
        $product = $this->service->show(request('product'));
        return Inertia::render('Shop/EditProduct', [
            'product' => $product
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @return array
     */
    public function all()
    {
        try {
            return $this->service->getAll(request('filter'));
        }catch (\Exception $e){
            return array('error'=> true, 'message' =>$e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request)
    {
        try {
            $this->service->update($request);

            return Inertia::render('Shop/EditProduct', [
                'status' => true,
            ]);
        }catch (\Exception $e){
            return array('error'=> true, 'message' =>$e->getMessage());
        }
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
