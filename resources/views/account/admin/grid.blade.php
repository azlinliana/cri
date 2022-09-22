<x-app-layout>
  @if (Auth::user()->hasRole('superadmin'))
    <x-drawer.drawer-superadmin>
      @section('pageTitle', 'Admin List')

      @section('content')
        <form method="GET" action="{{ route('admin.search.grid') }}">
          @csrf

          <div class="flex items-center mb-4">   
            <label for="simple-search" class="sr-only">Search admin</label>

            <div class="relative w-full">
              <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500" placeholder="Search admin">
            </div>
            <button type="submit" class="p-3 ml-2 text-sm font-medium text-white bg-black rounded-lg border border-rose-700 hover:bg-rose-300 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
        </form>

        <div class="text-right text-black mb-4">
          <span class="font-bold">{{ $countAdmin }}</span>
          Admin(s)
        </div>

        <div class="sm:flex items-center justify-between">
          <div class="btn-group btn-xs mb-12">
            <div class="btn btn-ghost bg-rose-300 hover:bg-rose-500">
              <a href="{{ route('admin.list') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                  <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
            
            <div class="btn btn-ghost bg-rose-500 hover:bg-rose-300">
              <a href="{{ route('admin.grid') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                  <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
              </a>
            </div>
          </div>

          <button class="mb-2 focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-rose-600 hover:bg-rose-400 focus:outline-none rounded-full">
            <p class="text-sm font-medium leading-none text-white">
              <a href="{{ route('admin.create') }}">Create Admin</a>
            </p>
          </button>
        </div>

        <section class="mx-auto py-12">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if($admins != null)
              @foreach ($admins as $admin)
                <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center shadow-xl">
                  <div class="w-full inline-block mb-2 ml-4">
                    <div class="text-right">
                      <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost">
                          <i class="fa-solid fa-ellipsis-vertical fa-xl"></i>
                        </label>

                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                          <li><a href="{{ route('admin.show', [$admin]) }}">View</a></li>
                          <li><a href="">Delete</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                  </div>

                  <div class="text-center">
                    <p class="text-xl text-gray-700 font-bold mb-2">{{ $admin->user->title_user }} {{ $admin->user->fullname }}</p>
                    <p class="text-base text-gray-400 font-normal">{{ $admin->user->email }}</p>

                    <div class="pt-2">
                      <p class="text-base text-gray-700 font-normal mb-2">{{ $admin->faculty }} - {{ $admin->organization }}</p>
                      <p class="text-base text-rose-500 font-normal mb-2"><i class="fa-regular fa-clock"></i><span class="pl-2">{{ $admin->created_at->format('l, d/m/y | h:i A') }}</span><p>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>

          <footer class="text-center text-white bg-rose-50 mt-8">
            <div class="text-center text-gray-700 p-4">
              {{ $admins->links() }}
            </div>
          </footer>
        </section>
      @endsection
    </x-drawer.drawer-superadmin>
  @endif

  @if (Auth::user()->hasRole('admin'))
  @endif
</x-app-layout>