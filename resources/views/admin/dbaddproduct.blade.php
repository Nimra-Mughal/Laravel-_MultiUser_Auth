@extends('admin.dashbd')
@section('dashboard')
    <form action="addproductdata" enctype="multipart/form-data" method="post" class="w-75 mt-3 mx-auto mt-3 bg-light shadow-lg p-3">
        <h3 class="text-center"><i>ADD PRODUCT</i></h3>
        @csrf
        <input type="text" name="name" id="" class="form-control mt-3">
        <input type="number" name="price" id="" class="form-control mt-3">
        <br>
        <select name="brand" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach ($brand as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>

                
            @endforeach
          
          </select>
        <input type="file" name="image" id="" class="form-control mt-3">
        <textarea name="desc" id="" cols="30" rows="10" class="form-control mt-3"></textarea>
        <input type="submit" name="insert" class="btn btn-dark mx-auto d-block mt-3">
    </form>    
@endsection    