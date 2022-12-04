<x-entry-layout>
  @section('pageTitle', 'Create Entry')

  @section('content')
    <x-form-project-layout>
      <x-slot:secTitle>Section I: Project Leader Information</x-slot:secTitle>
      
      <x-slot:secDesc>Applicant information</x-slot:secDesc>

      <x-slot:formElement>
        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-3">
            <label for="participant-title" class="block text-md font-normal text-gray-700 text-lg mb-3">Title</label>

            <input id="title_user" type="text" name="title_user" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $user->title_user }}" required autofocus readonly >
          </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-3">
            <label for="participant-fullname" class="block text-md font-normal text-gray-700 text-lg mb-3">Full Name</label>

            <input id="fullname" type="text" name="name" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $user->fullname }}" required autofocus readonly >
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label for="participant-gender" class="block text-md font-normal text-gray-700 text-lg mb-3">Gender</label>
            
            <input id="gender" type="text" name="gender" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $user->gender }}" required autofocus readonly >
          </div>

          <div class="md:w-1/2 px-3">
            <label for="participant-phone-number" class="block text-md font-normal text-gray-700 text-lg mb-3">Phone Number</label>

            <input id="phone_number" type="text" name="phone_number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $user->phone_number }}" required autofocus readonly >
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label for="participant-organization" class="block text-md font-normal text-gray-700 text-lg mb-3">Organization</label>
            
            <input id="organization" type="text" name="organization" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $user->participant->organization }}" required autofocus readonly >
          </div>

          <div class="md:w-1/2 px-3">
            <label for="participant-faculty" class="block text-md font-normal text-gray-700 text-lg mb-3">Faculty</label>

            <input id="faculty" type="text" name="faculty" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $user->participant->faculty }}" required autofocus readonly >
          </div>
        </div>
      </x-slot:FormElement>
    </x-form-project-layout>

    <x-form-project-layout>
      <x-slot:secTitle>Section II: Mailing Address</x-slot:secTitle>
      
      <x-slot:secDesc>Full mailing address for certificate and medal postage purpose</x-slot:secDesc>

      <x-slot:formElement>
        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-3">
            <label for="participant-address-line-one" class="block text-md font-normal text-gray-700 text-lg mb-3">Address</label>

            <input id="address-line-one" type="text" name="address_line_one" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none mb-2"  value="{{ $user->participant->address_line_one }}" required autofocus readonly >

            <input id="address-line-two" type="text" name="address_line_two" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $user->participant->address_line_two }}" required autofocus readonly >
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/3 px-3 mb-6 md:mb-0">
            <label for="participant-area" class="block text-md font-normal text-gray-700 text-lg mb-3">Area</label>
            
            <input id="area" type="text" name="area" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $user->participant->area }}" required autofocus readonly >
          </div>

          <div class="md:w-1/3 px-3 mb-6 md:mb-0">
            <label for="participant-postal-code" class="block text-md font-normal text-gray-700 text-lg mb-3">Postal Code</label>
            
            <input id="postal_code" type="text" name="postal_code" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none"  value="{{ $user->participant->postal_code }}" required autofocus readonly >
          </div>

          <div class="md:w-1/3 px-3">
            <label for="participant-state" class="block text-md font-normal text-gray-700 text-lg mb-3">State</label>

            <input id="state" type="text" name="state" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-50 focus:border-blue-600 focus:outline-none" value="{{ $user->participant->state }}" required autofocus readonly >
          </div>
        </div>
      </x-slot:FormElement>
    </x-form-project-layout>


    <form method="POST" action="{{ route('entry.participant.create') }}" enctype="multipart/form-data">
      @csrf
      
      <x-form-project-layout>
        <x-slot:secTitle>Section III: Innovation/Invention Entry Information</x-slot:secTitle>
        
        <x-slot:secDesc>Project information.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="title_entry" class="block text-md font-normal text-gray-700 text-lg mb-3">Title of Entry</label>

              <input id="title-entry" type="text" name="title_entry" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Project title" :value="old('title_entry')" required autofocus>
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <label for="cluster-entry" class="block text-md font-normal text-gray-700 mb-3">Cluster</label>
              
              @if ($clusters != null)
                @foreach ($clusters as $cluster)
                  <div class="form-check mb-4">
                    <input type="radio" class="radio" value="{{ $cluster->id }}" name="cluster_id"" />

                    <label class="form-check-label inline-block text-gray-800 ml-3">
                      {{ $cluster->name }}
                    </label>
                  </div>
                @endforeach
              @endif
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
              <label for="summary-of-invention" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2" >Summary of Invention</label>

              <input id="summary_of_invention" type="file" name="summary_of_invention" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

              <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF, DOC, DOCX (MAX. 5048).</p>
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <x-form-project-layout>
        <x-slot:secTitle>Section IV: Applicant Guarantee & Consent</x-slot:secTitle>
        
        <x-slot:secDesc>Applicant guarantee and consent</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
              <span for="applicant_consent" class="block text-lg font-medium leading-6 text-gray-900 mb-3">
                I, (as per registered) desire to register in the Carnival of Research and
                Innovation (CRI202X) with an agreement to abide by the competition rules &
                regulations, the terms & policies set by the organizer and have verified that all
                information provided on this application form is correct and does not infringe
                on the intellectual property rights of others. I will be fully responsible for any
                violation of IP rights and the organizer will not be liable for any infringements.
              </span>

              <input type="checkbox" class="checkbox" value="agree" name="applicant_consent" required/>

              <label class="form-check-label inline-block text-gray-800 ml-3">Agree</label>
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>

      <div class="flex items-center justify-end mt-4 gap-4">
        <div class="focus:ring-2 focus:ring-offset-2 focus:ring-zinc-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-zinc-300 hover:bg-zinc-200 focus:outline-none rounded-full">
          <a href="javascript:history.back()"><p class="text-normal font-medium leading-none text-black">Back</p></a>
        </div>

        <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-orange-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-orange-400 hover:bg-orange-300 focus:outline-none rounded-full">
          <p class="text-normal font-medium leading-none text-white">Update</p>
        </button>
      </div>
    </form>
  @endsection
</x-entry-layout>