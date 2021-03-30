<div class="block" style="background-color: #f5f5f5; padding: 2rem;">
  <p class="size-5">
    <b>SHIP TO</b>
  </p>
  <p class="size-4">{{ $customer->name }}</p>
  @if($customer->street)
    <p class="size-4">{{ $customer->street }}</p>
  @endif
  @if($customer->city && $customer->stateProvince)
    <p class="size-4">
      {{ $customer->city }}, {{ $customer->stateProvince }}
      @if($customer->zipPostal)
        {{ $customer->zipPostal }}
      @endif
    </p>
  @endif
  @if($customer->country)
    <p class="size-4">{{ $customer->country }}</p>
  @endif
  @if($customer->phone)
    <p class="size-4">{{ $customer->phone }}</p>
  @endif
  @if($customer->email)
    <p class="size-4">{{ $customer->email }}</p>
  @endif
</div>