<table class="table table-condensed size-4" style="margin: 2px;">
  <tr class="active">
    <th>Description</th>
    <th class="text-center">Qty</th>
    <th class="text-right">Unit Price</th>
    <th class="text-right">Amount</th>
  </tr>
  @foreach($invoice->items->sortBy('rank') as $item)
    <tr>
      <td>{{ $item->description }}</td>
      <td class="text-center">{{ $item->units }}</td>
      <td class="text-right">{{ formatCurrency($item->pricePerUnit) }}</td>
      <td class="text-right">{{ formatCurrency($item->units * $item->pricePerUnit) }}</td>
    </tr>
  @endforeach
  <tr>
    <td></td>
    <td></td>
    <td class="text-right">
      <b>Subtotal</b>
    </td>
    <td class="text-right">
      {{ formatCurrency($invoice->subtotal) }}
    </td>
  </tr>
  @foreach($invoice->fees->sortBy('rank') as $fee)
    <tr>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
      @if($fee->type == 'percentage')
        <td style="border:none;" class="text-right">
          <b>{{ $fee->description }} ({{ $fee->value }}%)</b>
        </td>
        <td style="border:none;" class="text-right">
          {{ formatCurrency($invoice->subtotal * ($fee->value / 100)) }}
        </td>
      @else
        <td style="border:none;" class="text-right">
          <b>{{ $fee->description }}</b>
        </td>
        <td style="border:none;" class="text-right">
          {{ formatCurrency($fee->value) }}
        </td>
      @endif
    </tr>
  @endforeach
  <tr class="active">
    <td style="border:none;"></td>
    <td style="border:none;"></td>
    <td style="border:none;" class="text-right">
      <b>TOTAL</b>
    </td>
    <td style="border:none;" class="text-right">
      <b>{{ formatCurrency($invoice->total) }}</b>
    </td>
  </tr>
</table>