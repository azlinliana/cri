<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CRI-UMK') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/bce1720c36.js" crossorigin="anonymous"></script>

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
  </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0">
      <div class="drawer drawer-mobile">
        <input id="dashboard-drawer" type="checkbox" class="drawer-toggle" />
        
        <div class="drawer-content flex flex-col">
          <!-- Navbar -->
          <div class="navbar bg-transparent">
            <div class="flex-1">
              <label for="dashboard-drawer" class="btn btn-ghost btn-circle lg:hidden">
                <i class="fa-solid fa-bars fa-lg"></i>
              </label>
      
              <div class="normal-case text-2xl font-semibold text-black ml-5">@yield('pageTitle')</div>
            </div>
      
            <div class="flex-none mr-4">
              <div class="hidden md:block">
                <form method="POST" action="" id="display_search_form" style="display: none" class="mr-2">
                  @csrf
      
                  <input type="text" name="" placeholder="Search here" class="input input-bordered w-full max-w-xs rounded-full focus:border-rose-600 transition" />
                </form>
              </div>
      
              <button class="btn btn-ghost btn-circle hidden sm:block" id="show_search">
                <i class="fa-solid fa-magnifying-glass fa-lg"></i>
              </button>
      
              <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                  <i class="fa-solid fa-calendar fa-lg"></i>
                </label>
                
                <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                  <div class="card-body">
                    <span class="font-bold text-lg">8 Items</span>
                    <span class="text-info">Subtotal: $999</span>
                    <div class="card-actions">
                      <button class="btn btn-primary btn-block">View cart</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                  <div class="w-10 rounded-full">
                    <img src="https://placeimg.com/80/80/people" />
                  </div>
                </label>
  
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                  <li>
                    <a> Profile</a>
                  </li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
      
                      <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Content -->
          <div class="flex flex-initial mt-8 mr-5 ml-5">
            @yield('content')
          </div>
        </div>
  
        <div class="drawer-side">
          <label for="dashboard-drawer" class="drawer-overlay"></label>
  
          <ul class="menu p-4 overflow-y-auto w-72 bg-base-100 space-y-2 tracking-wide">
            @if (Auth::user()->hasRole('superadmin'))
              <li>
                <a href="{{ route('dashboard') }}" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'dashboard' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-house-chimney"></i>
                  <span class="-mr-1 font-medium">Dashboard.</span>
                </a>
              </li>

              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Account</div>
              <li>
                <a href="{{ route('superadmin.profile') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'superadmin.profile' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-address-card"></i>
                  <span class="group-hover:text-gray-700">Profile</span>
                </a>
              </li>

              <li>
                <a href="{{ route('users.index') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'users.index' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-users-rectangle"></i>
                  <span class="group-hover:text-gray-700">Users Account</span>
                </a>
              </li>

              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Project</div>
              <li>
                <a href="{{ route('superadmin.entryindex') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-file-circle-plus"></i>
                  <span class="group-hover:text-gray-700">Project Entry</span>
                </a>
              </li>
    
              <li>
                <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-file-circle-check"></i>
                  <span class="group-hover:text-gray-700">Project Submission</span>
                </a>
              </li>

              <li>
                <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-list-check"></i>
                  <span class="group-hover:text-gray-700">Project Evaluation</span>
                </a>
              </li>
    
              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Payment</div>
              <li>
                <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-credit-card"></i>
                  <span class="group-hover:text-gray-700">Project Payment</span>
                </a>
              </li>
            @endif

            @if (Auth::user()->hasRole('admin'))
              <li>
                <a href="{{ route('dashboard') }}" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'dashboard' ? 'text-white bg-gradient-to-r from-blue-700 to-blue-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-house-chimney"></i>
                  <span class="-mr-1 font-medium">Dashboard.</span>
                </a>
              </li>

              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Account</div>
              <li>
                <a href="{{ route('admin.profile') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'admin.profile' ? 'text-white bg-gradient-to-r from-blue-700 to-blue-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-address-card"></i>
                  <span class="group-hover:text-gray-700">Profile</span>
                </a>
              </li>

              <li>
                <a href="{{ route('users.index') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'users.index' ? 'text-white bg-gradient-to-r from-blue-700 to-blue-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-users-rectangle"></i>
                  <span class="group-hover:text-gray-700">Users Account</span>
                </a>
              </li>

              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Project</div>
              <li>
                <a href="{{ route('superadmin.entryindex') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-blue-700 to-blue-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-file-circle-plus"></i>
                  <span class="group-hover:text-gray-700">Project Entry</span>
                </a>
              </li>

              <li>
                <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-blue-700 to-blue-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-list-check"></i>
                  <span class="group-hover:text-gray-700">Project Evaluation</span>
                </a>
              </li>
    
              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Payment</div>
              <li>
                <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-blue-700 to-blue-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-credit-card"></i>
                  <span class="group-hover:text-gray-700">Project Payment</span>
                </a>
              </li>
            @endif

            @if (Auth::user()->hasRole('juror'))
            <li>
              <a href="{{ route('dashboard') }}" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'dashboard' ? 'text-white bg-gradient-to-r from-yellow-300 to-yellow-200' : 'text-gray-600 group' }}">
                <i class="fa-solid fa-house-chimney"></i>
                <span class="-mr-1 font-medium">Dashboard.</span>
              </a>
            </li>

            <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Account</div>
            <li>
              <a href="{{ route('juror.profile') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'juror.profile' ? 'text-white bg-gradient-to-r from-yellow-300 to-yellow-200' : 'text-gray-600 group' }}">
                <i class="fa-solid fa-address-card"></i>
                <span class="group-hover:text-gray-700">Profile</span>
              </a>
            </li>

            <li>
              <a href="{{ route('users.index') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'users.index' ? 'text-white bg-gradient-to-r from-yellow-300 to-yellow-200' : 'text-gray-600 group' }}">
                <i class="fa-solid fa-users-rectangle"></i>
                <span class="group-hover:text-gray-700">Users Account</span>
              </a>
            </li>

            <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Project</div>
  
            <li>
              <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-yellow-300 to-yellow-200' : 'text-gray-600 group' }}">
                <i class="fa-solid fa-file-circle-check"></i>
                <span class="group-hover:text-gray-700">Project Submission</span>
              </a>
            </li>

            <li>
              <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-yellow-300 to-yellow-200' : 'text-gray-600 group' }}">
                <i class="fa-solid fa-list-check"></i>
                <span class="group-hover:text-gray-700">Project Evaluation</span>
              </a>
            </li>
            @endif

            @if (Auth::user()->hasRole('participant'))
              <li>
                <a href="{{ route('dashboard') }}" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'dashboard' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-house-chimney"></i>
                  <span class="-mr-1 font-medium">Dashboard.</span>
                </a>
              </li>

              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Account</div>
              <li>
                <a href="{{ route('participant.profile') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == 'superadmin.profile' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-address-card"></i>
                  <span class="group-hover:text-gray-700">Profile</span>
                </a>
              </li>

              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Project</div>
              <li>
                <a href="{{ route('superadmin.entryindex') }}" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-file-circle-plus"></i>
                  <span class="group-hover:text-gray-700">Project Entry</span>
                </a>
              </li>
    
              <li>
                <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-file-circle-check"></i>
                  <span class="group-hover:text-gray-700">Project Submission</span>
                </a>
              </li>

              <li>
                <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-list-check"></i>
                  <span class="group-hover:text-gray-700">Project Evaluation</span>
                </a>
              </li>
    
              <div class="pl-6 pt-4 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Manage Payment</div>
              <li>
                <a href="#" aria-label="profile" class="relative px-4 py-3 flex items-center space-x-4 rounded-md {{ Route::currentRouteName() == '' ? 'text-white bg-gradient-to-r from-rose-700 to-rose-200' : 'text-gray-600 group' }}">
                  <i class="fa-solid fa-credit-card"></i>
                  <span class="group-hover:text-gray-700">Project Payment</span>
                </a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>