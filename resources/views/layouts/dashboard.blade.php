<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CRI-UMK') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/bce1720c36.js" crossorigin="anonymous"></script>

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
  </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0">
      <div class="drawer drawer-mobile">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        
        <div class="drawer-content flex flex-col">
          <!-- Header -->

          <!-- Main Content -->
        </div>

        <div class="drawer-side">
          <label for="my-drawer-2" class="drawer-overlay"></label>

          <ul class="menu p-4 overflow-y-auto w-72 bg-base-100 space-y-2 tracking-wide mb-4">
          </ul>
        </div>
      </div>
    </div>
    <!-- -->
    </div>

    <!-- Search form -->
    <script type="text/javascript">
      const btnSearch = document.getElementById('show_search');

      btnSearch.addEventListener('click', () => {
        const search_form = document.getElementById('display_search_form');

        if (search_form.style.display === 'none') {
          search_form.style.display = 'block';
        } else {
          search_form.style.display = 'none';
        }
      });
    </script>

    <!-- plugin for charts  -->
    <script src="../assets/js/plugins/chartjs.min.js" async></script>
    <!-- plugin for scrollbar  -->
    <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
    <!-- github button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- main script file  -->
    <script src="../assets/js/soft-ui-dashboard.js?v=1.0.4" async></script>
  </body>
</html>