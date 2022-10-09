<div class="mb-12">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <div class="text-lg font-medium leading-6 text-gray-900">{{ $secTitle }}</div>

        <p class="mt-1 text-sm text-gray-600">{{ $secDesc }}</p>
      </div>
    </div>

    <div class="mt-5 md:col-span-2 md:mt-0">
      <div class="shadow sm:overflow-hidden sm:rounded-md">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
          {{ $formElement }}
        </div>
      </div>
    </div>
  </div>
</div>