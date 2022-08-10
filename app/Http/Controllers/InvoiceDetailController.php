<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

/**
 * Class InvoiceDetailController
 * @package App\Http\Controllers
 */
class InvoiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InvoiceDetail::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(InvoiceDetail::$rules);

        $invoiceDetail = InvoiceDetail::create($request->all());

        return response()->json([
            'status' => 200,
            'data' => $invoiceDetail,
            'msg' => "Registro de Invoice Detail exitoso",
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
        $invoiceDetail = InvoiceDetail::find($id);
        if (isset($invoiceDetail)) {
            return response()->json([
                'status' => 200,
                'data' => $invoiceDetail,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No invoice detail found',
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
        $invoiceDetail = InvoiceDetail::find($id);

        if (isset($invoiceDetail)) {
            $invoiceDetail->id_invoice = $invoiceDetail->id_invoice;
            $invoiceDetail->id_product = $invoiceDetail->id_product;
            $invoiceDetail->amount = $$invoiceDetail->amount;
            $invoiceDetail->total = $$invoiceDetail->total;
            $invoiceDetail->save();

            return response()->json([
                'status' => 'success',
                'data' => $invoiceDetail,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No invoice details found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InvoiceDetail $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        request()->validate(InvoiceDetail::$rules);
        $invoiceDetail = InvoiceDetail::find($id);

        if (isset($invoiceDetail)) {
            $invoiceDetail->id_invoice = $invoiceDetail->id_invoice;
            $invoiceDetail->id_product = $invoiceDetail->id_product;
            $invoiceDetail->amount = $$invoiceDetail->amount;
            $invoiceDetail->total = $$invoiceDetail->total;
            $invoiceDetail->save();

            return response()->json([
                'status' => 'success',
                'data' => $invoiceDetail,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No invoice details update.',
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
        $invoiceDetail = InvoiceDetail::find($id);

        if (isset($invoiceDetail)) {

            try {
                $invoiceDetail = InvoiceDetail::find($id)->delete();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Eliminado de manera exitosa',
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 403,
                    'data' => 'Error deleting Invoice Details ' . $e->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'Error... No Invoice Details found',
            ]);
        }
    }
}
