@props(['errors'])

@if ($errors->any())
  <div {{ $attributes }}>
    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
      <div class="font-medium text-red-600">
        {{ __('Whoops! Something went wrong.') }}
      </div>

      <ul class="mt-3 list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif