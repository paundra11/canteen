@extends('layouts.admin-lte')
@section('css')
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @if(Auth()->user()->access_id==2)
            <div class="col-lg-6 col-7">
                @elseif (Auth()->user()->access_id==1)
            <div class="col-lg-4 col-7">
                @endif
                <!-- small box -->
                <div class="small-box bg-info p-3 mb-4">
                    <div class="inner">
                        @if(Auth()->user()->access_id==2)
                        <h3>{{Auth()->user()->canteen->orders->where('payment','=','0')->count()}}</h3>
                        @else
                        <h3>0</h3>
                        @endif
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag pr-3"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            @if(Auth()->user()->access_id==2)
            <div class="col-lg-6 col-7">
                @elseif (Auth()->user()->access_id==1)
            <div class="col-lg-4 col-7">
                @endif
                <!-- small box -->
                <div class="small-box bg-success p-3 mb-4">
                    <div class="inner">
                        @if(Auth()->user()->access_id==2)
                        <h3>{{Auth()->user()->canteen->orders->count()}}</h3>
                        @endif
                        @if(Auth()->user()->access_id==1)
                        <div class="inner">
                            <h3>{{ Auth::user()->totalOrders() }}</h3>
                        </div>
                        @endif
                        <p>Total Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag pr-3"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            @if(Auth()->user()->access_id==1)
            <div class="col-lg-4 col-7">
                <!-- small box -->
                <div class="small-box bg-warning p-3 mb-4">
                    <div class="inner">
                        <h3>{{App\Models\User::count()}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add pr-3"></i>
                    </div>
                </div>
            </div>
            @endif
        </div>

        @if(Auth()->user()->access_id==1)
        <div class="row">
            <div class="col-lg-12">
                <div class="card  card-primary">
                    <div class="card-header">
                        <h3 class="card-title">User Static</h3>
                        <div class="card-tools">
                            <!-- Collapse Button -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
@section('last')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id='btn-acc' style="display: none;" data-toggle="modal" data-target="#AccesLevel">
    Who You???
</button>

<!-- Modal -->
@if(isset($modal))
<div class="modal fade" id="AccesLevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$modal["title"]}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <img src="{{asset('img/bee.png')}}" class="rounded mx-auto d-block" alt="Welcome users" width="50%" height="auto">
                    </div>
                    <br>
                    <div class="row">
                        <h4 class='text-center col-md-12 text-capitalize'><b>{{$modal['subtitle']}}</b></h4>
                    </div>
                    <div class="row">
                        <h5 class='text-center col-md-12'>{{$modal["description"]}}</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <button type="button" class="btn btn-primary col-md-4" data-dismiss="modal">Oke!!!</button>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.esm.js" integrity="sha512-IPqefcmFCuGcYxl/uIjvyCXwh5T9+EB2MFT7W9RUZd20d7PLfgdT975xdhyesvdXH6Au8SyXOw1236LY1lFl5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.esm.min.js" integrity="sha512-2Vi/lCX8NaXlAhzc28RAoteYAiJVoz4y3Xq/IpHQCw7KU25I34fDqJSVSUml2tQRVYFnf3IMy6O59zKJh79hiw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js" integrity="sha512-b3xr4frvDIeyC3gqR1/iOi6T+m3pLlQyXNuvn5FiRrrKiMUJK3du2QqZbCywH6JxS5EOfW0DY0M6WwdXFbCBLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/helpers.esm.js" integrity="sha512-/2SCtwX/TWXQ8kJN8MhCXL5GQJkBhh5J184Uy/totMp+1pFXTQhV/hMMYHuSl+juR5WO9i11AvywRgYFotRIug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/helpers.esm.min.js" integrity="sha512-b3xZ1Eh852+/Ltha4XJd59YP2d+I+B6NPdB4H+Wns29GX9x5pLwlp8jnQtJYog3d5Xk1SWvhT2lgJDDBvpV0ow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Check for session and trigger click if session has 'title'
    @if(session()->has('title'))
        document.getElementById('btn-acc').click();
    @endif

    // chart1
    var ctx = document.getElementById('myChart').getContext('2d');
    const data = {
        labels: [
            'Admin',
            'Penjual',
            'Siswa'
        ],
        datasets: [{
            label: 'User Roles',
            data: [
                {{ $user->find(1)->users->count() }},
                {{ $user->find(2)->users->count() }},
                {{ $user->find(3)->users->count() }}
            ],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
    });

    // chart2
    var ctz = document.getElementById('myChart2').getContext('2d');
    const data2 = {
        labels: [
            'Red',
            'Green',
            'Yellow',
            'Grey',
            'Blue'
        ],
        datasets: [{
            label: 'Color Distribution',
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)'
            ]
        }]
    };
    var myChart2 = new Chart(ctz, {
        type: 'polarArea',
        data: data2,
        options: {}
    });
</script>
{{-- <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> --}}
@endsection
