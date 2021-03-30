<div class="block">
  <p class="size-7">
    <b>{{ $company->name }}</b>
  </p>
  @if($company->phone || $company->email)
    <p class="size-4">
      @if($company->phone)
        <span style="padding-right: 20px;">
          <i class="fas fa-phone"></i> {{ $company->phone }}
        </span>
      @endif
      @if($company->email)
        <i class="fas fa-envelope"></i> {{ $company->email }}
      @endif
    </p>
  @endif

  <div style="padding-top: 0.5rem;">
    @if($company->street)
      <p class="size-4">{{ $company->street }}</p>
    @endif
    @if($company->city && $company->stateProvince)
      <p class="size-4">
        {{ $company->city }}, {{ $company->stateProvince }}
        @if($company->zipPostal)
        {{ $company->zipPostal }}
        @endif
      </p>
    @endif
    @if($company->country)
      <p class="size-4">{{ $company->country }}</p>
    @endif
  </div>
</div>