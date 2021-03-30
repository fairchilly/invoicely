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

    public function test()
    {
        $invoice = Invoice::with('company')
            ->with('customer')
            ->with('items')
            ->with('fees')
            ->first();

        $pdf = PDF::loadView('templates.default', ['invoice' => $invoice]);
        return $pdf->stream();
    }
}
