<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'View Juror Request')

    @section('content')
      <x-form-project-layout>
        <x-slot:secTitle>Applicant Information</x-slot:secTitle>
        
        <x-slot:secDesc>Juror personal information.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="juror-title" class="block text-md font-normal text-gray-700 mb-3">Title</label>

              <input id="title_user" type="text" name="title_user" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $juror->user->title_user }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="juror-fullname" class="block text-md font-normal text-gray-700 mb-3">Full Name</label>

              <input id="fullname" type="text" name="name" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $juror->user->fullname }}" required autofocus readonly >
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="juror-gender" class="block text-md font-normal text-gray-700 mb-3">Gender</label>
              
              <input id="gender" type="text" name="gender" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $juror->user->gender }}" required autofocus readonly >
            </div>

            <div class="md:w-1/2 px-3">
              <label for="juror-phone-number" class="block text-md font-normal text-gray-700 mb-3">Phone Number</label>

              <input id="phone_number" type="text" name="phone_number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $juror->user->phone_number }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="juror-email" class="block text-md font-normal text-gray-700 mb-3">Email</label>

              <input id="email" type="text" name="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $juror->user->email }}" required autofocus readonly >
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="juror-organization" class="block text-md font-normal text-gray-700 mb-3">Organization</label>
              
              <input id="organization" type="text" name="organization" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $juror->organization }}" required autofocus readonly >
            </div>

            <div class="md:w-1/2 px-3">
              <label for="juror-faculty" class="block text-md font-normal text-gray-700 mb-3">Faculty</label>

              <input id="faculty" type="text" name="faculty" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $juror->faculty }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="juror-field-of-study" class="block text-md font-normal text-gray-700 mb-3">Field of Study</label>

              <input id="field_of_study" type="text" name="field_of_study" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $juror->field_of_study }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="juror-expertise" class="block text-md font-normal text-gray-700 mb-3">Expertise</label>

              <input id="expertise" type="text" name="expertise" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $juror->expertise }}" required autofocus readonly >
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="juror-cv" class="block text-md font-normal text-gray-700 mb-3">CV</label>

              <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                  <div class="flex w-0 flex-1 items-center">
                    <i class="fa-solid fa-paperclip"></i>
                    
                    <span class="ml-2 w-0 flex-1 truncate">{{ $juror->cv }}</span>
                  </div>
                  <div class="ml-4 flex-shrink-0">
                    <a href="/storage/account/juror/cv/{{ $juror->cv }}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">View</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <x-form-project-layout>
        <x-slot:secTitle>Cluster Information</x-slot:secTitle>
        
        <x-slot:secDesc>This is the cluster choosen by applicant when requesting for an account</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="juror-status" class="block text-md font-normal text-gray-700 mb-3">Chosen Cluster</label>
              
              <div class="form-check mb-4">
                @foreach($juror->clusters as $cluster)
                  <ul class="mb-4">
                    <i class="fa-solid fa-circle-check fa-lg"></i>

                    <label class="inline-block text-gray-800 ml-3">
                      {{ $cluster->name }}
                    </label>
                  </ul>
                @endforeach
              </div>
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <x-form-project-layout>
        <x-slot:secTitle>Application Status</x-slot:secTitle>
        
        <x-slot:secDesc>This is the status of the juror account request.</x-slot:secDesc>

        <x-slot:formElement>
          @if ($juror->status == "pending")
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="juror-status" class="block text-md font-normal text-gray-700 mb-3">Status</label>

                <input id="status" type="text" name="status" class="form-control block w-full px-3 py-1.5 text-base font-normal text-yellow-700 bg-yellow-100 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-yellow-700 focus:bg-yellow-100 focus:border-blue-600 focus:outline-none" value="Pending" required autofocus readonly >
              </div>
            </div>
          @endif

          @if ($juror->status == "approved")
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="juror-status" class="block text-md font-normal text-gray-700 mb-3">Status</label>

                <input id="status" type="text" name="status" class="form-control block w-full px-3 py-1.5 text-base font-normal text-green-700 bg-green-100 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-green-100 focus:border-blue-600 focus:outline-none" value="Approved" required autofocus readonly >
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="juror-reviewer" class="block text-md font-normal text-gray-700 mb-3">Reviewer</label>

                <input id="reviewer" type="text" name="reviewer" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-gray-200 focus:border-blue-600 focus:outline-none" value="{{ $juror->reviewer }}" required autofocus readonly >
              </div>
            </div>
          @endif

          @if ($juror->status == "rejected")
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="juror-status" class="block text-md font-normal text-gray-700 mb-3">Status</label>

                <input id="status" type="text" name="status" class="form-control block w-full px-3 py-1.5 text-base font-normal text-red-700 bg-rose-100 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-red-700 focus:bg-rose-100 focus:border-blue-600 focus:outline-none" value="Rejected" required autofocus readonly >
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="juror-reason" class="block text-md font-normal text-gray-700 mb-3">Reason</label>

                <input id="reviewer" type="text" name="reviewer" class="form-control block w-full px-3 py-1.5 text-base font-normal text-red-700 bg-rose-100 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-red-700 focus:bg-rose-100 focus:border-blue-600 focus:outline-none" value="{{ $juror->reason }}" required autofocus readonly >
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="juror-reviewer" class="block text-md font-normal text-gray-700 mb-3">Reviewer</label>
                
                <input id="reason" type="text" name="reason" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-gray-200 focus:border-blue-600 focus:outline-none" value="{{ $juror->reviewer }}" required autofocus readonly >
              </div>
            </div>
          @endif
        </x-slot:FormElement>
      </x-form-project-layout>

      <div class="flex items-center justify-end mt-4 gap-4">
        <div class="focus:ring-2 focus:ring-offset-2 focus:ring-zinc-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-zinc-300 hover:bg-zinc-200 focus:outline-none rounded-full">
          <a href="javascript:history.back()"><p class="text-normal font-medium leading-none text-black">Back</p></a>
        </div>

        <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-rose-600 hover:bg-rose-400 focus:outline-none rounded-full">
          <a href="{{ route('juror.edit', [$juror]) }}" class="text-normal font-medium leading-none text-white">Edit</a>
        </button>
      </div>
    @endsection
  </x-drawer.drawer-superadmin>
</x-app-layout>