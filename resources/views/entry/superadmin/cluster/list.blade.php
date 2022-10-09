<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'Entry Cluster List')

    @section('content')
      <x-form-project-layout>
        <x-slot:secTitle>Project Clusters</x-slot:secTitle>
        <x-slot:secDesc>This information will be displayed at landing page, for the juror to choose evaluation cluster and for the participant to choose project cluster.</x-slot:secDesc>

        <x-slot:formElement>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label for="cluster" class="block text-md font-medium text-gray-700 uppercase">Cluster List</label>
            </div>
          </div>

          <div class="overflow-x-auto relative">
            <div class="overflow-x-auto">
              <div class="tooltip tooltip-right ml-1 mt-1 mb-6" data-tip="Add cluster">
                <label for="create-cluster-modal" class="modal-button text-rose-500 border border-rose-400 hover:bg-rose-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-60">
                  <i class="fa-solid fa-plus"></i>
                  <span class="sr-only">Add cluster</span>
                </label>
              </div>

              <!-- Create Cluster Modal -->
              <input type="checkbox" id="create-cluster-modal" class="modal-toggle" />

              <div class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                  <div class="modal-header flex flex-shrink-0 items-center justify-between py-4 border-b border-gray-300 rounded-t-md">
                    <div class="font-bold text-lg">Create Cluster Form</div>
                  </div>

                  <form method="POST" action="{{ route('superadmin.cluster.list') }}">
                    @csrf

                    <div class="py-4">
                      <label class="block tracking-wide text-grey-darker text-md font-normal mb-2">Cluster Name</label>
                      
                      <input id="name" type="text" name="name" class="w-full px-4 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-400 rounded ease-in-out m-0 mt-2 mb-2 focus:text-gray-700 focus:bg-white focus:border-gray-600 focus:outline-none focus:border-2" placeholder="Enter name of the cluster" :value="old('name')" required autofocus>

                      <label class="block tracking-wide text-grey-darker text-md font-normal mb-2">Cluster Description</label>
                      
                      <textarea id="description" name="description" class="w-full px-4 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-400 rounded ease-in-out m-0 mt-2 mb-2 focus:text-gray-700 focus:bg-white focus:border-gray-600 focus:outline-none focus:border-2" :value="old('name')" required autofocus></textarea>
                    </div>
                    
                    <div class="modal-action">
                      <div class="sm:flex items-center justify-between">
                        <div class="mb-2 mr-2 focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-zinc-300 hover:bg-zinc-200 focus:outline-none rounded-full">
                          <label for="create-cluster-modal"><p class="text-sm font-medium leading-none text-black">
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

                    <th>Cluster Name</th>

                    <th>Cluster Description</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @if ($clusters != null)
                    @foreach ($clusters as $cluster)
                      <tr>
                        <td  class="font-semibold text-center">{{ $loop->iteration }}</td>

                        <td>{{ $cluster->name }}</td>

                        <td>{{ $cluster->description }}</td>

                        <td>
                          <div class="sm:flex items-center">
                            <div class="flex items-center">
                              <div class="tooltip mt-2 mb-2" data-tip="Edit cluster">
                                <a href="{{ route('superadmin.cluster.edit', [$cluster]) }}">
                                  <button type="button" class="text-rose-500 border border-rose-400 hover:bg-rose-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-60">
                                    <i class="fa-solid fa-pencil"></i><span class="sr-only">Edit cluster</span>
                                  </button>
                                </a>
                              </div>
                            </div>

                            <div class="tooltip mt-2 mb-2" data-tip="Delete cluster">
                              <form method="POST" action="{{ route('superadmin.cluster.list.destroy', ['cluster'=>$cluster]) }}">
                                @csrf

                                <button type="submit" class="text-rose-500 border border-rose-400 hover:bg-rose-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-rose-500 dark:text-rose-500 dark:hover:text-white dark:focus:ring-rose-60">
                                  <i class="fa-solid fa-trash"></i><span class="sr-only">Delete cluster</span>
                                </button>
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="4" class="text-center font-semibold text-gray-400 italic">No project cluster</td>
                    </tr>
                  @endif

                  @if ($clusters->isEmpty())
                    <tr>
                      <td colspan="4" class="text-center font-semibold text-gray-400 italic">No project cluster</td>
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