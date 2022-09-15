<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'Super Admin List')

    @section('content')
      <div class="btn-group btn-xs mb-12">
        <div class="btn btn-ghost bg-rose-300 hover:bg-rose-500">
          <a href="{{ route('superadmin.list') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
              <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>

        <div class="btn btn-ghost bg-rose-500 hover:bg-rose-300">
          <a href="{{ route('superadmin.grid') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
              <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
          </a>
        </div>
      </div>

      <div class="text-left text-black mb-4 ml-2">
        <span class="font-bold">{{ $countSuperadmin }}</span>
        Super Admin(s)
      </div>

      <section class="mx-auto py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
          @if($superadmins != null)
            @foreach ($superadmins as $superadmin)
              <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center shadow-xl">
                <div class="mb-8">
                  <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                </div>

                <div class="text-center">
                  <p class="text-xl text-gray-700 font-bold mb-2">
                    {{ $superadmin->title_user }} {{ $superadmin->fullname }}

                    @if ($currentUser == $superadmin->id)
                      <span>(You)</span>
                    @endif
                  </p>

                  <p class="text-base text-gray-400 font-normal">{{ $superadmin->email }}</p>
                </div>
                <div class="text-left mt-4">
                  <p class="text-gray-700 font-semibold mb-2">
                    <i class="fa-solid fa-venus-mars"></i>
                    <span class="pl-2">{{ $superadmin->gender }}</span>
                  </p>
                  
                  <p class="text-gray-700 font-semibold mb-2">
                    <i class="fa-solid fa-phone"></i>
                    <span class="pl-2">{{ $superadmin->phone_number }}</span>
                  </p>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </section>
    @endsection
  </x-drawer.drawer-superadmin>
</x-app-layout>