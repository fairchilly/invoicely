<?php

namespace App\Services;

use Log;
use Exception;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Fee;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Support\Str;

class InvoiceService
{
    protected $company;
    protected $customer;
    protected $invoice;

    public function create($request)
    {
        try {
            $this->company = $this->createCompany($request['company']);
            $this->customer = $this->createCustomer($request['customer']);
            $this->$invoice = $this->createInvoice($request);
            $this->invoice->items = $this->createItems($request['items']);
            $this->invoice->fees = $this->createFees($request['fees']);

            return $invoice->save();
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $this->rollback($request['id']);
        }

        return null;
    }

    private function createCompany($company)
    {
        $company = Company::create([
            'id' => parseOrNull($company, 'id'),
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

    private function createCustomer($customer)
    {
        $customer = Customer::create([
            'id' => parseOrNull($customer, 'id'),
            'shippingName' => parseOrNull($customer, 'shippingName'),
            'shippingStreet' => parseOrNull($customer, 'shippingStreet'),
            'shippingCity' => parseOrNull($customer, 'shippingCity'),
            'shippingStateProvince' => parseOrNull($customer, 'shippingStateProvince'),
            'shippingCountry' => parseOrNull($customer, 'shippingCountry'),
            'shippingZipPostal' => parseOrNull($customer, 'shippingZipPostal'),
            'shippingPhone' => parseOrNull($customer, 'shippingPhone'),
            'shippingEmail' => parseOrNull($customer, 'shippingEmail'),
            'businessStreet' => parseOrNull($customer, 'businessStreet'),
            'businessCity' => parseOrNull($customer, 'businessCity'),
            'businessStateProvince' => parseOrNull($customer, 'businessStateProvince'),
            'businessCountry' => parseOrNull($customer, 'businessCountry'),
            'businessZipPostal' => parseOrNull($customer, 'businessZipPostal'),
        ]);

        return $customer;
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

    private function createItems($items)
    {
        $newItems = [];

        foreach ($items as $item) {
            $newItems[] = Item::create([
                'id' => parseOrNull($item, 'id'),
                'invoice_id' => $this->invoice->id,
                'description' => parseOrNull($item, 'description'),
                'units' => parseOrNull($item, 'units'),
                'pricePerUnit' => parseOrNull($item, 'pricePerUnit'),
                'rank' => parseOrNull($item, 'rank'),
            ]);
        }

        return collect($newItems);
    }

    private function createFees($fees)
    {
        $newFees = [];

        foreach ($fees as $fee) {
            $newFees[] = Fee::create([
                'id' => parseOrNull($fee, 'id'),
                'invoice_id' => $this->invoice->id,
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
        if ($this->company) {
            Company::where('invoice_id', $invoiceId)->delete();
        }

        if ($this->customer) {
            Customer::where('invoice_id', $invoiceId)->delete();
        }

        if ($this->invoice) {
            Invoice::where('id', $invoiceId)->delete();
            Item::where('invoice_id', $invoiceId)->delete();
            Fee::where('invoice_id', $invoiceId)->delete();
        }
    }
}