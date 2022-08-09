<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

/**
 * Class ProviderController
 * @package App\Http\Controllers
 */
class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Provider::all();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Provider::$rules);

        $provider = Provider::create($request->all());

        return response()->json ([
            'status'=>200, 
            'data'=>$provider,
            'msg'=> "Registro de proveedor exitoso",
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
        $provider = Provider::find($id);
        if (isset($provider)) {
            return response()->json([
                'status' => 200,
                'data' => $provider,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No provider found',
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
        $provider = Provider::find($id);

        if (isset($provider)) {
            $provider->id_people = $provider->id_people;
            $provider->uen = $provider->uen;
            $provider->save();

            return response()->json([
                'status' => 'success',
                'data' => $provider,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No provider found',
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        request()->validate(Provider::$rules);
        $provider = Provider::find($id);

        if (isset($provider)) {
            $provider->id_people = $request->id_people;
            $provider->uen = $request->uen;
            $provider->save();

            return response()->json([
                'status' => 'success',
                'data' => $provider,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No provider found',
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

        $provider = Provider::find($id);
        if (isset($provider)) {
            $provider = Provider::find($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Eliminado de manera exitosa',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No provider found',
            ]);
        }
    }
}
