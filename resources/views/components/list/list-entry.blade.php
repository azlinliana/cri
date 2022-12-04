@if (Auth::user()->hasRole('participant'))
    <form method="GET" action="{{ route('entry.participant.search') }}">
        @csrf

        <div class="flex items-center mb-4">   
            <label for="simple-search" class="sr-only">Search entry</label>

            <div class="relative w-full">
                <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Search entry">
            </div>
            <button type="submit" class="p-3 ml-2 text-sm font-medium text-white bg-black rounded-lg border border-orange-700 hover:bg-orange-300 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-500 dark:hover:bg-orange-700 dark:focus:ring-orange-800"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>

    <div class="text-right text-black mb-4">
        <span class="font-bold">{{ $totalEntry }}</span>
        Entry(s)
    </div>
    
    <div class="px-2 w-full">
        <div class="bg-white py-2 md:py-7 px-2 md:px-3 xl:px-8">
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center">
                </div>
            
                <button class="mb-2 mr-2 focus:ring-2 focus:ring-offset-2 focus:ring-orange-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-orange-300 hover:bg-orange-400 focus:outline-none rounded-full">
                    <p class="text-sm font-medium leading-none text-white">
                        <a href="{{ route('entry.participant.create') }}">New Project</a>
                    </p>
                </button>
            </div>
        
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:mx-4 lg:-mx-8">
                    <div class="sm:flex items-center justify-between mt-3 mb-2 ml-8 mr-8">
                        <div class="flex items-center">
                            <a href="{{ route('entry.participant.list.all') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-orange-50 focus:ring-orange-800">
                                <div class="{{ Route::currentRouteName() == 'entry.participant.list.all' ? 'py-2 lg:px-8 px-4 bg-orange-100 text-orange-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-orange-700 hover:bg-orange-100 rounded-full' }}">
                                    <p>All</p>
                                </div>
                            </a>
        
                            <a href="{{ route('entry.participant.list.draft') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-orange-50 focus:ring-orange-800 ml-4 sm:ml-8">
                                <div class="{{ Route::currentRouteName() == 'entry.participant.list.draft' ? 'py-2 lg:px-8 px-4 bg-orange-100 text-orange-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-orange-700 hover:bg-orange-100 rounded-full' }}">
                                    <p>Draft</p>
                                </div>
                            </a>
        
                            <a href="{{ route('entry.participant.list.pending') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-orange-50 focus:ring-orange-800 ml-4 sm:ml-8">
                                <div class="{{ Route::currentRouteName() == 'entry.participant.list.pending' ? 'py-2 lg:px-8 px-4 bg-orange-100 text-orange-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-orange-700 hover:bg-orange-100 rounded-full' }}">
                                    <p>Pending</p>
                                </div>
                            </a>
        
                            <a href="{{ route('entry.participant.list.accepted') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-orange-50 focus:ring-orange-800 ml-4 sm:ml-8">
                                <div class="{{ Route::currentRouteName() == 'entry.participant.list.accepted' ? 'py-2 lg:px-8 px-4 bg-orange-100 text-orange-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-orange-700 hover:bg-orange-100 rounded-full' }}">
                                    <p>Accepted</p>
                                </div>
                            </a>
        
                            <a href="{{ route('entry.participant.list.rejected') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-orange-50 focus:ring-orange-800 ml-4 sm:ml-8">
                                <div class="{{ Route::currentRouteName() == 'entry.participant.list.rejected' ? 'py-2 lg:px-8 px-4 bg-orange-100 text-orange-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-orange-700 hover:bg-orange-100 rounded-full' }}">
                                    <p>Rejected</p>
                                </div>
                            </a>
                        </div>
                    </div>
        
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            No
                                        </th>
                    
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Project Title
                                        </th>
                    
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Cluster
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
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                            {{-- {{ $loop->iteration }} --}}
                                        </td>
                
                                        <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                                <div>
                                                    <div class="text-lg">Project Title</div>
                    
                                                    <div class="font-bold opacity-50 ">Project Id:</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">

                                        </td>
            
                
                                        <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                            {{-- @if ($participant->type == 'Internal')
                                                <div class="py-3 px-3 text-sm text-center leading-none text-orange-700 bg-orange-100 rounded">{{ $participant->type }}</div>
                                            @endif
                
                                            @if ($participant->type == 'External')
                                                <div class="py-3 px-3 text-sm text-center leading-none text-orange-50 bg-orange-400 rounded">{{ $participant->type }}</div>
                                            @endif --}}
                                        </td>
                
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-2 justify-center">
                                                <div class="tooltip" data-tip="View">
                                                    <div type="button" class="text-orange-500 border border-orange-400 hover:bg-orange-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-orange-500 dark:text-orange-500 dark:hover:text-white dark:focus:ring-orange-600">
                                                        <a href=""><i class="fa-solid fa-eye"></i></a>
                                                    
                                                        <span class="sr-only">View Entry</span>
                                                    </div>
                                                </div>
                
                                                <div class="tooltip" data-tip="Delete">
                                                    <div type="button" class="text-orange-500 border border-orange-400 hover:bg-orange-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-orange-500 dark:text-orange-500 dark:hover:text-white dark:focus:ring-orange-600">
                                                        <a href=""><i class="fa-solid fa-pencil"></i></a>
                
                                                        <span class="sr-only">Edit Entry</span>
                                                    </div>
                                                </div>
                
                                                <div class="tooltip" data-tip="Delete">
                                                    <div type="button" class="text-orange-500 border border-orange-400 hover:bg-orange-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-orange-500 dark:text-orange-500 dark:hover:text-white dark:focus:ring-orange-600">
                                                        <a href=""><i class="fa-solid fa-trash"></i></a>
                
                                                        <span class="sr-only">Delete Entry</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="w-full mt-8 mb-8">
                            {{-- {{ $participants->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
    <form method="GET" action="{{ route('entry.participant.search') }}">
        @csrf

        <div class="flex items-center mb-4">   
            <label for="simple-search" class="sr-only">Search entry</label>

            <div class="relative w-full">
                <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white {{ Auth::user()->hasRole('superadmin') ? 'focus:ring-rose-300 focus:border-rose-500 dark:focus:ring-rose-500 dark:focus:border-rose-500' : 'focus:ring-blue-300 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500' }}" placeholder="Search entry">
            </div>

            <button type="submit" class="p-3 ml-2 text-sm font-medium text-white bg-black rounded-lg {{ Auth::user()->hasRole('superadmin') ? 'border border-rose-700 hover:bg-rose-300 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-rose-500 dark:hover:bg-rose-700 dark:focus:ring-rose-800' : 'border border-sky-700 hover:bg-sky-300 focus:ring-4 focus:outline-none focus:ring-sky-300 dark:bg-sky-500 dark:hover:bg-sky-700 dark:focus:ring-sky-800' }}"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>

    <div class="text-right text-black mb-4">
        <span class="font-bold">{{ $totalEntry }}</span>
        Entry(s)
    </div>
    
    <div class="px-2 w-full">
        <div class="bg-white py-2 md:py-7 px-2 md:px-3 xl:px-8">
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center">
                </div>
            </div>
        
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:mx-4 lg:-mx-8">
                    <div class="sm:flex items-center justify-between mt-3 mb-3 ml-8 mr-8">
                        <div class="flex items-center">
                            @if(Auth::user()->hasRole('superadmin'))
                                <a href="{{ route('entry.users.list.all') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800">
                                    <div class="{{ Route::currentRouteName() == 'entry.users.list.all' ? 'py-2 lg:px-8 px-4 bg-rose-100 text-rose-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full' }}">
                                        <p>All</p>
                                    </div>
                                </a>
            
                                <a href="{{ route('entry.users.list.pending') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800 ml-4 sm:ml-8">
                                    <div class="{{ Route::currentRouteName() == 'entry.users.list.pending' ? 'py-2 lg:px-8 px-4 bg-rose-100 text-rose-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full' }}">
                                        <p>Pending</p>
                                    </div>
                                </a>

                                <a href="{{ route('entry.users.list.accepted') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800 ml-4 sm:ml-8">
                                    <div class="{{ Route::currentRouteName() == 'entry.users.list.accepted' ? 'py-2 lg:px-8 px-4 bg-rose-100 text-rose-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full' }}">
                                        <p>Accepted</p>
                                    </div>
                                </a>
            
                                <a href="{{ route('entry.users.list.rejected') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-rose-50 focus:ring-rose-800 ml-4 sm:ml-8">
                                    <div class="{{ Route::currentRouteName() == 'entry.users.list.rejected' ? 'py-2 lg:px-8 px-4 bg-rose-100 text-rose-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-rose-700 hover:bg-rose-100 rounded-full' }}">
                                        <p>Rejected</p>
                                    </div>
                                </a>
                            @endif

                            @if(Auth::user()->hasRole('admin'))
                                <a href="{{ route('entry.users.list.all') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-sky-50 focus:ring-sky-800">
                                    <div class="{{ Route::currentRouteName() == 'entry.users.list.all' ? 'py-2 lg:px-8 px-4 bg-sky-100 text-sky-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-sky-700 hover:bg-sky-100 rounded-full' }}">
                                        <p>All</p>
                                    </div>
                                </a>
            
                                <a href="{{ route('entry.users.list.pending') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-sky-50 focus:ring-sky-800 ml-4 sm:ml-8">
                                    <div class="{{ Route::currentRouteName() == 'entry.users.list.pending' ? 'py-2 lg:px-8 px-4 bg-sky-100 text-sky-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-sky-700 hover:bg-sky-100 rounded-full' }}">
                                        <p>Pending</p>
                                    </div>
                                </a>

                                <a href="{{ route('entry.users.list.accepted') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-sky-50 focus:ring-sky-800 ml-4 sm:ml-8">
                                    <div class="{{ Route::currentRouteName() == 'entry.users.list.accepted' ? 'py-2 lg:px-8 px-4 bg-sky-100 text-sky-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-sky-700 hover:bg-sky-100 rounded-full' }}">
                                        <p>Accepted</p>
                                    </div>
                                </a>

                                <a href="{{ route('entry.users.list.rejected') }}" class="rounded-full focus:outline-none focus:ring-2 focus:bg-sky-50 focus:ring-sky-800 ml-4 sm:ml-8">
                                    <div class="{{ Route::currentRouteName() == 'entry.users.list.rejected' ? 'py-2 lg:px-8 px-4 bg-sky-100 text-sky-700 rounded-full' : 'py-2 lg:px-8 px-3 text-gray-600 hover:text-sky-700 hover:bg-sky-100 rounded-full' }}">
                                        <p>Rejected</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
        
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            No
                                        </th>
                    
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Project Title
                                        </th>
                    
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Cluster
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
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                            {{-- {{ $loop->iteration }} --}}
                                        </td>
                
                                        <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                            <div>
                                                <div class="text-lg">Project Title</div>
                
                                                <div class="font-bold opacity-50 ">Project Id:</div>
                                            </div>
                                            </div>
                                        </td>
                
                                        <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                            
                                        </td>
                
                                        <td class="text-sm text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                                            {{-- @if ($participant->type == 'Internal')
                                            <div class="py-3 px-3 text-sm text-center leading-none text-orange-700 bg-orange-100 rounded">{{ $participant->type }}</div>
                                            @endif
                
                                            @if ($participant->type == 'External')
                                            <div class="py-3 px-3 text-sm text-center leading-none text-orange-50 bg-orange-400 rounded">{{ $participant->type }}</div>
                                            @endif --}}
                                        </td>
                
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-2 justify-center">
                                                <div class="tooltip" data-tip="View">
                                                    <div type="button" class="hover:text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:hover:text-white {{ Auth::user()->hasRole('superadmin') ? 'text-rose-500 border border-rose-400 hover:bg-rose-400 focus:ring-rose-300 dark:border-rose-500 dark:text-rose-500 dark:focus:ring-rose-600' : 'text-sky-500 border border-sky-400 hover:bg-sky-400 focus:ring-sky-300 dark:border-sky-500 dark:text-sky-500 dark:focus:ring-sky-600' }}">
                                                        <a href=""><i class="fa-solid fa-eye"></i></a>
                                                    
                                                        <span class="sr-only">View Entry</span>
                                                    </div>
                                                </div>
                
                                                <div class="tooltip" data-tip="Edit">
                                                    <div type="button" class="hover:text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:hover:text-white {{ Auth::user()->hasRole('superadmin') ? 'text-rose-500 border border-rose-400 hover:bg-rose-400 focus:ring-rose-300 dark:border-rose-500 dark:text-rose-500 dark:focus:ring-rose-600' : 'text-sky-500 border border-sky-400 hover:bg-sky-400 focus:ring-sky-300 dark:border-sky-500 dark:text-sky-500 dark:focus:ring-sky-600' }}">
                                                    <a href=""><i class="fa-solid fa-pencil"></i></a>
                
                                                    <span class="sr-only">Edit Entry</span>
                                                    </div>
                                                </div>
                
                                                <div class="tooltip" data-tip="Delete">
                                                    <div type="button" class="hover:text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:hover:text-white {{ Auth::user()->hasRole('superadmin') ? 'text-rose-500 border border-rose-400 hover:bg-rose-400 focus:ring-rose-300 dark:border-rose-500 dark:text-rose-500 dark:focus:ring-rose-600' : 'text-sky-500 border border-sky-400 hover:bg-sky-400 focus:ring-sky-300 dark:border-sky-500 dark:text-sky-500 dark:focus:ring-sky-600' }}">
                                                        <a href=""><i class="fa-solid fa-trash"></i></a>
                
                                                        <span class="sr-only">Delete Entry</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="w-full mt-8 mb-8">
                            {{-- {{ $participants->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif