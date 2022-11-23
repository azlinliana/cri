<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'View Admin')

    @section('content')
      <x-form-project-layout>
        <x-slot:secTitle>Personal Information</x-slot:secTitle>
        
        <x-slot:secDesc>Admin personal information.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="admin-title" class="block text-md font-normal text-gray-700 mb-3">Title</label>

              <input id="title_user" type="text" name="title_user" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $admin->user->title_user }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="admin-fullname" class="block text-md font-normal text-gray-700 mb-3">Full Name</label>

              <input id="fullname" type="text" name="name" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $admin->user->fullname }}" required autofocus readonly >
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="admin-gender" class="block text-md font-normal text-gray-700 mb-3">Gender</label>
              
              <input id="gender" type="text" name="gender" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $admin->user->gender }}" required autofocus readonly >
            </div>

            <div class="md:w-1/2 px-3">
              <label for="admin-phone-number" class="block text-md font-normal text-gray-700 mb-3">Phone Number</label>

              <input id="phone_number" type="text" name="phone_number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $admin->user->phone_number }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="admin-email" class="block text-md font-normal text-gray-700 mb-3">Email</label>

              <input id="email" type="text" name="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $admin->user->email }}" required autofocus readonly >
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <x-form-project-layout>
        <x-slot:secTitle>Organization Information</x-slot:secTitle>
        
        <x-slot:secDesc>Admin's organization information.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="admin-organization" class="block text-md font-normal text-gray-700 mb-3">Organization</label>
              
              <input id="organization" type="text" name="organization" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $admin->organization }}" required autofocus readonly >
            </div>

            <div class="md:w-1/2 px-3">
              <label for="admin-faculty" class="block text-md font-normal text-gray-700 mb-3">Faculty</label>

              <input id="faculty" type="text" name="faculty" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $admin->faculty }}" required autofocus readonly >
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <x-form-project-layout>
        <x-slot:secTitle>Account Information</x-slot:secTitle>
        
        <x-slot:secDesc>Admin's account information.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="admin-account" class="block text-md font-normal text-gray-700 mb-3">Account Creation</label>

              <i class="fa-regular fa-clock" style="color: red"></i><span class="pl-2 text-rose-500 font-semibold">{{ $admin->user->created_at->format('l, d/m/y | h:i A') }}</span>
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <div class="flex items-center justify-end mt-4 gap-4">
        <div class="focus:ring-2 focus:ring-offset-2 focus:ring-zinc-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-zinc-300 hover:bg-zinc-200 focus:outline-none rounded-full">
          <a href="javascript:history.back()"><p class="text-normal font-medium leading-none text-black">Back</p></a>
        </div>
      </div>
    @endsection
  </x-drawer.drawer-superadmin>
</x-app-layout>