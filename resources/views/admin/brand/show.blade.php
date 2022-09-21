@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.brand.index')}}">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Brand Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputArabicName">Arabic Name</label>
                                <input readonly type="text" class="form-control" id="exampleInputArabicName"
                                    placeholder="Enter Arabic Name" name="name_ar" value="{{$brand->name_ar}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEnglishName">English Name</label>
                                <input readonly type="text" class="form-control" id="exampleInputEnglishName"
                                    placeholder="Enter English Name" name="name_en" value="{{$brand->name_en}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputArabicDescription">Arabic Description</label>
                                <textarea readonly class="form-control" id="exampleInputArabicDescription"
                                    placeholder="Enter Arabic Description"
                                    name="description_ar">{{$brand->description_ar}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEnglishDescription">English Description</label>
                                <textarea readonly class="form-control" id="exampleInputEnglishDescription"
                                    placeholder="Enter English Description"
                                    name="description_en">{{$brand->description_en}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <img src="{{ $brand->image }}" class="mg-fluid img-thumbnail"
                                    style="max-width: 150px">
                                </td>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
