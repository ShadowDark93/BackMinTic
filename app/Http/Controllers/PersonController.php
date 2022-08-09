<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

/**
 * Class PersonController
 * @package App\Http\Controllers
 */
class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Person::all();
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Person::$rules);

        $person = Person::create($request->all());

        return response()->json ([
            'status'=>200, 
            'data'=>$person,
            'msg'=> "Registro de persona exitoso",
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
        $person = Person::find($id);
        if (isset($person)) {
            return response()->json([
                'status' => 200,
                'data' => $person,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No person found',
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
        $person = Person::find($id);

        if (isset($person)) {
            $person->name = $person->name;
            $person->address = $person->address;
            $person->phone = $person->phone;
            $person->save();

            return response()->json([
                'status' => 'success',
                'data' => $person,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No person found',
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        request()->validate(Person::$rules);
        $person = Person::find($id);

        if (isset($person)) {
            $person->name = $request->name;
            $person->address = $request->address;
            $person->phone = $request->phone;
            $person->save();

            return response()->json([
                'status' => 'success',
                'data' => $person,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No person found',
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

        $person = Person::find($id);
        if (isset($person)) {
            $person = Person::find($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Eliminado de manera exitosa',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No person found',
            ]);
        }
    }
}