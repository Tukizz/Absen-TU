@extends('template.admin.template-index')
@section('additional_head')
 {{-- Code here for additional header like css, meta, etc --}}
@endsection
@section('body')
@extends('template.admin.partial.navbar')

@php
    $today = date("Y-m-d H:i:s");
@endphp 

        <div class="main-grid">
        <div class="">
            <div class="count-grid">
                <h3 class="title">Menu</h3>
                <br>
                    <a href="/admin/resetrecord" class="btn btn-primary">
                        Reset Kehadiran
                    </a>
                                    
                    <a href="/admin/adminexcel" class="btn btn-primary">
                        Export Excel
                    </a>

                    <a href="/admin/adminpdf" class="btn btn-primary">
                        Export PDF
                    </a>
                <br>           
            <div class="clearfix"> </div>
            </div>
        </div>

    @if (session('status'))
        <h1>{{ session('status') }}</h1> 
    @endif

    <div class="">
            <div class="count-grid">
                <h3 class="title">List Kehadiran</h3><br>
                <input class="search form-control" type="search" data-column="all" placeholder="Search....">
                <br>
                    <table class="table tablesorter">
                    <thead>
                        <tr>
                            <th data-filter="false">NIP</th>
                            <th data-filter="false">Nama</th>
                            <th data-filter="false">Jabatan</th>
                            <th data-filter="false">Hadir</th>
                            <th data-filter="false">Pulang</th>
                            <th data-filter="false">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($Absen as $data)
                    @if($data->hadir == 'tidakhadir')
                    @elseif($data->hadir == 'datang' or 'pulang')
                        <tr>
                            <td align="center">{{ $data -> staff -> nip}}</td>
                            <td align="center">{{ $data -> staff -> nama }}</td>
                            <td align="center">{{ $data -> staff -> jabatan }}</td>
                            <td align="center">{{ date('d-M-Y | H:i:s', strtotime($data->created_at))}}</td>
                            @if($data->created_at != $data->updated_at)
                                <td align="center">{{ date('d-M-Y | H:i:s', strtotime($data->updated_at))}}</td>
                            @else
                                <td></td>
                            @endif
                            <td>
                                <form action="/admin/daftar-kehadiran/{{$data->id}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" value="delete" class="btn btn-danger">delete</button> 
                                </form>
                            </td>
                        </tr>
                    
                        
                    @else
                        
                    @endif
                    @endforeach
                    </tbody>
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
                                        <button type="button" class="btn first"><i class="fa fa-angle-double-left"></i></button>
                                        <button type="button" class="btn prev"><i class="fa fa-chevron-left"></i></button>
                                        <span class="pagedisplay"></span>
                                        <!-- this can be any element, including an input -->
                                        <button type="button" class="btn next"><i class="fa fa-chevron-right"></i></button>
                                        <button type="button" class="btn last"><i class="fa fa-angle-double-right"></i></button>
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
                </table>
                <br>           
            <div class="clearfix"> </div>
            </div>
        </div>
            <div class="">
            <div class="count-grid">
                <h3 class="title">List Ketidakhadiran</h3>
                <br>
                    <table class="table">
                    <thead>
                        <tr>
                            <th data-filter="false">NIP</th>
                            <th data-filter="false">Nama</th>
                            <th data-filter="false">Jabatan</th>
                            <th data-filter="false">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($Absen as $data)
                    @if($data->hadir == 'tidakhadir')
                        <tr>
                            <td align="center">{{ $data -> staff -> nip}}</td>
                            <td align="center">{{ $data -> staff -> nama }}</td>
                            <td align="center">{{ $data -> staff -> jabatan }}</td>
                            <td align="center">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$data->id}}">
                                    Detail
                                </button>
                            </td>
                        </tr>

<!-- Modal -->
<div class="modal fade" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Keterangan</h4>
      </div>
      <div class="modal-body">
        {!!html_entity_decode($data->keterangan)!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                    @else
                        
                    @endif
                    @endforeach
                    
                    </tbody>
                    <tfoot>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                                <!-- include "tablesorter-ignoreRow" class for pager rows in thead -->
                                <tr class="tablesorter-ignoreRow">
                                    <th colspan="7" class="ts-pager form-horizontal">
                                        <button type="button" class="btn first"><i class="fa fa-angle-double-left"></i></button>
                                        <button type="button" class="btn prev"><i class="fa fa-chevron-left"></i></button>
                                        <span class="pagedisplay"></span>
                                        <!-- this can be any element, including an input -->
                                        <button type="button" class="btn next"><i class="fa fa-chevron-right"></i></button>
                                        <button type="button" class="btn last"><i class="fa fa-angle-double-right"></i></button>
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
                </table>
                <br>           
            <div class="clearfix"> </div>
            </div>
        </div>

        </div>
@endsection
@section('additional_foot')
@endsection