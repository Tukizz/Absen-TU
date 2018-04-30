@extends('template.user.template-index')
@section('additional_head')
 {{-- Code here for additional header like css, meta, etc --}}
@endsection
@section('body')


@php
$jam = date("H:i");
@endphp
<div class="container p">
        <div class="row">
            <div class="col s12 m12 center">
                <h3 style="font-family: 'Fugaz One', cursive;">Absen TU</h3>
                <h5 id="txt"></h5>
            
            @if (session('status'))
                <div class="row" class="center" style="padding-top:10px; margin-bottom: -0px;">
                    <div class="container">
                        <div class="card-panel green" style="height: 15px;">
                            <h5 class="white-text" style="margin-top: -12px;">{{session('status')}} @php echo $jam;@endphp</h5>
                        </div>
                    </div>
                </div>
            @endif
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="container p">
                    <ul class="tabs card">
                    <li class="tab col s12"><a class="active" href="#test-swipe-1">Izin</a></li>
                </ul>
                    <div class="col s12 m12">
                  {{-- HALAMAN 1       --}}
                        <div id="test-swipe-1" class="card z-depth-5 card-p">
                            <form method="POST" action="/izin">
                                 {{ csrf_field() }}
                                <div  class="card-content black-text">
                                    
                        <div class="row">
                            <div class="input-field col s12">
                              <select id='select1' name="staff_id" placeholder='Search Nama/NIP'>
                                <option disabled selected placeholder>Nama/NIP</option>
                                @foreach($Staff as $data)
                                    <option value="{{$data->id}}">{{$data->nip}} - {{$data->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="row">
                            <label for="icon_prefix" class="black-text" style="font-size: 20px;">Keterangan</label>
                            <div class="input-field col s12">
                                <textarea type="text" name="keterangan"></textarea>
                            </div>
                        </div>
                            <br>
                                <div class="card-action black-text">
                                    <div class="">
                                        <input type="hidden" value="tidakhadir" name="hadir">
                                <button type="submit" class="btn blue waves-effect waves-blue">Submit</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="strip-bottom"></div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div class="footer-copyright center">
                    <div class="container">
                        © Copyright 2018 RPL 1st Generation<br>
                        <b>Made with <del class="red-text">Love &#x2764;</del>, Keyboard &#x2328; !</b>     
                    </div>
                </div>
            </div>
        </div>
    <br>
    </div>




{{--     <div class="container" style="padding-top: 30px;">
        <div class="card blue lighten-1">
            <div class="card-content white-text center">
                <h4>Absensi Kehadiran TU SMKN 13 Bandung</h4>
                <h5 id="txt"></h5>
            </div>
            <div class="card-tabs">
                <ul class="tabs tabs-fixed-width blue">
                    <li class="tab disabled"><a></a></li>
                    <li class="tab"><a href="#test4" class="white-text active ">Izin</a></li>
                    <li class="tab disabled"><a></a></li>
                </ul>
            </div>

            <div class="card-content blue lighten-4">
                <form method="POST" action="/izin">
                    {{ csrf_field() }}
                <div id="test4">
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s12">
                              <select id='select1' name="staff_id" placeholder='Search Nama/NIP'>
                                <option disabled selected placeholder>Nama/NIP</option>
                                @foreach($Staff as $data)
                                    <option value="{{$data->id}}">{{$data->nip}} - {{$data->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="icon_prefix" class="black-text" style="font-size: 20px;">Keterangan</label>
                                <div class="input-field col s12">
                                <textarea type="text" name="keterangan"></textarea>
                              
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <input type="hidden" value="tidakhadir" name="hadir">
                                <button type="submit" class="btn blue waves-effect waves-blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
@section('additional_foot')
@endsection