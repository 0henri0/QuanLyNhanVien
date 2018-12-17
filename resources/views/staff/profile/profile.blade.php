@extends('staff.layouts.index')
@section('content')

    <section class="content-header">
        <h1>
            User Profile
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="{!! Auth::user()->avatar !!}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{Auth::user()->username}}</h3>

                        <p class="text-muted text-center">{{Auth::user()->email}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Số Staff Quản Lý</b> <a class="pull-right">{!! count(Auth::user()->staff) !!}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Người Quản Lý</b>
                                @if(Auth::user()->leader)
                                    <a class="pull-right">{!! Auth::user()->leader->username !!}</a>
                                @else Không Có
                                @endif
                            </li>
                            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><b>Đổi
                                    Password</b></a>
                        </ul>
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" class="form-horizontal" method="post"
                                          action="{!! route('profile') !!}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Password
                                                Cũ</label>

                                            <div class="col-sm-10">
                                                <input type="password" name="password-old" class="form-control"
                                                       id="inputPassword3"
                                                       placeholder="Password Old">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control"
                                                       id="inputPassword3"
                                                       placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Confirm
                                                Password</label>

                                            <div class="col-sm-10">
                                                <input type="password" name="passwordAgain" class="form-control"
                                                       id="inputPassword3" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                                <button type="reset" class="btn btn-primary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>{{Auth::user()->decription}}</p>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post"
                                  action="{!! route('profile') !!}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input name="usermame" type="text" value="{!! Auth::user()->username !!}"
                                               class="form-control"
                                               id="inputName" placeholder="UserName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input disabled name="email" type="email" class="form-control"
                                               value="{!! Auth::user()->email !!}"
                                               id="inputEmail"
                                               placeholder="Email">
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                {{--<label for="inputPassword3" class="col-sm-2 control-label">Password</label>--}}

                                {{--<div class="col-sm-10">--}}
                                {{--<input type="password" name="password" class="form-control" id="inputPassword3"--}}
                                {{--placeholder="Password">--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                {{--<label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>--}}

                                {{--<div class="col-sm-10">--}}
                                {{--<input type="password" name="passwordAgain" class="form-control"--}}
                                {{--id="inputPassword3" placeholder="Confirm Password">--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Decription</label>

                                    <div class="col-sm-10">
                                            <textarea name="decription" class="form-control" id="inputExperience"
                                                      placeholder="Decription">{!! Auth::user()->decription !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="file" name="avatar" id="avatar">
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-10" style="width: 100vw;" id="imgupload">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->


@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("input[name=avatar]").change(function () {
                $("#avatar").html($("input[name=avatar]").val());
            });
            $("input[name=avatar]").change(function (e) {
                var file = e.originalEvent.srcElement.files[e.originalEvent.srcElement.files.length - 1];
                var img = document.createElement("img");
                var reader = new FileReader();
                reader.onloadend = function () {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
                $("#imgupload").html(img);
                img.width = "300";
            });
        });
        $('#select-state').selectize({
            create: false,
        });
    </script>
@endsection