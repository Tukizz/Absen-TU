<!DOCTYPE html>
<html>
<head>
<title>Admin Absen TU</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    @include('template.admin.partial.head')
    @yield('additional_head')

</head>
<body class="dashboard-page" onload="startTime()">
	@yield('body')

{{-- JS DAN KAWAN KAWAN --}}
    @include('template.admin.partial.footer')

{{-- FOOTER --}}
    @yield('additional_foot')
</body>
</html>