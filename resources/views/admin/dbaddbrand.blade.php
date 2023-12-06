@extends('admin.dashbd')
@section('dashboard')
    <form action="addbranddata" enctype="multipart/form-data" method="post" class="w-50 mt-5 mx-auto mt-3 bg-light shadow-lg p-3">
        <h3 class="text-center"><i>ADD BRAND</i></h3>
        @csrf
        <input type="text" name="name" id="" class="form-control mt-3">
        <input type="file" name="image" id="" class="form-control mt-3">
        <textarea name="desc" id="" cols="30" rows="5" class="form-control mt-3"></textarea>
        <input type="submit" name="addbrand" class="btn btn-dark mx-auto d-block mt-3">
    </form>    
@endsection    