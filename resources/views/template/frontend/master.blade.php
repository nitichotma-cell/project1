<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.frontend.css')
    @livewireStyles
</head>
<body>
    @include('template.frontend.header')
    <div class="py-30"></div>
        @yield('content')
        <div class="py-40"></div>
        @include('template.frontend.footer')
        @include('template.frontend.jss')
    </div>
    @livewireScripts
</body>
</html>