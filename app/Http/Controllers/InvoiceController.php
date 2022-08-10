<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

/**
 * Class InvoiceController
 * @package App\Http\Controllers
 */
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Invoice::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Invoice::$rules);

        $invoice = Invoice::create($request->all());

        return response()->json ([
            'status'=>200, 
            'data'=>$invoice,
            'msg'=> "Registro de venta creado exitosamente",
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
        $invoice = Invoice::find($id);
        if (isset($invoice)) {
            return response()->json([
                'status' => 200,
                'data' => $invoice,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No invoice found',
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
        $invoice = Invoice::find($id);

        if (isset($invoice)) {
            $invoice->id_user = $invoice->id_user;
            $invoice->id_client = $invoice->id_client;
            $invoice->date = $invoice->date;
            $invoice->total = $invoice->total;
            $invoice->save();

            return response()->json([
                'status' => 'success',
                'data' => $invoice,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No invoice found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        request()->validate(Invoice::$rules);
        $invoice = Invoice::find($id);

        if (isset($inventory)) {
            $invoice->id_user = $invoice->id_user;
            $invoice->id_client = $invoice->id_client;
            $invoice->date = $invoice->date;
            $invoice->total = $invoice->total;
            $invoice->save();

            return response()->json([
                'status' => 'success',
                'data' => $invoice,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No invoice update.',
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
        $invoice = Invoice::find($id);

        if (isset($invoice)) {

            try {
                $invoice = Invoice::find($id)->delete();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Eliminado de manera exitosa',
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 403,
                    'data' => 'Error deleting product ' . $e->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No Invoice found',
            ]);
        }
    }
}
