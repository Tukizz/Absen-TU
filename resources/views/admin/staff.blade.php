@extends('template.admin.template-index')
@section('additional_head')
 {{-- Code here for additional header like css, meta, etc --}}
@endsection
@section('body')
@extends('template.admin.partial.navbar')
    <div class="main-grid">

    @if (session('status'))
        <h1>{{ session('status') }}</h1> 
    @endif

    <div class="">
            <div class="count-grid">
                <h3 class="title">Input Staff</h3>
                <br>
                    <form class="form-horizontal" method="POST" action="/admin/daftar-staff">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">NIP</label>
                            <div class="col-md-6">
                               <input type="text" class="form-control" name="nip" value="{{ old('nip') }}">

                               @if ($errors->has('nip'))
                                  <span class="help-block">
                                     <strong>{{ $errors->first('nip') }}</strong>
                                  </span>
                               @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                               <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">

                               @if ($errors->has('nama'))
                                  <span class="help-block">
                                     <strong>{{ $errors->first('nama') }}</strong>
                                  </span>
                               @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">jabatan</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}" required >

                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
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
                <br>           
            <div class="clearfix"> </div>
            </div>
        </div>

    <div class="">
            <div class="count-grid">
                <h3 class="title">List Staff</h3><br>
                <form action="#" method="post">
                <input class="search form-control" type="search" data-column="all" placeholder="Search....">
            </form>
                <br>
                    <table class="table tablesorter">
                    <thead>
                        <tr>
                            <th data-filter="false">NIP</th>
                            <th data-filter="false">Nama</th>
                            <th data-filter="false">Jabatan</th>
                            <th data-filter="false">Action</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                    @foreach($Staff as $data)
                        <tr>
                            <td>{{ $data -> nip }}</td>
                            <td>{{ $data -> nama }}</td>
                            <td>{{ $data -> jabatan }}</td>
                            <td>
                                <form action="/admin/daftar-staff/{{$data->id}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" value="delete" class="btn btn-danger">delete</button> 
                                </form>
                            </td>
                        </tr>
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
