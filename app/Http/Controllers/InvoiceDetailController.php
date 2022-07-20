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
        $invoiceDetails = InvoiceDetail::paginate();

        return view('invoice-detail.index', compact('invoiceDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $invoiceDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoiceDetail = new InvoiceDetail();
        return view('invoice-detail.create', compact('invoiceDetail'));
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

        return redirect()->route('invoice-details.index')
            ->with('success', 'InvoiceDetail created successfully.');
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

        return view('invoice-detail.show', compact('invoiceDetail'));
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

        return view('invoice-detail.edit', compact('invoiceDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InvoiceDetail $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceDetail $invoiceDetail)
    {
        request()->validate(InvoiceDetail::$rules);

        $invoiceDetail->update($request->all());

        return redirect()->route('invoice-details.index')
            ->with('success', 'InvoiceDetail updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $invoiceDetail = InvoiceDetail::find($id)->delete();

        return redirect()->route('invoice-details.index')
            ->with('success', 'InvoiceDetail deleted successfully');
    }
}
