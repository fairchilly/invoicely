<div class="block" style="background-color: #f5f5f5; padding: 2rem;">
  <p class="size-5">
    <b>BILL TO</b>
  </p>
  <p class="size-4">{{ $customer->name }}</p>
  @if($customer->billingStreet)
    <p class="size-4">{{ $customer->billingStreet }}</p>
  @endif
  @if($customer->billingCity && $customer->billingStateProvince)
    <p class="size-4">
      {{ $customer->billingCity }}, {{ $customer->billingStateProvince }}
      @if($customer->billingZipPostal)
        {{ $customer->billingZipPostal }}
      @endif
    </p>
  @endif
  @if($customer->billingCountry)
    <p class="size-4">{{ $customer->billingCountry }}</p>
  @endif
</div>