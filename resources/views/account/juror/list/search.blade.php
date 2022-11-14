<x-app-layout>
  @if (Auth::user()->hasRole('superadmin'))
    <x-drawer.drawer-superadmin>
      @section('pageTitle', 'Search Results')

      @section('content')
        <form method="GET" action="{{ route('juror.list.search') }}">
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
  
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              CV
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
                          @if ($queryJurors != null)
                            @foreach ($queryJurors as $juror)
                              <tr>
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
  
                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                  <div class="flex w-full break-words mt-3">
                                    <div class="flex flex-col">
                                      <div class="my-4">
                                        <div class="flex flex-row space-x-4 items-center">
                                          <div><i class="fa-solid fa-file fa-2xl"></i></div>
                                          <div class="w-full">
                                            <div class="flex items-center justify-between break-words">
                                              <p class="truncate w-12 overflow-hidden text-gray-900 text-sm text-slate-500">
                                                <a class="link link-primary" href="/storage/account/juror/cv/{{ $juror->cv }}" target="_blank">{{ $juror->cv }}</a>
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
  
                                <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                  @if ($juror->status == 'pending')
                                    <div class="py-3 px-3 text-sm text-center leading-none text-yellow-700 bg-yellow-100 rounded">Pending</div>
                                  @endif
      
                                  @if ($juror->status == 'approved')
                                    <div class="py-3 px-3 text-sm text-center leading-none text-green-700 bg-green-200 rounded">Approved</div>
                                  @endif
  
                                  @if ($juror->status == 'rejected')
                                    <div class="py-3 px-3 text-sm text-center leading-none text-rose-50 bg-rose-400 rounded">Rejected</div>
                                  @endif
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
  
                              <tr class="bg-white">
                                <td colspan="7" class="py-4 px-6">
                                  <div tabindex="0" class="collapse collapse-arrow border-b">
                                    <div class="collapse-title"></div>
  
                                    <div class="collapse-content">
                                      @if ($juror->status == 'pending')
                                        <div class="bg-yellow-100 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full" role="alert">
                                          <i class="fa-solid fa-hourglass pr-2"></i>
                                          Please evaluate the juror account request accordingly.
                                        </div>
                                      @endif
  
                                      @if ($juror->status == 'approved')
                                        <div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full" role="alert">
                                          <i class="fa-solid fa-person-circle-check pr-2"></i>
                                          Approved account request.
                                        </div>
  
                                        <div class="flex">
                                          <div class="text-md font-bold text-gray-700 dark:bg-gray-700 dark:text-gray-400 mb-2">Reviewer:</div>
  
                                          <p class="mb-3 ml-3">
                                            {{ $juror->reviewer }}
                                          </p>
                                        </div>
                                      @endif
  
                                      @if ($juror->status == 'rejected')
                                        <div class="bg-rose-100 rounded-lg py-5 px-6 mb-3 text-base text-rose-700 inline-flex items-center w-full" role="alert">
                                          <i class="fa-solid fa-person-circle-xmark pr-2"></i>
                                          Rejected account request.
                                        </div>
  
                                        <div class="flex">
                                          <div class="basis-1/2">
                                            <div class="text-md font-bold text-gray-700 dark:bg-gray-700 dark:text-gray-400 mb-2">Reviewer:</div>
  
                                            <p class="mb-3">
                                              {{ $juror->reviewer }}
                                            </p>
                                          </div>
  
                                          <div class="basis-1/2">
                                            <div class="text-md font-bold text-gray-700 dark:bg-gray-700 dark:text-gray-400 mb-2">Rejected Reason:</div>
  
                                            <p class="mb-3">
                                              {{ $juror->reason }}
                                            </p>
                                          </div>
                                        </div>
                                      @endif
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
</x-app-layout>