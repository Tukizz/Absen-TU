{{-- @extends('layouts.app')

@section('content')

<script src="/js/jquery-3.2.1.min.js"></script>  

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">


                   

                    <form class="form-horizontal" method="POST" action="/absen">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">

                                <select class="form-control" name="staff_id">
                                    @foreach ($Staff as $data)
                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>

                               @if ($errors->has('staff_id'))
                                  <span class="help-block">
                                     <strong>{{ $errors->first('staff_id') }}</strong>
                                  </span>
                               @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hadir') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="hadir" value="datang" required >

                                @if ($errors->has('hadir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hadir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div id="time">
    @php
        $today = date('H:i:s');
        echo ($today);
    @endphp
</div>
    

    @if (session('status'))
        <h1>{{ session('status') }} <?php echo ($today)?></h1> 
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Hadir</th>
                                <th>Pulang</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                        @foreach($Absen as $data)
                        @if($data->hadir == 'datang')
                            <tr>
                                <td>{{ $data -> staff -> nama }}</td>
                                <td>{{ $data -> staff -> jabatan }}</td>
                                date('d-M-Y | H:i:s', strtotime($data->created_at))
                                <td>{{ $data -> created_at}}</td>
                            
                                <td>

                                    <form action="/absen/{{$data->id}}" method="post">
                                        <input type="hidden" name="staff_id" value="{{ $data -> id }}">
                                        <input type="hidden" name="hadir" value="pulang">
                                        <input type="hidden"  name="_method" value="put">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-success" type="edit">Pulang</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    {{ date('d-M-Y | H:i:s', strtotime($data->updated_at))}}

                                    {{$data->updated_at}}
                                </td>
                            @endif
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div> --}}