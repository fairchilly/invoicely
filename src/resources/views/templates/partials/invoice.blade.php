<div class="block">
  <div align="right">
    <p class="size-7">
      <b>INVOICE</b>
    </p>
  </div>
  <table style="width: 100%; padding-top: 1rem;">
    <tr>
      <td align="right">
        <p class="size-4"><b>Date</b></p>
        <p class="size-4"><b>Invoice #</b></p>
        <p class="size-4"><b>Due Date</b></p>
      </td>
      <td align="right">
        <p class="size-4">{{ $invoice->issued_date->format('F j, Y') }}</p>
        <p class="size-4">{{ $invoice->invoice_number }}</p>
        <p class="size-4">{{ $invoice->due_date->format('F j, Y') }}</p>
      </td>
    </tr>
  </table>
</div>