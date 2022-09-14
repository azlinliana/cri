<x-app-layout>
  @if (Auth::user()->hasRole('superadmin'))
    <x-drawer.drawer-superadmin>
      @section('pageTitle', 'Search Results')

      @section('content')
        <form method="GET" action="{{ route('participant.grid.search') }}">
          @csrf

          <div class="flex items-center mb-4">   
            <label for="simple-search" class="sr-only">Search</label>

            <div class="relative w-full">
              <input type="text" id="simple-search" name="search" value="{{ $search }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500" placeholder="Search">
            </div>
            <button type="submit" class="p-3 ml-2 text-sm font-medium text-white bg-black rounded-lg border border-rose-700 hover:bg-rose-300 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
        </form>

        @if ($countResult != 0)
          <div class="text-left text-lg font-normal text-black mb-12">There are 
            <span class="font-bold"> {{ $countResult }} </span>
            match with 
            <span class="font-bold"> "{{ $search }}" </span>
          </div>

          <section class="mx-auto py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
              @if ($queryParticipants != null)
                @foreach ($queryParticipants as $participant)
                  <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center shadow-xl">
                    <div class="w-full inline-block mb-2 ml-4">
                      <div class="text-right">
                        <div class="dropdown dropdown-end">
                          <label tabindex="0" class="btn btn-ghost">
                            <i class="fa-solid fa-ellipsis-vertical fa-xl"></i>
                          </label>
  
                          <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="{{ route('participant.show', [$participant]) }}">View</a></li>
                            <li><a href="">Delete</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
  
                    <div class="mb-8">
                      <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                    </div>
  
                    <div class="text-center">
                      <p class="text-xl text-gray-700 font-bold mb-2">{{ $participant->title_user }} {{ $participant->fullname }}</p>
                      <p class="text-base text-gray-400 font-normal">{{ $participant->email }}</p>
  
                      <div class="pt-4">
                        @if ($participant->type == 'Internal')
                          <div class="inline-block py-3 px-3 text-sm text-center font-semibold leading-none text-rose-700 bg-rose-100 rounded-full">{{ $participant->type }}</div>
                        @endif
  
                        @if ($participant->type == 'External')
                          <div class="inline-block py-3 px-3 text-sm text-center font-semibold leading-none text-rose-50 bg-rose-400 rounded-full">{{ $participant->type }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </section>
        @endif

        @if ($countResult == 0)
          <div class="text-left text-lg font-normal text-black mb-12">No match found for 
            <span class="font-bold"> "{{ $search }}" </span>
          </div>
        @endif
      @endsection
    </x-drawer.drawer-superadmin>
  @endif

  @if (Auth::user()->hasRole('admin'))
  @endif

  @if (Auth::user()->hasRole('participant'))
  @endif
</x-app-layout>