@extends('admin.layouts.app')
@section('content')
<br><br>
<h3>Welcome back admin , you have {{$nbr}} old Orders(s)</h3>


<table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>  
      <th scope="col">Date</th>
      <th scope="col">First name // Last name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Address2</th>
      <th scope="col">Country</th>
      <th scope="col">State//Zip</th>
    </tr>
  </thead>
  <tbody>
@foreach($orders as $order)
    <tr>
      <th scope="row">{{$order->id}}</th>
      <th scope="row">{{$order->created_at}} </th>
      <td>{{$order->user->firstName}} {{$order->user->lastName}}</td>
      <td>{{$order->phone}} </td>
      <td>Address : {{$order->address}}</td>
      <td>{{$order->address2}}</td>
      <td>{{$order->country}} </td>
      <td>{{$order->state}} // {{$order->zip}}  </td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection