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
    
  <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
      <main>
        {{ $slot }}
      </main>
    </div>

    <script type="text/javascript">
      document.querySelector('.checkAll').addEventListener('click', e => {
        if (e.target.value == 'Check All') {
          document.querySelectorAll('.check-items input').forEach(checkbox => {
            checkbox.checked = true;
          });
          e.target.value = 'Uncheck All';
        } 
        else {
          document.querySelectorAll('.check-items input').forEach(checkbox => {
            checkbox.checked = false;
          });
          e.target.value = 'Check All';
        }
      });
    </script>

    <script type="text/javascript">
      let selectStatus = document.getElementById('status-list');
    
      selectStatus.addEventListener('change', (choosenValue) => {
        if (choosenValue.target.value == 'rejected') {
          document.getElementById('displayReasonField').style.display = 'block';
          document.getElementById('displayReviewerSection').style.display = 'block';
        } 
        else if (choosenValue.target.value == 'approved') {
          document.getElementById('displayReasonField').style.display = 'none';
          document.getElementById('displayReviewerSection').style.display = 'block';
        }
        
        else {
          document.getElementById('displayReasonField').style.display = 'none';
          document.getElementById('displayReviewerSection').style.display = 'none';
        }
      });
    </script>
  </body>
</html>
