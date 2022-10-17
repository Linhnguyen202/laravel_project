@extends('layouts.app')

@section('title','add new student')

@section('content')
<form method="post" action="">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fullname</label>
    <input name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('fullname')
        <span style="color: red; margin-top: 10px">{{$message}}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Birthday</label>
    <input name="birth" type="date" class="form-control" id="exampleInputPassword1">
    @error('birthday')
        <span style="color: red; margin-top: 10px">{{$message}}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address</label>
    <input name="address" class="form-control" id="exampleInputPassword1">
    @error('address')
        <span style="color: red; margin-top: 10px">{{$message}}</span>
    @enderror
</div>


@csrf
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
