@extends('admin.layouts.index') @section('content')
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h1 class="box-title">Danh Sách Nhân Viên</h1>

                <a href="{!! url('admin/staffs/create') !!}"><span class="pull-right"><i class="fa fa-plus-square fa-3x text-success"
                                                        style="margin-right: 50px"></i></span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Leader</th>
                        <th>Avatar</th>
                        <th>Decription</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staff as $staff)
                        <tr>
                            <td>{!! $staff->email !!}</td>
                            <td>{!! $staff->username !!}</td>
                            @if(!$staff->leader)
                                <td>Không có leader</td>
                            @else
                                <td>{!! $staff->leader->username !!}</td>
                            @endif
                            <td> {!! $staff->avatar !!}</td>
                            <td>{!! $staff->decription !!}</td>
                            <th style="text-align: center"><a href="{!! url("admin/staffs/$staff->id/edit") !!}"><i class="fa fa-pencil-square-o "></i></a></th>
                            <th style="text-align: center"><a href="{!! url("admin/staffs/delete/$staff->id") !!}"><i class="fa fa-eraser"></i></a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->

@endsection