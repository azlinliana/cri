<x-app-layout>
  @if (Auth::user()->hasRole('superadmin'))
    <x-drawer.drawer-superadmin>
      @section('pageTitle', 'Search Results')

      @section('content')
        <form method="GET" action="{{ route('participant.list.search') }}">
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

          <div class="px-2 w-full">
            <div class="bg-white py-2 md:py-7 px-2 md:px-4 xl:px-8">
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
                              Type
                            </th>
  
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                              Action
                            </th>
                          </tr>
                        </thead>
  
                        <tbody>
                          @if ($queryParticipants != null)
                            @foreach ($queryParticipants as $participant)
                              <tr class="border-b">
                                <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                  {{ $loop->iteration }}
                                </td>

                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center space-x-3">
                                    <div class="avatar"><div class="mask mask-squircle w-12 h-12"><img src="https://api.lorem.space/image/face?hash=3174" /></div></div>

                                    <div>
                                      <div class="font-bold">{{ $participant->title_user }} {{ $participant->fullname }}</div>

                                      <div class="text-sm opacity-50">{{ $participant->email }}</div>
                                    </div>
                                  </div>
                                </td>

                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                  {{ $participant->organization }}
                                </td>

                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                  {{ $participant->faculty }}
                                </td>

                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                  @if ($participant->type == 'Internal')
                                    <div class="py-3 px-3 text-sm text-center leading-none text-rose-700 bg-rose-100 rounded">{{ $participant->type }}</div>
                                  @endif
      
                                  @if ($participant->type == 'External')
                                    <div class="py-3 px-3 text-sm text-center leading-none text-rose-50 bg-rose-400 rounded">{{ $participant->type }}</div>
                                  @endif
                                </td>

                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                  <div class="flex space-x-2 justify-center">
                                    <div class="tooltip" data-tip="View">
                                      <div type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-600">
                                        <a href="{{ route('participant.show', [$participant]) }}"><i class="fa-solid fa-eye"></i></a>
                                        
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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