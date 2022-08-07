<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

/**
 * Class InventoryController
 * @package App\Http\Controllers
 */
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Inventory::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inventory::$rules);

        $inventory = Inventory::create($request->all());

        return response()->json ([
            'status'=>200,
            'data'=>$inventory,
            'msg'=> "Registro de invetario exitoso",
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
        $inventory = Inventory::find($id);

        if (isset($inventory)) {
            return response()->json([
                'status' => 200,
                'data' => $inventory,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No inventory found',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);

        return view('inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        request()->validate(Inventory::$rules);

        $inventory = Inventory::find($id);

        if (isset($inventory)) {
            $inventory->id_producto = $request->id_producto;
            $inventory->amount = $request->amount;
            $inventory->price = $request->price;
            $inventory->save();

            return response()->json([
                'status' => 'success',
                'data' => $inventory,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No inventory found',
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
        $inventory = Inventory::find($id);
        if (isset($inventory)) {
            $inventory = Inventory::find($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Eliminado de manera exitosa',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'data' => 'Error... No inventory found',
            ]);
        }
    }
}