<x-dashboard-layout>
  @section('pageTitle', 'Users Account.')

  @section('content')
    <div class="flex items-center justify-center mx-auto pt-16">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
        <a href="{{ route('superadmin.list') }}">
          <div class="relative py-6 px-6 rounded-3xl w-64 my-4 shadow-xl border-1 hover:bg-gray-100">        
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-rose-600 left-4 -top-6">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
              </svg>                           
            </div>

            <div class="mt-8">
              <p class="text-xl font-semibold my-2">Super Admin</p>

              <div class="flex space-x-2 text-gray-400 text-sm">
                <p></p> 
              </div>
              <div class="flex space-x-2 text-gray-400 text-sm my-3">
                <p></p> 
              </div>

              <div class="border-t-2"></div>

              <div class="flex justify-between">
                <div class="my-2">
                  <p class="font-semibold text-base mb-2">Total</p>

                  <div class="flex space-x-2">
                    <p>2</p>
                  </div>
                </div>

                <div class="my-2">
                  <p class="font-semibold text-base mb-2"></p>

                  <div class="text-base text-gray-400 font-semibold">
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>

        <a href="{{ route('admin.list') }}">
          <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl hover:bg-gray-100">
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-800 left-4 -top-6">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
              </svg>  
            </div>

            <div class="mt-8">
              <p class="text-xl font-semibold my-2">Admin</p>

              <div class="flex space-x-2 text-gray-400 text-sm">
                <p></p> 
              </div>

              <div class="flex space-x-2 text-gray-400 text-sm my-3">
                <p></p> 
              </div>

              <div class="border-t-2 "></div>

              <div class="flex justify-between">
                <div class="my-2">
                  <p class="font-semibold text-base mb-2">Total</p>

                  <div class="flex space-x-2">
                    <p>4</p>
                  </div>
                </div>

                <div class="my-2">
                  <p class="font-semibold text-base mb-2"></p>

                  <div class="text-base text-gray-400 font-semibold">
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>

        <a href="{{ route('juror.list') }}">
          <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl hover:bg-gray-100">
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-yellow-500 left-4 -top-6">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
              </svg>  
            </div>

            <div class="mt-8">
              <p class="text-xl font-semibold my-2">Juror</p>
              <div class="flex space-x-2 text-gray-400 text-sm">
                <p></p> 
              </div>

              <div class="flex space-x-2 text-gray-400 text-sm my-3">
                <p></p> 
              </div>

              <div class="border-t-2 "></div>

              <div class="flex justify-between">
                <div class="my-2">
                  <p class="font-semibold text-base mb-2">Total</p>
                  <div class="flex space-x-2">
                  </div>
                </div>

                <div class="my-2">
                  <p class="font-semibold text-base mb-2">Pending</p>
                  <div class="text-base text-gray-400 font-semibold">
                    <p>4</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>

        <a href="{{ route('participant.list.all') }}">
          <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl hover:bg-gray-100">
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-orange-500 left-4 -top-6">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
              </svg>  
            </div>

            <div class="mt-8">
              <p class="text-xl font-semibold my-2">Participant</p>

              <div class="flex space-x-2 text-gray-400 text-sm">
                <p></p> 
              </div>

              <div class="flex space-x-2 text-gray-400 text-sm my-3">
                <p></p> 
              </div>

              <div class="border-t-2 "></div>

              <div class="flex justify-between">
                <div class="my-2">
                  <p class="font-semibold text-base mb-2">Total</p>

                  <div class="flex space-x-2">
                    <div class="text-base text-gray-400 font-semibold">
                      <p>5</p>
                  </div>
                  </div>
                </div>
                <div class="my-2">
                    <p class="font-semibold text-base mb-2"></p>
                    <div class="text-base text-gray-400 font-semibold">
                        <p></p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  @endsection
</x-dashboard-layout>