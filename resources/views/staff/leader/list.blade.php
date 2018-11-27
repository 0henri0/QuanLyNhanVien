@extends('staff.layouts.index')@section('content')
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>

                        <th style="width: 50px">Tháng <br>{{\Carbon\Carbon::now()->format('m')}}
                            /2018
                        </th>
                        <th style="width: 100px">Tên Staff</th>
                        <th style="text-align: center;padding-top: 20px">Khó Khăn</th>
                        <th style="text-align: center;padding-top: 20px">Công Việc Ngày Tiếp Theo</th>
                        <th style="width: 20px;padding-top: 20px">Task</th>
                        <th style="width: 90px;padding-top: 20px">Trạng Thái</th>

                    </tr>
                    @foreach($leader as $leader)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($leader->date)->format('d')}}</td>
                            <td>{{$leader->staff->username}}</td>
                            <td>{!! $leader->difficulty !!}</td>
                            <td>
                                {!! $leader->work_next_day !!}
                            </td>
                            <td style="width: 20px;text-align: center"><a
                                        href="{!! asset("timesheets/$leader->id/tasks") !!}"><span
                                            class="fa fa-eye"></span></a></td>
                            @if($leader->approve==0)
                                <td style="text-align: center"><a href="{!! asset("leader/$leader->id") !!}"><span
                                                class="label label-warning">Accept</span></a></td>
                                @else
                                <td style="text-align: center"><span
                                            class="label label-default " >Accepted</span></td>
                            @endif

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