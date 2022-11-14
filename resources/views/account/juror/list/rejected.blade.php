<x-app-layout>
  @if (Auth::user()->hasRole('superadmin'))
    <x-drawer.drawer-superadmin>
      @section('pageTitle', 'Juror List')

      @section('content')
        <form method="GET" action="">
          @csrf

          <div class="flex items-center mb-4">   
            <label for="simple-search" class="sr-only">Search juror</label>

            <div class="relative w-full">
              <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500" placeholder="Search juror">
            </div>
            <button type="submit" class="p-3 ml-2 text-sm font-medium text-white bg-black rounded-lg border border-rose-700 hover:bg-rose-300 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
        </form>

        <div class="text-right text-black mb-4">
          <span class="font-bold">{{ $countJuror }}</span>
          Juror(s)
        </div>

        <div class="btn-group btn-xs mb-12">
          <div class="btn btn-ghost bg-rose-500 hover:bg-rose-300">
            <a href="{{ route('juror.list.rejected') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>

          <div class="btn btn-ghost bg-rose-300 hover:bg-rose-500">
            <a href="{{ route('juror.grid.rejected') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
            </a>
          </div>
        </div>
        
        <div class="px-2 w-full">
          <div class="bg-white py-2 md:py-7 px-2 md:px-4 xl:px-8">
            <div class="flex flex-col">
              <div class="overflow-x-auto sm:mx-4 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-x-auto">
                    <div class="sm:flex items-center justify-between pl-1 mt-2 mb-4">
                      <div class="flex items-center">
                        <a href="{{ route('juror.list.all') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800 mr-4 sm:mr-8">
                          <div class="py-2 lg:px-8 px-4 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full">
                            <p>All</p>
                          </div>
                        </a>
        
                        <a href="{{ route('juror.list.pending') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800 mr-4 sm:mr-8">
                          <div class="py-2 lg:px-8 px-4 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full">
                            <p>Pending</p>
                          </div>
                        </a>
        
                        <a href="{{ route('juror.list.approved') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800 mr-4 sm:mr-8">
                          <div class="py-2 lg:px-8 px-4 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full">
                            <p>Approved</p>
                          </div>
                        </a>
        
                        <a href="{{ route('juror.list.rejected') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800">
                          <div class="py-2 lg:px-8 px-4 bg-rose-100 text-rose-700 rounded-full">
                            <p>Rejected</p>
                          </div>
                        </a>
                      </div>
                    </div>

                    <div class="bg-rose-100 rounded-lg py-5 px-6 mb-3 text-base text-rose-700 inline-flex items-center w-full" role="alert">
                      <i class="fa-solid fa-person-circle-xmark pr-2"></i>
                      Rejected account request.
                    </div>

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
                            Status
                          </th>

                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                            Action
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        @if($jurors != null)
                          @foreach ($jurors as $juror)
                            @if ($juror->status == 'rejected')
                              <tr class="border-b">
                                <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                  {{ $loop->iteration }}
                                </td>

                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center space-x-3">
                                    <div class="avatar"><div class="mask mask-squircle w-12 h-12"><img src="https://api.lorem.space/image/face?hash=3174" /></div></div>

                                    <div>
                                      <div class="font-bold">{{ $juror->user->title_user }} {{ $juror->user->fullname }}</div>

                                      <div class="text-sm opacity-50">{{ $juror->user->email }}</div>
                                    </div>
                                  </div>
                                </td>

                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                  {{ $juror->organization }}
                                </td>

                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                  {{ $juror->faculty }}
                                </td>

                                <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                  <div class="py-3 px-3 text-sm text-center leading-none text-rose-700 bg-rose-100 rounded">Rejected</div>
                                </td>

                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                  <div class="flex space-x-2 justify-center">
                                    <div class="tooltip" data-tip="View">
                                      <div type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-600">
                                        <a href="{{ route('juror.show', [$juror]) }}"><i class="fa-solid fa-eye"></i></a>
                                        
                                        <span class="sr-only">View Admin</span>
                                      </div>
                                    </div>

                                    <div class="tooltip" data-tip="Edit">
                                      <div type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-600">
                                        <a href="{{ route('juror.edit', [$juror]) }}"><i class="fa-solid fa-pen"></i></a>
  
                                        <span class="sr-only">Edit Admin</span>
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
                            @endif
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                    
                    <div class="w-full mt-8 mb-8">
                      {{ $jurors->links() }}
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
  @endif
</x-app-layout>