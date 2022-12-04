<x-dashboard-layout>
  @section('pageTitle', 'Profile.')

  @section('content')
    {{ $user->fullname }}

    {{ $user->participant->type }}

  @endsection
</x-dashboard-layout>