@extends('admin.layouts.app')
@section('content')

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" method="POST" action="/admin/updateproduct/{{$product->id}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">old title: {{$product->title}} <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="val-username" name="title" placeholder="Enter a new title..">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">old description : {{$product->description}} <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <textarea style="height: 100px;" class="form-control" name="description" cols="300" rows="500" placeholder="Enter a new description.." ></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">old category : {{$product->category->name}}<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                <select class="form-control" id="val-skill" name="category">
                                                    @foreach($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option> 
                                                         
                                                    @endforeach   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">old price : ${{$product->price}} <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="number" class="form-control" id="val-username" name="price" placeholder="Enter a new price..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">old photo : <img src="{{asset($product->image)}}" alt="image" style="width: 100px;"> <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="file" class="form-control" id="val-username" name="image" accept="image/png, image/jpeg">
                                                </div>
                                            </div>
                                            <div style="border: 1px solid orange;">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">old link : {{$product->link}} <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="val-username" name="link" placeholder="Enter a new link..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">old original price : ${{$product->originalPRice}} <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="number" class="form-control" id="val-username" name="originalprice" placeholder="Enter a new original price price..">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-primary">update!</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection