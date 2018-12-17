@extends('staff.layouts.index')@section('content')
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Danh Sách Task</h3>
                <span class="pull-right" data-toggle="modal" data-target="#myModal"><a href="#"><i
                                class="fa fa-plus-square fa-3x text-success" style="margin-right: 50px"></i></a></span>

            </div>
        @if(count($task))
            <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">STT</th>
                            <th style="text-align: center;padding-top: 20px">Nội Dung</th>
                            <th style="text-align: center;padding-top: 20px;width: 100px">Thời gian hoàn thành</th>
                            <th style="width: 40px;padding-top: 20px">Sửa</th>
                            <th style="width: 40px;padding-top: 20px">Xóa</th>
                        </tr>
                        @foreach($task as $key=>$task)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{!! $task->content !!}</td>
                                <td>
                                    {!! $task->useTime !!}
                                </td>
                                <td style="text-align: center"><a name="edit-task" href="#" value="{{$task->id}}"
                                                                  data-toggle="modal" data-target="#myModal2"> <span
                                                class="fa fa-edit"></span></a></td>
                                <td style="text-align: center"><a href="{{asset("tasks/delete/$task->id")}}" style="color: red"><span
                                                class="fa fa-trash"></span></a></td>
                            </tr>
                        @endforeach
                    </table>
                    <!-- Form edit task-->
                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Sửa Task</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" id='form-edit-task' method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nội Dung</label>

                                                <div class="col-sm-10">
                                                    <textarea name="content" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Thời Gian Hoàn Thành</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" name="useTime">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="reset" id="reset-form" class="btn btn-default">Reset</button>
                                            <button id="submit-edit-task" type="button"
                                                    class="btn btn-success pull-right">Submit
                                            </button>
                                        </div>
                                        <!-- /.box-footer -->
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Form create task-->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{url("timesheets/$timesheet/tasks")}}"
                          method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nội Dung</label>

                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Thời Gian Hoàn Thành</label>

                                <div class="col-sm-10">
                                    <input class="form-control" name="useTime">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" id="reset-form" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-success pull-right">Submit</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('script')
    <script>

        var x;
        $(document).ready(function () {
            $("a[name='edit-task']").click(function () {
                x = $(this).attr('value');
            });

            $("#submit-edit-task").click(function () {
                $('#form-edit-task').attr('action', "{!! asset('tasks/') !!}" + '/' + x).submit();
            });

        })


    </script>

@endsection

@section('css')
    <style>
        td:hover {
            background-color: rgba(255, 84, 192, 0.07);
        }
    </style>
@endsection