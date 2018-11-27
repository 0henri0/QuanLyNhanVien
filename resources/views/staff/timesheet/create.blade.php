@extends('staff.layouts.index')@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tạo Timesheet</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{url('timesheets')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ngày</label>

                    <div class="col-sm-10">
                        <input type="date" class="form-control pull-right" value="{{ old('date') }}" name="date"
                               id="datePicker" placeholder="date">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Khó Khăn</label>

                    <div class="col-sm-10">
                            <textarea name="difficulty" class="form-control" rows="5" id="comment"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Công việc Tiếp Theo</label>

                    <div class="col-sm-10">
                            <textarea name="work_next_day" class="form-control" rows="5" id="comment"></textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" id="reset-form" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

@endsection

@section('script')

    <script>
        function getDefaultDate() {

            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear() + "-" + (month) + "-" + (day);

            return today;
        }

        $(document).ready(function () {
            $("#datePicker").val(getDefaultDate());
        });

       $('#reset-form').click(function () {
           $(document).ready(function () {
               $("#datePicker").val(getDefaultDate());
           });
       });

    </script>

@endsection