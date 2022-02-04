@extends('admin.layouts.app')
@section('content')

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" method="POST" action="{{route('addproduct')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">title <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="val-username" name="title" placeholder="Enter a title..">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">description <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <textarea style="height: 100px;" class="form-control" name="description" cols="300" rows="500" placeholder="Enter a description.." required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">category<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                <select class="form-control" id="val-skill" name="category">
                                                    @foreach($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option> 
                                                         
                                                    @endforeach   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">price <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="number" class="form-control" id="val-username" name="price" placeholder="Enter a price.." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">photo <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="file" class="form-control" id="val-username" name="image" accept="image/png, image/jpeg" required>
                                                </div>
                                            </div>
                                            <div style="border: 1px solid orange;">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">link <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="val-username" name="link" placeholder="Enter a link.." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">original price <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="number" class="form-control" id="val-username" name="originalprice" placeholder="Enter the original price price.." required>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-primary">add!</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection