<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'Create Admin Account')

    @section('content')
      <div class="bg-white text-black shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <form method="POST" action="{{ route('admin.create') }}">
          @csrf

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="title" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Title</label>

              <select id="title_user" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="title_user" :value="old('title_user')" required autofocus>
                <option disabled selected>Pick admin title</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Miss">Miss</option>
              </select>
            </div>

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="fullname" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Full Name</label>

              <input id="fullname" type="text" name="fullname" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Admin's full name" :value="old('fullname')" required autofocus>
              
              <div class="text-sm italic text-gray-600 mt-1">**As per IC.</div>
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="gender" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Gender</label>

              <select id="gender" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="gender" :value="old('gender')" required autofocus>
                <option disabled selected>Pick admin gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="md:w-1/2 px-3">
              <label for="phone_number" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Phone Number</label>

              <input id="phone_number" type="text" name="phone_number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Admin's phone number" :value="old('phone_number')" required autofocus>
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
              <label for="email" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Email</label>

              <input id="email" type="email" name="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Admin's email" :value="old('email')" required autofocus>              
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0" x-data="{ show: true }">
              <label for="password" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Password</label>

              <label class="relative block">
                <input id="password" 
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                  placeholder="Password" 
                  :type="show ? 'password' : 'text'"
                  name="password"
                  required autofocus  
                />
  
                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                  <i class="fa-regular fa-eye-slash" @click="show = !show" :class="{'hidden': !show, 'block':show }" style="color:black;"></i>
                  <i class="fa-regular fa-eye" @click="show = !show" :class="{'block': !show, 'hidden':show }" style="color:black;"></i>
                </span>
              </label>
            </div>

            <div class="md:w-1/2 px-3" x-data="{ show: true }">
              <label for="confirm_password" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Confirm Password</label>

              <label class="relative block">
                <input id="password_confirmation" 
                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                  placeholder="Confirm Password" 
                  :type="show ? 'password' : 'text'"
                  name="password_confirmation"
                  required autofocus  
                />
  
                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                  <i class="fa-regular fa-eye-slash" @click="show = !show" :class="{'hidden': !show, 'block':show }" style="color:black;"></i>
                  <i class="fa-regular fa-eye" @click="show = !show" :class="{'block': !show, 'hidden':show }" style="color:black;"></i>
                </span>
              </label>
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="organization" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Organization</label>

              <input id="organization" type="text" name="organization" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Admin's organization" :value="old('organization')" required autofocus>
            </div>
            <div class="md:w-1/2 px-3">
              <label for="faculty" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Faculty</label>

              <input id="faculty" type="text" name="faculty" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Admin's faculty" :value="old('faculty')" required autofocus>
            </div>
          </div>

          <div class="flex items-center justify-end mt-4 gap-4">
            <div class="focus:ring-2 focus:ring-offset-2 focus:ring-zinc-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-zinc-200 hover:bg-zinc-100 focus:outline-none rounded-full">
              <a href="javascript:history.back()"><p class="text-normal font-medium leading-none text-black">Back</p></a>
            </div>
  
            <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-rose-600 hover:bg-rose-400 focus:outline-none rounded-full">
              <p class="text-normal font-medium leading-none text-white">Create</p>
            </button>
          </div>
        </form>
      </div>
    @endsection
  </x-drawer.drawer-superadmin>
</x-app-layout>