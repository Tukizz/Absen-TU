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
            
            @if (session('pulang'))
                <div class="row" class="center" style="padding-top:10px; margin-bottom: -0px;">
                    <div class="container">
                        <div class="card-panel green" style="height: 15px;">
                            <h5 class="white-text" style="margin-top: -12px;">{{session('pulang')}} @php echo $jam;@endphp</h5>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('datang'))
                <div class="row" class="center" style="padding-top:10px; margin-bottom: -0px;">
                    <div class="container">
                        <div class="card-panel green" style="height: 15px;">
                            <h5 class="white-text" style="margin-top: -12px;">{{ session('datang') }} @php echo $jam;@endphp</h5>
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
                    <li class="tab col s6"><a class="active" href="#test-swipe-1">Absen</a></li>
                    <li class="tab col s6"><a href="#test-swipe-2">Kehadiran</a></li>
                </ul>
                    <div class="col s12 m12">
                  {{-- HALAMAN 1       --}}
                        <div id="test-swipe-1" class="card z-depth-5 card-p">
                            <form method="POST" action="/absen">
                                 {{ csrf_field() }}
                                <div  class="card-content black-text">
                                    
                                        <div class="input-field col s12">
                                          <select id='select1' name="staff_id" placeholder='Search Nama/NIP'>
                                            <option disabled selected placeholder>Nama/NIP</option>
                                            @foreach($Staff as $data)
                                                <option value="{{$data->id}}">{{$data->nip}} - {{$data->nama}}</option>
                                            @endforeach
                                          </select>
                                        
                                        </div>
                                </div>
                            <br><br><br>
                                <div class="card-action black-text">
                                    <div class="">
                                        <input type="hidden" value="datang" name="hadir">
                                        <button type="submit" class="btn blue waves-effect waves-blue">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <div class="strip-bottom"></div>
                        </div>

