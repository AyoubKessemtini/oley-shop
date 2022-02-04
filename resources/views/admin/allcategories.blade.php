@extends('admin.layouts.app')
@section('content')
<style>
    
</style>
<table class="table" >
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Image</th>
      <th scope="col">name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td style="text-align: left"><img style="width: 60px;" src="{{asset($category->image)}}" alt=""></td>
      <td style="text-align: left" >{{$category->name}}</td>
      <td><a href="/admin/updatecategory/{{$category->id}}">edit</a></td>
      <td>
          <form action="/admin/deletecategory/{{$category->id}}" method="get">
              <button type="submit" style="border: none;background-color:transparent;color:red;">X</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
          
@endsection