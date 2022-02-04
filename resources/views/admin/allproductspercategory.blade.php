@extends('admin.layouts.app')
@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">State</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)

    <tr>
      <th scope="row">{{$product->id}}</th>
      <td><img style="width: 70px;" src="{{asset($product->image)}}" alt=""></td>
      <td>{{$product->title}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->category->name}}</td>
      <td>{{$product->price}}</td>
      <td>@if($product->state ==1)In Stock @else Out of stock @endif</td>
      <td><a href="/admin/updateproduct/{{$product->id}}">edit</a></td>
      <td>
          <form action="/admin/deleteproduct/{{$product->id}}" method="get">
              <button type="submit" style="border: none;background-color:transparent;color:red;">X</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
          
@endsection