{{-- HALAMAN 2 --}}
                        <div id="test-swipe-2" class="card z-depth-5 card-p">
                            <nav class="light-blue lighten-2" style="margin-top: ;">
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input class="search" type="search" data-column="all" placeholder="Search....">
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>

                            <div class="card-content black-text">
                                
                                    <div class="row">
                        <table class="tablesorter"> <!-- add materialize classes, as desired -->
                            <thead>
                                <tr>
                                    <th data-filter="false">NIP</th>
                                    <th data-filter="false">Nama</th>
                                    <th data-filter="false">Jabatan</th>
                                    <th data-filter="false">Datang</th>
                                    <th data-filter="false">Pulang</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Datang</th>
                                    <th>Pulang</th>
                                </tr>
                                <!-- include "tablesorter-ignoreRow" class for pager rows in thead -->
                                <tr class="tablesorter-ignoreRow">
                                    <th colspan="7" class="ts-pager form-horizontal">
                                        <button type="button" class="btn first"><i class="small material-icons">first_page</i></button>
                                        <button type="button" class="btn prev"><i class="small material-icons">navigate_before</i></button>
                                        <span class="pagedisplay"></span>
                                        <!-- this can be any element, including an input -->
                                        <button type="button" class="btn next"><i class="small material-icons">navigate_next</i></button>
                                        <button type="button" class="btn last"><i class="small material-icons">last_page</i></button>
                                        <select class="pagesize browser-default" title="Select page size">
                                            <option selected="selected" value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                        </select>
                                        <select class="pagenum browser-default" title="Select page number"></select>
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($Absen as $data)
                                @if($data->hadir == 'pulang')
                                @elseif($data->hadir == 'tidakhadir')
                                @else
                              <tr>
                                <td>{{$data->staff->nip}}</td>
                                <td>{{$data->staff->nama}}</td>
                                <td>{{$data->staff->jabatan}}</td>
                                <td>{{$data->created_at}}</td>
                                
                                <td>
                                    <form action="/absen/{{$data->id}}" method="post">
                                        <input type="hidden" name="staff_id" value="{{ $data -> id }}">
                                        <input type="hidden" name="hadir" value="pulang">
                                        <input type="hidden"  name="_method" value="put">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn-floating green waves-effect waves-light" type="edit"><i class="material-icons">done</i></button>
                                    </form>
                                </td>

                              </tr>
                              @endif
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                            </div>
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



    {{-- <div class="container" style="padding-top: 30px;">
        <div class="card blue lighten-1">
            <div class="card-content white-text center">
                <h4>Absensi Kehadiran TU SMKN 13 Bandung</h4>
                <h5 id="txt"></h5>
            </div>
            <div class="card-tabs">
                <ul class="tabs tabs-fixed-width blue">
                    <li class="tab disabled"><a></a></li>
                    <li class="tab"><a href="#test4" class="white-text active ">Absen</a></li>
                    <li class="tab"><a href="#test5" class="white-text ">Kehadiran</a></li>
                    <li class="tab disabled"><a></a></li>
                </ul>
            </div>

            <div class="card-content blue lighten-4">
                <form method="POST" action="/absen">
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
                            <div class="col s12">
                                <input type="hidden" value="datang" name="hadir">
                                <button type="submit" class="btn blue waves-effect waves-blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div id="test5">
                    <div class="row" style="margin-left:-23px; margin-right: -24px;">
                        <nav class="light-blue lighten-2" style="margin-top: -24px;">
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input class="search" type="search" data-column="all" placeholder="Search....">
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </div>

            <!-- ALERT -->
                    <!-- <div class="row" class="center" style="padding-top:10px; margin-bottom: -0px;">
                        <div class="container">
                            <div class="card-panel green center">
                                <h5 class="white-text">Anda Pulang Pada : </h5>
                            </div>
                        </div>
                    </div> -->
                
                    <div class="container">
                        <table class="tablesorter"> <!-- add materialize classes, as desired -->
                            <thead>
                                <tr>
                                    <th data-filter="false">NIP</th>
                                    <th data-filter="false">Nama</th>
                                    <th data-filter="false">Jabatan</th>
                                    <th data-filter="false">Datang</th>
                                    <th data-filter="false">Pulang</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Datang</th>
                                    <th>Pulang</th>
                                </tr>
                                <!-- include "tablesorter-ignoreRow" class for pager rows in thead -->
                                <tr class="tablesorter-ignoreRow">
                                    <th colspan="7" class="ts-pager form-horizontal">
                                        <button type="button" class="btn first"><i class="small material-icons">first_page</i></button>
                                        <button type="button" class="btn prev"><i class="small material-icons">navigate_before</i></button>
                                        <span class="pagedisplay"></span>
                                        <!-- this can be any element, including an input -->
                                        <button type="button" class="btn next"><i class="small material-icons">navigate_next</i></button>
                                        <button type="button" class="btn last"><i class="small material-icons">last_page</i></button>
                                        <select class="pagesize browser-default" title="Select page size">
                                            <option selected="selected" value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                        </select>
                                        <select class="pagenum browser-default" title="Select page number"></select>
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($Absen as $data)
                                @if($data->hadir == 'pulang')
                                @elseif($data->hadir == 'tidakhadir')
                                @else
                              <tr>
                                <td>{{$data->staff->nip}}</td>
                                <td>{{$data->staff->nama}}</td>
                                <td>{{$data->staff->jabatan}}</td>
                                <td>{{$data->created_at}}</td>
                                
                                <td>
                                    <form action="/absen/{{$data->id}}" method="post">
                                        <input type="hidden" name="staff_id" value="{{ $data -> id }}">
                                        <input type="hidden" name="hadir" value="pulang">
                                        <input type="hidden"  name="_method" value="put">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn-floating green waves-effect waves-light" type="edit"><i class="material-icons">done</i></button>
                                    </form>
                                </td>

                              </tr>
                              @endif
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('additional_foot')
@endsection