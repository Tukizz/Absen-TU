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
                <h3 class="title">Input Admin</h3>
                <br>
                    <form class="form-horizontal" method="POST" action="/admin/manage-admin">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                               <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                               @if ($errors->has('name'))
                                  <span class="help-block">
                                     <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                               @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                               <input type="text" class="form-control" name="username" required>

                               @if ($errors->has('username'))
                                  <span class="help-block">
                                     <strong>{{ $errors->first('username') }}</strong>
                                  </span>
                               @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password_confirmation" required >
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
                <h3 class="title">List Admin</h3><br>
                 <input class="search form-control" type="search" data-column="all" placeholder="Search....">
                <br>
                    <table class="table tablesorter">
                    <thead>
                        <tr>
                            <th data-filter="false">Nama</th>
                            <th data-filter="false">Username</th>
                            <th data-filter="false">Created At</th>
                            <th data-filter="false">Action</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                    @foreach($user as $data)
                        <tr>
                            <td>{{ $data -> name }}</td>
                            <td>{{ $data -> username }}</td>
                            <td>{{ $data -> created_at }}</td>
                            <td>
                                <form action="/admin/manage-admin/{{$data->id}}" method="post">
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
                                    
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Created At</th>
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
