<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'Create Admin Account')

    @section('content')
      <div class="bg-white text-black shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <form method="POST" action="{{ route('admin.create') }}">
          @csrf

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2">
                Title
              </label>

              <select id="title_user" class="select appearance-none block w-full bg-white dark:bg-white text-grey-darker border border-gray rounded py-3 px-4 mb-3" name="title_user" :value="old('title_user')" required autofocus>
                <option disabled selected>Pick admin title</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Miss">Miss</option>
              </select>
            </div>

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2">
                Full Name
              </label>

              <input id="fullname" type="text" name="fullname" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 mb-3" placeholder="Admin's full name" :value="old('fullname')" required autofocus>
              
              <p class="text-red text-xs italic">As per IC.</p>
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2">
                Gender
              </label>

              <select id="gender" class="select appearance-none block w-full bg-white dark:bg-white text-grey-darker border border-gray rounded py-2 px-4 mb-3" name="gender" :value="old('gender')" required autofocus>
                <option disabled selected>Pick admin gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2">
                Phone Number
              </label>

              <input id="phone_number" type="text" name="phone_number" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 mb-3" placeholder="Admin's phone number" :value="old('phone_number')" required autofocus>
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2" for="grid-first-name">
                Email
              </label>

              <input id="email" type="email" name="email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 mb-3" placeholder="Admin's email" :value="old('email')" required autofocus>              
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0" x-data="{ show: true }">
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2" for="grid-first-name">
                Password
              </label>

              <label class="relative block">
                <input id="password" 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 mb-3" 
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
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2" for="grid-first-name">
                Confirm Password
              </label>

              <label class="relative block">
                <input id="password_confirmation" 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 mb-3" 
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
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2" for="grid-first-name">
                Organization
              </label>

              <input id="organization" type="text" name="organization" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 mb-3" placeholder="Admin's organization" :value="old('organization')" required autofocus>
            </div>
            <div class="md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-grey-darker text-md font-semibold mb-2" for="grid-first-name">
                Faculty
              </label>

              <input id="faculty" type="text" name="faculty" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 mb-3" placeholder="Admin's faculty" :value="old('faculty')" required autofocus>
            </div>
          </div>

          <div class="flex items-center justify-end mt-4">
            <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-rose-600 hover:bg-rose-400 focus:outline-none rounded-full">
              <p class="text-normal font-medium leading-none text-white">Create</p>
            </button>
          </div>
        </form>
      </div>
    @endsection
  </x-drawer.drawer-superadmin>
</x-app-layout>