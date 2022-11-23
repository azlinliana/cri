<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'View Participant')

    @section('content')
      <x-form-project-layout>
        <x-slot:secTitle>Personal Information</x-slot:secTitle>
        
        <x-slot:secDesc>Particpant's personal information.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="participant-title" class="block text-md font-normal text-gray-700 mb-3">Title</label>

              <input id="title_user" type="text" name="title_user" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $participant->user->title_user }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="participant-fullname" class="block text-md font-normal text-gray-700 mb-3">Full Name</label>

              <input id="fullname" type="text" name="name" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $participant->user->fullname }}" required autofocus readonly >
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="participant-gender" class="block text-md font-normal text-gray-700 mb-3">Gender</label>
              
              <input id="gender" type="text" name="gender" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $participant->user->gender }}" required autofocus readonly >
            </div>

            <div class="md:w-1/2 px-3">
              <label for="participant-phone-number" class="block text-md font-normal text-gray-700 mb-3">Phone Number</label>

              <input id="phone_number" type="text" name="phone_number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $participant->user->phone_number }}" required autofocus readonly >
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="participant-type" class="block text-md font-normal text-gray-700 mb-3">Participant Type</label>
              
              <input id="type" type="text" name="type" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $participant->type }}" required autofocus readonly >
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <x-form-project-layout>
        <x-slot:secTitle>Organization Information</x-slot:secTitle>
        
        <x-slot:secDesc>Participant's organization information.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="participant-organization" class="block text-md font-normal text-gray-700 mb-3">Organization</label>
              
              <input id="organization" type="text" name="organization" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $participant->organization }}" required autofocus readonly >
            </div>

            <div class="md:w-1/2 px-3">
              <label for="participant-faculty" class="block text-md font-normal text-gray-700 mb-3">Faculty</label>

              <input id="faculty" type="text" name="faculty" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $participant->faculty }}" required autofocus readonly >
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <x-form-project-layout>
        <x-slot:secTitle>Mailing Address</x-slot:secTitle>
        
        <x-slot:secDesc>Participant's mailing address</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="address-line-one" class="block text-md font-normal text-gray-700 mb-3">Address Line One</label>

              <input id="participant-address-line-one" type="text" name="address_line_one" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $participant->address_line_one }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="participant-address-line-two" class="block text-md font-normal text-gray-700 mb-3">Address Line Two</label>

              <input id="participant-address-line-two" type="text" name="address_line_two" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $participant->address_line_two }}" required autofocus readonly >
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="participant-area" class="block text-md font-normal text-gray-700 mb-3">Area</label>
              
              <input id="area" type="text" name="area" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $participant->organization }}" required autofocus readonly >
            </div>

            <div class="md:w-1/2 px-3">
              <label for="participant-state" class="block text-md font-normal text-gray-700 mb-3">State</label>

              <input id="state" type="text" name="state" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $participant->faculty }}" required autofocus readonly >
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="participant-area" class="block text-md font-normal text-gray-700 mb-3">Postal Code</label>
              
              <input id="postal_code" type="text" name="postal_code" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $participant->postal_code }}" required autofocus readonly >
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <x-form-project-layout>
        <x-slot:secTitle>Account Information</x-slot:secTitle>
        
        <x-slot:secDesc>Participant's account information.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="participant-email" class="block text-md font-normal text-gray-700 mb-3">Email</label>

              <input id="email" type="text" name="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $participant->user->email }}" required autofocus readonly >
            </div>
          </div>
          
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="participant-account" class="block text-md font-normal text-gray-700 mb-3">Account Creation</label>

              <i class="fa-regular fa-clock" style="color: red"></i><span class="pl-2 text-rose-500 font-semibold">{{ $participant->user->created_at->format('l, d/m/y | h:i A') }}</span>
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