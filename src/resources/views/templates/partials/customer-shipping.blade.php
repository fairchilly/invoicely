<div class="block" style="background-color: #f5f5f5; padding: 2rem;">
  <p class="size-5">
    <b>SHIP TO</b>
  </p>
  <p class="size-4">{{ $customer->name }}</p>
  @if($customer->shippingStreet)
    <p class="size-4">{{ $customer->shippingStreet }}</p>
  @endif
  @if($customer->shippingCity && $customer->shippingStateProvince)
    <p class="size-4">
      {{ $customer->shippingCity }}, {{ $customer->shippingStateProvince }}
      @if($customer->shippingZipPostal)
        {{ $customer->shippingZipPostal }}
      @endif
    </p>
  @endif
  @if($customer->shippingCountry)
    <p class="size-4">{{ $customer->shippingCountry }}</p>
  @endif
  @if($customer->shippingPhone)
    <p class="size-4">{{ $customer->shippingPhone }}</p>
  @endif
  @if($customer->shippingEmail)
    <p class="size-4">{{ $customer->shippingEmail }}</p>
  @endif
</div>