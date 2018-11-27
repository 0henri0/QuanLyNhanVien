@extends('staff.layouts.index')@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Striped Full Width Table</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px ;border-right: #2c3b41 solid 0.2px;text-align: center">Tháng</th>
                <th style="border-right: #2c3b41 solid 0.2px;text-align: center" >Số Lần Làm Timesheet</th>
                <th style="text-align: center">Số Lần Làm Timesheet muộn</th>
            </tr>
            @foreach( $workManager as $workManager)
            <tr style="text-align: center">
                <td style="border-right: #2c3b41 solid 0.2px">{{\Carbon\Carbon::parse($workManager->date)->format('m-Y')}}</td>
                <td style="border-right: #2c3b41 solid 0.2px">{{$workManager->number_register}}</td>
                <td>
                    {{$workManager->number_late}}
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection