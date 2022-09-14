<x-app-layout>
  @if (Auth::user()->hasRole('superadmin'))
    <x-drawer.drawer-superadmin>
      @section('pageTitle', 'Participant Grid')

      @section('content')
        <form method="GET" action="{{ route('participant.grid.search') }}">
          @csrf

          <div class="flex items-center mb-4">   
            <label for="simple-search" class="sr-only">Search participant</label>

            <div class="relative w-full">
              <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500" placeholder="Search participant">
            </div>
            <button type="submit" class="p-3 ml-2 text-sm font-medium text-white bg-black rounded-lg border border-rose-700 hover:bg-rose-300 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
        </form>

        <div class="text-right text-black mb-4">
          <span class="font-bold">{{ $countParticipant }}</span>
          Participant(s)
        </div>

        <div class="btn-group btn-xs mb-12">
          <div class="btn btn-ghost bg-rose-300 hover:bg-rose-500">
            <a href="{{ route('participant.list.external') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
          
          <div class="btn btn-ghost bg-rose-500 hover:bg-rose-300">
            <a href="{{ route('participant.grid.external') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
            </a>
          </div>
        </div>

        <div class="flex items-center">
          <a href="{{ route('participant.list.all') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800">
            <div class="py-2 lg:px-8 px-4 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full">
              <p>All</p>
            </div>
          </a>

          <a href="{{ route('participant.list.internal') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800 ml-4 sm:ml-8">
            <div class="py-2 lg:px-8 px-4 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full">
              <p>Internal</p>
            </div>
          </a>
          
          <a href="{{ route('participant.list.external') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800 ml-4 sm:ml-8">
            <div class="py-2 lg:px-8 px-4 bg-rose-100 text-rose-700 rounded-full">
              <p>External</p>
            </div>
          </a>
        </div>

        <section class="mx-auto py-12">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if($participants != null)
              @foreach ($participants as $participant)
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
                    <p class="text-xl text-gray-700 font-bold mb-2">{{ $participant->user->title_user }} {{ $participant->user->fullname }}</p>
                    <p class="text-base text-gray-400 font-normal">{{ $participant->user->email }}</p>

                    <div class="pt-4">
                      <div class="inline-block py-3 px-3 text-sm text-center font-semibold leading-none text-rose-50 bg-rose-400 rounded-full">{{ $participant->type }}</div>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>

          <footer class="text-center text-white bg-rose-50 mt-8">
            <div class="text-center text-gray-700 p-4">
              {{ $participants->links() }}
            </div>
          </footer>
      </section>
      @endsection
    </x-drawer.drawer-superadmin>
  @endif

  @if (Auth::user()->hasRole('admin'))
  @endif

  @if (Auth::user()->hasRole('participant'))
  @endif
</x-app-layout>