<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'Edit Title User Form')

    @section('content')
      <form method="POST" action="{{ route('superadmin.title-user.update', ['titleUser'=>$titleUser]) }}">
        @method('PUT')
        @csrf

        <x-form-project-layout>
          <x-slot:secTitle>Title User</x-slot:secTitle>

          <x-slot:secDesc>This information will be displayed at registration form of the user.</x-slot:secDesc>

          <x-slot:formElement>
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="abbreviation" class="block text-md font-normal text-gray-700 mb-3">Title Abbreviation</label>

                <input id="abbrev" type="text" name="abbrev" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Enter abbreviation of the title" value="{{ $titleUser->abbrev }}" required autofocus >
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="description" class="block text-md font-normal text-gray-700 mb-3">Title Description</label>

                <textarea id="description" name="description" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Enter description of the abbreviation" value="{{ $titleUser->description }}" required autofocus>{{ $titleUser->description }}</textarea>
              </div>
            </div>
          </x-slot:FormElement>
        </x-form-project-layout>

        <div class="flex items-center justify-end mt-4 gap-4">
          <div class="focus:ring-2 focus:ring-offset-2 focus:ring-zinc-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-zinc-300 hover:bg-zinc-200 focus:outline-none rounded-full">
            <a href="javascript:history.back()"><p class="text-normal font-medium leading-none text-black">Back</p></a>
          </div>

          <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-4 bg-rose-600 hover:bg-rose-400 focus:outline-none rounded-full">
            <p class="text-normal font-medium leading-none text-white">Update</p>
          </button>
        </div>
      </form>
    @endsection
  </x-drawer.drawer-superadmin>
</x-app-layout>