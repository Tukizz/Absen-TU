@extends('template.admin.template-index')
@section('additional_head')
 {{-- Code here for additional header like css, meta, etc --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
@endsection
@section('body')
@extends('template.admin.partial.navbar')



@php
    $today = date("Y-m-d H:i:s");
@endphp 

        <div class="main-grid">
        <br>
        <div class="">
            <div class="count-grid container" align="center">
                <h3 class="title">Menu</h3>
                <br>
                    <a href="/admin/daftar-kehadiran" class="btn btn-primary">
                        Daftar Kehadiran
                    </a>
                                    
                    <a href="/admin/daftar-staff" class="btn btn-primary">
                        Daftar Staff
                    </a>

                    <a href="/admin/manage-admin" class="btn btn-primary">
                        Manage Admin
                    </a>
                    <a href="{{route('logout')}}" class="btn btn-primary">
                        Logout
                    </a>
                <br>           
            <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endsection

@section('additional_foot')
@endsection