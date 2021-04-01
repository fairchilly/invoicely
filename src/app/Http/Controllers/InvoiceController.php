<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Services\InvoiceService;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function generate()
    {
        $invoice = $this->invoiceService->create(request()->all());

        if (!$invoice) {
            return null;
        }

        $pdf = PDF::loadView('templates.default', ['invoice' => $invoice]);
        return $pdf->stream();
    }

    public function random()
    {
        $invoice = Invoice::all()->random();

        $pdf = PDF::loadView('templates.default', ['invoice' => $invoice]);
        return $pdf->stream();
    }

    public function list()
    {
        return Invoice::with('customer')
            ->with('company')
            ->get()
            ->toJson();
    }
}
