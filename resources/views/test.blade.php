{{--{{dd($test)}}--}}
<div>hihi</div>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err) {{$err}}
        <br> @endforeach()
    </div>
@endif

-----------------------------
@if(session('notify'))
    <div class="alert alert-success">
        {{session('notify')}}
    </div>
@endif
@se