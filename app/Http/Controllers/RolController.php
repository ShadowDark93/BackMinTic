<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

/**
 * Class RolController
 * @package App\Http\Controllers
 */
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rol::all();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rol::$rules);

        $inventory = Rol::create($request->all());

        return response()->json([
            'status' => 200,
            //'data' => $rol,
            'msg' => "Registro de rol exitoso",
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
        $rol = Rol::find($id);

        return view('rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Rol::find($id);

        return view('rol.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rol $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        request()->validate(Rol::$rules);

        $rol->update($request->all());

        return redirect()->route('rols.index')
            ->with('success', 'Rol updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rol = Rol::find($id)->delete();

        return redirect()->route('rols.index')
            ->with('success', 'Rol deleted successfully');
    }
}
