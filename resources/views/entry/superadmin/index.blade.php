<x-dashboard-layout>
  @section('pageTitle', 'Project Entry.')

  @section('content')
  <div class="flex mx-auto flex-col sm:flex-row justify-center flex-wrap gap-12 mt-10">
    <a href="{{ route('superadmin.cluster.list') }}">
      <div class="bg-white max-w-xs shadow-lg mx-auto border-b-4 border-rose-500 rounded-2xl overflow-hidden hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer" >
        <div class="bg-rose-500 flex h-20 items-center">
          <div class="text-white ml-4 border-2 py-2 px-4 rounded-full">1</div>

          <p class="ml-4 text-white uppercase">Entry's Clusters</p>
        </div>

        <p class="py-6 px-6 text-lg tracking-wide text-center">This is form for managing the cluster of the project entry</p>
      </div>
    </a>

    <a href="{{ route('entry.users.list.all') }}">
      <div class="bg-white max-w-xs shadow-lg mx-auto border-b-4 border-rose-400 rounded-2xl overflow-hidden  hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer" >
        <div class="bg-rose-400 flex h-20  items-center">
          <div class="text-white ml-4 border-2 py-2 px-4 rounded-full">2</div>

          <p class="ml-4 text-white uppercase">List of Project Entries</p>
        </div>

        <p class="py-6 px-6 text-lg tracking-wide text-center">This is list of project entry request from participant.</p>
      </div>
    </a>
  </div>
  @endsection
</x-dashboard-layout>