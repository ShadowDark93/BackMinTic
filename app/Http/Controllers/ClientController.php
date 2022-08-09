<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Client::$rules);

        $client = Client::create($request->all());

        return response()->json([
            'status' => 200,
            'data' => $client,
            'msg' => "Registro de cliente exitoso",
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
        $client = Client::find($id);

        if (isset($client)) {
            return response()->json([
                'status' => 200,
                'data' => $client,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No client found',
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
        $client = Client::find($id);

        if (isset($client)) {
            $client->id_people = $client->id_people;
            $client->type = $client->id_people;
            $client->save();

            return response()->json([
                'status' => 'success',
                'data' => $client,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No client found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        request()->validate(Client::$rules);
        $client = Client::find($id);

        if (isset($client)) {
            $client->id_people = $request->id_people;
            $client->type = $request->type;
            $client->save();

            return response()->json([
                'status' => 'success',
                'data' => $client,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No client found',
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
        $client = Client::find($id);

        if (isset($client)) {

            try {
                $client = Client::find($id)->delete();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Eliminado de manera exitosa',
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 403,
                    'data' => 'Error deleting client ' . $e->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No client found',
            ]);
        }
    }
}