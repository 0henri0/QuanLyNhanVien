@extends('staff.layouts.index')@section('content')
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bordered Table</h3>
                <a href="{!! asset('timesheets/create') !!}"><span class="pull-right"><i
                                class="fa fa-plus-square fa-3x text-success" style="margin-right: 50px"></i></span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>

                        <th style="width: 50px">Tháng <br>11/2018</th>
                        <th style="text-align: center;padding-top: 20px">Khó Khăn</th>
                        <th style="text-align: center;padding-top: 20px">Công Việc Ngày Tiếp Theo</th>
                        <th style="width: 90px;padding-top: 20px">Trạng Thái</th>
                        <th style="width: 40px;padding-top: 20px">Sửa</th>
                        <th style="width: 20px;padding-top: 20px">Task</th>
                    </tr>
                    @foreach($timesheet as $timesheet)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($timesheet->date)->format('d')}}</td>
                            <td>{!! $timesheet->difficulty !!}</td>
                            <td>
                                {!! $timesheet->work_next_day !!}
                            </td>

                            @if($timesheet->approve==0)
                                <td style="text-align: center"><span class="label label-warning">Penning</span></td>
                            @elseif($timesheet->approve==1)
                                <td style="text-align: center"><span class="label label-success">Approved</span></td>
                            @else
                                <td style="text-align: center"><span class="label label-danger">Denied</span></td>
                            @endif
                            <td style="text-align: center"><a
                                        href="{!! asset("timesheets/$timesheet->id/edit") !!}"><span
                                            class="fa fa-edit"></span></a></td>
                            <td style="width: 20px;text-align: center"><a
                                        href="{!! asset("timesheets/$timesheet->id/tasks") !!}"><span
                                            class="fa fa-eye"></span></a></td>
                        </tr>

                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->

        </div>
    </div>
@endsection

@section('script')

@endsection

@section('css')
    <style>
        td:hover {
            background-color: rgba(255, 84, 192, 0.07);
        }
    </style>
@endsection