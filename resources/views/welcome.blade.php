@auth
    @extends('template.welcome')
@else
    <script type="text/javascript">
        window.location = "/absen";
    </script>
@endauth