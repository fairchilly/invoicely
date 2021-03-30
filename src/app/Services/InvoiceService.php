<?php

namespace App\Services;

use Log;
use Exception;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Fee;
use App\Models\Invoice;
use App\Models\Item;

class InvoiceService
{
    public function create($request)
    {
        try {
            $invoice = $this->createInvoice($request);
            $invoice->company = $this->createCompany($invoice, $request['company']);
            $invoice->customer = $this->createCustomer($invoice, $request['customer']);
            $invoice->items = $this->createItems($invoice, $request['items']);
            $invoice->fees = $this->createFees($invoice, $request['fees']);

            return $invoice;
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            $this->rollback($request['id']);
        }

        return null;
    }

    private function createInvoice($invoice)
    {
        $invoice = Invoice::create([
            'id' => parseOrNull($invoice, 'id'),
            'invoice_number' => parseOrNull($invoice, 'invoiceNumber'),
            'issued_date' => parseJsonDate(parseOrNull($invoice, 'issuedDate')),
            'due_date' => parseJsonDate(parseOrNull($invoice, 'dueDate')),
            'comments' => parseOrNull($invoice, 'comments'),
        ]);

        return $invoice;
    }

    private function createCompany($invoice, $company)
    {
        $company = Company::create([
            'id' => parseOrNull($company, 'id'),
            'invoice_id' => $invoice->id,
            'name' => parseOrNull($company, 'name'),
            'street' => parseOrNull($company, 'street'),
            'city' => parseOrNull($company, 'city'),
            'stateProvince' => parseOrNull($company, 'stateProvince'),
            'country' => parseOrNull($company, 'country'),
            'zipPostal' => parseOrNull($company, 'zipPostal'),
            'phone' => parseOrNull($company, 'phone'),
            'email' => parseOrNull($company, 'email'),
        ]);

        return $company;
    }

    private function createCustomer($invoice, $customer)
    {
        $customer = Customer::create([
            'id' => parseOrNull($customer, 'id'),
            'invoice_id' => $invoice->id,
            'name' => parseOrNull($customer, 'name'),
            'street' => parseOrNull($customer, 'street'),
            'city' => parseOrNull($customer, 'city'),
            'stateProvince' => parseOrNull($customer, 'stateProvince'),
            'country' => parseOrNull($customer, 'country'),
            'zipPostal' => parseOrNull($customer, 'zipPostal'),
            'phone' => parseOrNull($customer, 'phone'),
            'email' => parseOrNull($customer, 'email'),
        ]);

        return $customer;
    }

    private function createItems($invoice, $items)
    {
        $newItems = [];

        foreach ($items as $item) {
            $newItems[] = Item::create([
                'id' => parseOrNull($item, 'id'),
                'invoice_id' => $invoice->id,
                'description' => parseOrNull($item, 'description'),
                'units' => parseOrNull($item, 'units'),
                'pricePerUnit' => parseOrNull($item, 'pricePerUnit'),
                'rank' => parseOrNull($item, 'rank'),
            ]);
        }

        return collect($newItems);
    }

    private function createFees($invoice, $fees)
    {
        $newFees = [];

        foreach ($fees as $fee) {
            $newFees[] = Fee::create([
                'id' => parseOrNull($fee, 'id'),
                'invoice_id' => $invoice->id,
                'description' => parseOrNull($fee, 'description'),
                'value' => parseOrNull($fee, 'value'),
                'type' => parseOrNull($fee, 'type'),
                'rank' => parseOrNull($fee, 'rank'),
            ]);
        }

        return collect($newFees);
    }

    private function rollback($invoiceId)
    {
        Invoice::where('id', $invoiceId)->delete();
        Company::where('invoice_id', $invoiceId)->delete();
        Customer::where('invoice_id', $invoiceId)->delete();
        Item::where('invoice_id', $invoiceId)->delete();
        Fee::where('invoice_id', $invoiceId)->delete();
    }
}