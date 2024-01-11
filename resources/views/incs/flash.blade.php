@if($message=Session::get('success'))

<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong> {{$message}}</strong>
</div>

@endif



@if($message=Session::get('successupdate'))

<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong> {{$message}}</strong>
</div>

@endif



@if($message=Session::get('successdelete'))

<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong> {{$message}}</strong>
</div>

@endif







<!-- @if (session()->has('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong> {{session("success")}}</strong>
</div>
@endif -->
