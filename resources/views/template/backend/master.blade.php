<!doctype html>
<html lang="en">
  <head>
    @include('template.backend.css')
    @livewireStyles
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      @include('template.backend.header')
      @include('template.backend.sidebar')

      @yield('content')

      @include('template.backend.footer')
    </div>
    @include('template.backend.js')
    @livewireScripts
  </body>
</html>
