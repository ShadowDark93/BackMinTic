<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $product = Product::create($request->all());

        return response()->json([
            'status' => 200,
            'data' => $product,
            'msg' => "Registro de producto exitoso",
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (isset($product)) {
            return response()->json([
                'status' => 200,
                'data' => $product,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No product found',
            ]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $product = Product::find($request->id);

        if (isset($product)) {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();
            return response()->json([
                'status' => 200,
                'data' => $product,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No product updated.',
            ]);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (isset($product)) {
            try {
                $product = Product::find($id)->delete();
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 403,
                    'data' => 'Error deleting product '. $e->getMessage(),
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Eliminado de manera exitosa',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No product found',
            ]);
        }

    }
}
