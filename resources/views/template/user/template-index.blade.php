<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absen TU</title>

    @include('template.user.partial.head')
    @yield('additional_head')

</head>
<body onload="startTime()">
   @yield('body')

{{-- JS DAN KAWAN KAWAN --}}
    @include('template.user.partial.footer')

{{-- FOOTER --}}
    @yield('additional_foot')
</body>
</html>
