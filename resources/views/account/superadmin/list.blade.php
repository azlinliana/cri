<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'Super Admin List')

    @section('content')
      <div class="btn-group btn-xs mb-12">
        <div class="btn btn-ghost bg-rose-500 hover:bg-rose-300">
          <a href="{{ route('superadmin.list') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
              <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>

        <div class="btn btn-ghost bg-rose-300 hover:bg-rose-500">
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

                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                          Gender
                        </th>

                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          Contact Number
                        </th>

                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                          Created At
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @if($superadmins != null)
                        @foreach ($superadmins as $superadmin)
                          <tr class="border-b">
                            <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                              {{ $loop->iteration }}
                            </td>

                            <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center space-x-3">
                                <div class="avatar"><div class="mask mask-squircle w-12 h-12"><img src="https://api.lorem.space/image/face?hash=3174" /></div></div>

                                <div>
                                  <div class="font-bold">{{ $superadmin->title_user }} {{ $superadmin->fullname }} 
                                    @if ($currentUser == $superadmin->id)
                                      <span>(You)</span>
                                    @endif
                                  </div>

                                  <div class="text-sm opacity-50">{{ $superadmin->email }}</div>
                                </div>
                              </div>
                            </td>

                            <td class="text-sm text-center text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                              {{ $superadmin->gender }}
                            </td>

                            <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                              {{ $superadmin->phone_number }}
                            </td>

                            <td class="text-sm text-rose-500 text-center font-semibold px-6 py-4 whitespace-nowrap">
                              <i class="fa-regular fa-clock"></i><span class="pl-2">{{ $superadmin->created_at->format('l, d/m/y | h:i A') }}</span>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                  
                  <div class="w-full mt-8 mb-8">
                    {{ $superadmins->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
  </x-drawer.drawer-superadmin>
</x-app-layout>