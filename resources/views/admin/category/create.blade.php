@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Back</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Category Details</h3>
                    </div>
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data"
                        id="add-category">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group category-select">
                                        <label>Choose Category</label>
                                        <select class="form-control categories select2" id="categories" name="category_id"
                                            >
                                            <option value="" disabled>Select Category</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">
                                                    {{ $cat['name_' . app()->getLocale()] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check" style="display: flex;align-items: center;height: 100%;">
                                        <input class="form-check-input set-as-parent" type="checkbox" value="1"
                                            name="is_parent" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Set as Parent Category
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputArabicName">Arabic Name</label>
                                        <input type="text" class="form-control" id="exampleInputArabicName"
                                            placeholder="Enter Arabic Name" value="{{ old('name_ar') }}" name="name_ar">
                                        @error('name_ar')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEnglishName">English Name</label>
                                        <input type="text" class="form-control" id="exampleInputEnglishName"
                                            value="{{ old('name_en') }}" placeholder="Enter English Name" name="name_en">
                                        @error('name_en')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputArabicDescription">Arabic Description</label>
                                        <textarea class="form-control" id="exampleInputArabicDescription" placeholder="Enter Arabic Description"
                                            name="description_ar">{{ old('description_ar') }}</textarea>
                                        @error('description_ar')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEnglishDescription">English Description</label>
                                        <textarea class="form-control" id="exampleInputEnglishDescription" placeholder="Enter English Description"
                                            name="description_en">{{ old('description_en') }}</textarea>
                                        @error('description_en')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-xs-12">
                                    <div class="pl-3 card-title mb-2">
                                        <b>Dough</b>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($doughTypes->groupBy('dough_type_id') as $doughGroup)
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" name="dough_type{{$loop->index > 0 ? '_2' : ''}}_id" type="checkbox"
                                                    value="{{ $doughGroup->first()->dough_type_id }}"
                                                    id="flexCheckDefault{{ $doughGroup->first()->dough_type_id }}">
                                                <label class="form-check-label"
                                                    for="flexCheckDefault{{ $doughGroup->first()->dough_type_id }}">
                                                    ({{ $doughGroup->first()->name_en }} -
                                                    {{ $doughGroup->first()->name_ar }},
                                                    {{ $doughGroup->last()->name_en }} -
                                                    {{ $doughGroup->last()->name_ar }})
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="dough_type_id">Dough Type</label>
                                        <select class="form-control" name="dough_type_id">
                                            <option value="0" @if (old('dough_type_id') == '0') selected @endif>مشروبات
                                            </option>
                                            <option value="1" @if (old('dough_type_id') == '1') selected @endif>غير
                                                المعجنات
                                            </option>
                                            <option value="2" @if (old('dough_type_id') == '2') selected @endif>معجنات
                                            </option>
                                        </select>
                                        @error('dough_type_id')
                                        <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" value="{{ old('image') }}"
                                                id="exampleInputFile" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            @error('image')
                                                <div class="help-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        window.onbeforeunload = function() {
            return 'Are you sure? Your work will be lost. ';
        };
        $(document).ready(function() {
            $('.custom-file-input').on('change', function() {
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })


            $('input').change(function(e) {
                // Warning
                $(window).on('beforeunload', function() {
                    return "Are you sure you want to navigate away from this page?";
                });

                // Form Submit
                $(document).on("submit", "form", function(event) {
                    // disable unload warning
                    $(window).off('beforeunload');
                });
            });

            $('.set-as-parent').change(function(e) {
                var checked = $(this).is(":checked");
                if (checked) {
                    $('.category-select .select2.select2-container').css('display', 'none');
                } else {
                    $('.category-select .select2.select2-container').css('display', 'block');
                }
            });
        });
    </script>
@endpush
