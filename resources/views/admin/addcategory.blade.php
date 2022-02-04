@extends('admin.layouts.app')
@section('content')

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" method="POST" action="/admin/addcategory" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="name">name <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="val-username" name="name" placeholder="Enter a name..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">photo <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="file" class="form-control" id="val-username" name="image" accept="image/png, image/jpeg">
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