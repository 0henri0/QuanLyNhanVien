@extends('staff.layouts.index')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tạo Tài Khoản Nhân Viên</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{url("admin/staffs/Auth::user()->id")}}" method="post">
            {{ method_field('PUT') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                        <input type="text" value="{{ Auth::user()->username }}" name="username" class="form-control" id="inputEmail3" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3"  class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control" id="inputEmail3" placeholder="Email" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>

                    <div class="col-sm-10">
                        <input type="password" name="passwordAgain" class="form-control" id="inputPassword3" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

@endsection