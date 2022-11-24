<x-dashboard-layout>
  @section('pageTitle', 'Profile.')

  @section('content')
<!-- component -->
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
<!-- component -->
<div class="flex justify-center relative top-1/3">




  <!-- This is an example component -->
  <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
      <div class="relative flex gap-4">
          <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
          <div class="flex flex-col w-full">
              <div class="flex flex-row justify-between">
                  <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">COMMENTOR</p>
                  <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
              </div>
              <p class="text-gray-400 text-sm">20 April 2022, at 14:88 PM</p>
          </div>
      </div>
      <p class="-mt-4 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Maxime quisquam vero adipisci beatae voluptas dolor ame.</p>
  </div>
  
  
  
  </div>
  <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-indigo-100 rounded-lg p-6">
          <div class="flex items-center space-x-6 mb-4">
              <img class="h-28 w-28 object-cover object-center rounded-full" 
              src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
              <div>
                  <p class="text-xl text-gray-700 font-normal mb-1">Dany Bailey</p>
                  <p class="text-base text-blue-600 font-normal">Software Engineer</p>
              </div>
          </div>
          <div>
              <p class="text-gray-400 leading-loose font-normal text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
      </div>
  </div>
</section>
  @endsection
</x-dashboard-layout>