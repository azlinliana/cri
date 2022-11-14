<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'Title User List')

    @section('content')
      <x-form-project-layout>
        <x-slot:secTitle>Title User</x-slot:secTitle>
        <x-slot:secDesc>This information will be displayed at registration form of the user.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label for="title-user" class="block text-md font-medium text-gray-700 uppercase">Title List</label>
            </div>
          </div>

          <div class="overflow-x-auto relative">
            <div class="overflow-x-auto">
              <div class="tooltip tooltip-right ml-1 mt-1 mb-6" data-tip="Add title">
                <label for="create-title-user-modal" class="modal-button text-rose-500 border border-rose-400 hover:bg-rose-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-60">
                  <i class="fa-solid fa-plus"></i>
                  <span class="sr-only">Add Title User</span>
                </label>
              </div>

              <!-- Create Title User Modal -->
              <input type="checkbox" id="create-title-user-modal" class="modal-toggle" />

              <div class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                  <div class="modal-header flex flex-shrink-0 items-center justify-between py-4 border-b border-gray-300 rounded-t-md">
                    <div class="font-bold text-lg">Create Title Form</div>
                  </div>

                  <form method="POST" action="{{ route('superadmin.title-user.list') }}">
                    @csrf

                    <div class="py-4">
                      <label for="abbreviation" class="block text-md font-normal text-gray-700 mb-2 text-lg mb-2">Title Abbreviation</label>
                      
                      <input id="abbrev" type="text" name="abbrev" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Enter abbreviation of the title" :value="old('abbrev')" required autofocus>

                      <label for="description" class="block text-md font-normal text-gray-700 mb-2 text-lg mt-5">Title Description</label>
                      
                      <textarea id="description" name="description" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Enter description of the abbreviation" :value="old('description')" required autofocus></textarea>
                    </div>
                    
                    <div class="modal-action">
                      <div class="sm:flex items-center justify-between">
                        <div class="mb-2 mr-2 focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-zinc-300 hover:bg-zinc-200 focus:outline-none rounded-full">
                          <label for="create-title-user-modal"><p class="text-sm font-medium leading-none text-black">
                            Cancel
                          </p></label>
                        </div>
                        
                        <button type="submit" class="mb-2 mr-2 focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-rose-600 hover:bg-rose-400 focus:outline-none rounded-full">
                          <p class="text-sm font-medium leading-none text-white">Create</p>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              
              <table class="table table-zebra w-full" id="addrow">
                <thead>
                  <tr>
                    <th class="text-center">No</th>

                    <th>Title Abbreviation</th>

                    <th>Title Description</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @if ($titleUsers != null)
                    @foreach ($titleUsers as $titleUser)
                      <tr>
                        <td  class="font-semibold text-center">{{ $loop->iteration }}</td>

                        <td>{{ $titleUser->abbrev }}</td>

                        <td>{{ $titleUser->description }}</td>

                        <td>
                          <div class="sm:flex items-center">
                            <div class="flex items-center">
                              <div class="tooltip mt-2 mb-2" data-tip="Edit Title">
                                <a href="{{ route('superadmin.title-user.edit', [$titleUser]) }}">
                                  <button type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-60">
                                    <i class="fa-solid fa-pencil"></i><span class="sr-only">Edit Title</span>
                                  </button>
                                </a>
                              </div>
                            </div>

                            <div class="tooltip mt-2 mb-2" data-tip="Delete title">
                              <form method="POST" action="{{ route('superadmin.title-user.list.destroy', ['titleUser'=>$titleUser]) }}">
                                @csrf

                                <button type="submit" class="text-rose-500 border border-rose-400 hover:bg-rose-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-60">
                                  <i class="fa-solid fa-trash"></i><span class="sr-only">Delete title</span>
                                </button>
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="4" class="text-center font-semibold text-gray-400 italic">No user title</td>
                    </tr>
                  @endif

                  @if ($titleUsers->isEmpty())
                    <tr>
                      <td colspan="4" class="text-center font-semibold text-gray-400 italic">No user title</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </x-slot:FormElement>
      </x-form-project-layout>
    @endsection
  </x-drawer.drawer-superadmin>
</x-app-layout>