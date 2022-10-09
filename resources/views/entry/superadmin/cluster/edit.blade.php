<x-app-layout>
  <x-drawer.drawer-superadmin>
    @section('pageTitle', 'Edit Cluster Form')

    @section('content')
      <form method="POST" action="{{ route('superadmin.cluster.update', ['cluster'=>$cluster]) }}">
        @method('PUT')
        @csrf

        <x-form-project-layout>
          <x-slot:secTitle>Project Clusters</x-slot:secTitle>
          <x-slot:secDesc>This information will be displayed at landing page, for the juror to choose evaluation cluster and for the participant to choose project cluster.</x-slot:secDesc>

          <x-slot:formElement>
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="cluster-name" class="block text-md font-normal text-gray-700">Cluster Name</label>

                <input id="name" type="text" name="name" class="w-full px-4 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-400 rounded ease-in-out m-0 mt-2 focus:text-gray-700 focus:bg-white focus:border-gray-600 focus:outline-none focus:border-2" placeholder="Enter name of the cluster" value="{{ $cluster->name }}" required autofocus >
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="cluster-description" class="block text-md font-normal text-gray-700">Cluster Description</label>

                <textarea id="description" name="description" class="w-full px-4 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-400 rounded ease-in-out m-0 mt-2 focus:text-gray-700 focus:bg-white focus:border-gray-600 focus:outline-none focus:border-2" placeholder="Enter description of the cluster" value="{{ $cluster->name }}" required autofocus>{{ $cluster->description }}</textarea>
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