<x-app-layout>
  @if (Auth::user()->hasRole('superadmin'))
    <x-drawer.drawer-superadmin>
      @section('pageTitle', 'Admin List')

      @section('content')
        <form method="GET" action="{{ route('admin.search.list') }}">
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

        <div class="btn-group btn-xs mb-12">
          <div class="btn btn-ghost bg-rose-500 hover:bg-rose-300">
            <a href="{{ route('admin.list') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>

          <div class="btn btn-ghost bg-rose-300 hover:bg-rose-500">
            <a href="{{ route('admin.grid') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
            </a>
          </div>
        </div>

        <div class="px-2 w-full">
          <div class="bg-white py-2 md:py-7 px-2 md:px-4 xl:px-8">
            <div class="sm:flex items-center justify-between">
              <div class="flex items-center">
              </div>
              
              <button class="mb-2 mr-2 focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-rose-600 hover:bg-rose-400 focus:outline-none rounded-full">
                <p class="text-sm font-medium leading-none text-white">
                  <a href="{{ route('admin.create') }}">Create Admin</a>
                </p>
              </button>
            </div>

            <div class="flex flex-col">
              <div class="overflow-x-auto sm:mx-4 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-x-auto">
                    <table class="min-w-full">
                      <thead class="border-b">
                        <tr>
                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            No
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Full Name & Email
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Organization
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Faculty
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            Created At
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            Action
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        @if($admins != null)
                          @foreach ($admins as $admin)
                            <tr class="border-b">
                              <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                {{ $loop->iteration }}
                              </td>

                              <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                  <div class="avatar"><div class="mask mask-squircle w-12 h-12"><img src="https://api.lorem.space/image/face?hash=3174" /></div></div>

                                  <div>
                                    <div class="font-bold">{{ $admin->user->title_user }} {{ $admin->user->fullname }}</div>

                                    <div class="text-sm opacity-50">{{ $admin->user->email }}</div>
                                  </div>
                                </div>
                              </td>

                              <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                {{ $admin->organization }}
                              </td>

                              <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                {{ $admin->faculty }}
                              </td>

                              <td class="text-sm text-rose-500 text-center font-semibold px-6 py-4 whitespace-nowrap">
                                <i class="fa-regular fa-clock"></i><span class="pl-2">{{ $admin->created_at->format('l, d/m/y | h:i A') }}</span>
                              </td>

                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2 justify-center">
                                  <div class="tooltip" data-tip="View">
                                    <div type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-600">
                                      <a href="{{ route('admin.show', [$admin]) }}"><i class="fa-solid fa-eye"></i></a>
                                      <span class="sr-only">View Admin</span>
                                    </div>
                                  </div>
    
                                  <div class="tooltip" data-tip="Delete">
                                    <div type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-600">
                                      <a href=""><i class="fa-solid fa-trash"></i></a>

                                      <span class="sr-only">Delete Admin</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                    
                    <div class="w-full mt-8 mb-8">
                      {{ $admins->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection
    </x-drawer.drawer-superadmin>
  @endif

  @if (Auth::user()->hasRole('admin'))
    <x-drawer.drawer-admin>
      @section('pageTitle', 'Admin List')

      @section('content')
        <form method="GET" action="{{ route('admin.search.list') }}">
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

        <div class="btn-group btn-xs mb-12">
          <div class="btn btn-ghost bg-rose-500 hover:bg-rose-300">
            <a href="{{ route('admin.list') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>

          <div class="btn btn-ghost bg-rose-300 hover:bg-rose-500">
            <a href="{{ route('admin.grid') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
            </a>
          </div>
        </div>

        <div class="px-2 w-full">
          <div class="bg-white py-2 md:py-7 px-2 md:px-4 xl:px-8">
            <div class="sm:flex items-center justify-between">
              <div class="flex items-center">
              </div>
              
              <button class="mb-2 mr-2 focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-rose-600 hover:bg-rose-400 focus:outline-none rounded-full">
                <p class="text-sm font-medium leading-none text-white">
                  <a href="{{ route('admin.create') }}">Create Admin</a>
                </p>
              </button>
            </div>

            <div class="flex flex-col">
              <div class="overflow-x-auto sm:mx-4 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-x-auto">
                    <table class="min-w-full">
                      <thead class="border-b">
                        <tr>
                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            No
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Full Name & Email
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Organization
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Faculty
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            Created At
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            Action
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        @if($admins != null)
                          @foreach ($admins as $admin)
                            <tr class="border-b">
                              <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                {{ $loop->iteration }}
                              </td>

                              <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                  <div class="avatar"><div class="mask mask-squircle w-12 h-12"><img src="https://api.lorem.space/image/face?hash=3174" /></div></div>

                                  <div>
                                    <div class="font-bold">{{ $admin->user->title_user }} {{ $admin->user->fullname }}</div>

                                    <div class="text-sm opacity-50">{{ $admin->user->email }}</div>
                                  </div>
                                </div>
                              </td>

                              <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                {{ $admin->organization }}
                              </td>

                              <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                {{ $admin->faculty }}
                              </td>

                              <td class="text-sm text-rose-500 text-center font-semibold px-6 py-4 whitespace-nowrap">
                                <i class="fa-regular fa-clock"></i><span class="pl-2">{{ $admin->created_at->format('l, d/m/y | h:i A') }}</span>
                              </td>

                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2 justify-center">
                                  <div class="tooltip" data-tip="View">
                                    <div type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-600">
                                      <a href="{{ route('admin.show', [$admin]) }}"><i class="fa-solid fa-eye"></i></a>
                                      <span class="sr-only">View Admin</span>
                                    </div>
                                  </div>
    
                                  <div class="tooltip" data-tip="Delete">
                                    <div type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-600">
                                      <a href=""><i class="fa-solid fa-trash"></i></a>

                                      <span class="sr-only">Delete Admin</span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                    
                    <div class="w-full mt-8 mb-8">
                      {{ $admins->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection
    </x-drawer.drawer-admin>
  @endif
</x-app-layout>