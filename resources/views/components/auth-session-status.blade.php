@props(['status'])

@if ($status)
  <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base mb-3" role="alert">
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
      {{ $status }}
    </div>
  </div>
@endif
