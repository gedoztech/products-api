<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;

/**
 * @group Products
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * [Insert optional longer description of the API endpoint here.]
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $products = Product::all();
        return new ProductCollection($products);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     *
     */
    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @bodyParam sku string required
     * The sku of the product. Example: 123-ABC-45678
     * @bodyParam name string required
     * The name of the product. Example: Smartphone XYZ
     *
     * @response 200 {
     *      "data": {
     *        "id": 1,
     *        "sku": "123-ABC-45678",
     *        "name": "Smartphone XYZ",
     *        "data_criacao": "2021-01-01T19:38:14.000000Z"
     *      },
     *      "message": "Created successfully"
     * }
     *
     * @response 404 {
     *  "message": "No query results for model"
     * }
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'sku' => 'required|string|max:255|unique:App\Models\Product,sku',
            'name' => 'required|string|max:255',
        ]);

        $product = Product::create($data);


        return response(['data' => new ProductResource($product), 'message' => 'Created successfully'], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $id
     * @return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response(['data' => new ProductResource($product), 'message' => 'Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response(['message' => 'Deleted successfully']);
    }
}
