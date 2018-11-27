@extends('admin.layouts.index') @section('content')


    <form class="form-horizontal" action="{{url('admin/system')}}" method="post" style="width: 50%;margin: 0 0 0 40px;padding-top: 40px">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
            <div class="form-group row" >
                <label for="example-time-input" class="col-2 col-form-label">Start Timesheet</label>
                <div class="col-10">
                    <input class="form-control" name="start_timesheet" type="time" value="{{ $system->start_timesheet }}"
                           id="example-time-input"
                           readonly>
                </div>
            </div>
            <div class="form-group row" >
                <label for="example-time-input" class="col-2 col-form-label">End Timesheet</label>
                <div class="col-10">
                    <input class="form-control" name="end_timesheet" type="time" value="{!! $system->end_timesheet !!}"
                           id="example-time-input"
                           readonly>
                </div>
            </div>
        </div>
            <button id="edit-system" style="display: block" type="reset" class="btn btn-success pull-right">Edit</button>
        <div id="submit-system" style="display: none">
            <button id="cancel-system"  type="reset" class="btn btn-success pull-right">Cancel</button>
            <button type="submit" class="btn btn-info pull-right" style="margin-right: 10px">Submit</button>
        </div>
    </form>
@endsection

@section('script')
<script>
 $("#edit-system").click(function () {
     $("#edit-system").css("display","none");
     $("#submit-system").css("display","block");
     $("input").attr('readonly',false);
 });

 $("#cancel-system").click(function () {
     $("#submit-system").css("display","none");
     $("#edit-system").css("display","block");
     $("input").attr('readonly',true);
 });


</script>

@endsection