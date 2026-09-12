@extends('admin.layouts.master')
@section('title', 'Edit Category')
@section('content')
    <div class="wrapper" style="min-height: 100%; display: flex; flex-direction: column">
        <!-- Content Wrapper -->
        <div class="content-wrapper" style="flex: 1">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Categories</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card rounded">
                                <div class="card-header">
                                    <h6 class="card-title">Edit Category</h6>
                                </div>
                                <form
                                    action="{{ route('admin.categories.update',$category->id) }}"
                                    method="post"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label for="category_name">Category Name</label>
                                                <input
                                                    type="text"
                                                    name="category_name"
                                                    id="category_name"
                                                    class="form-control @error('category_name') is-invalid @enderror"
                                                    value="{{ old('category_name',$category->category_name) }}"
                                                    placeholder="Enter Category Name"
                                                />
                                                @error('category_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label for="image">Image</label>
                                                <input
                                                    type="file"
                                                    name="image"
                                                    id="image"
                                                    class="form-control @error('image') is-invalid @enderror"
                                                    value="{{ old('image') }}"
                                                />
                                                @error('image')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label for="status">Status</label>
                                                <select
                                                    name="status"
                                                    id="status"
                                                    class="form-control select2 @error('status') is-invalid @enderror"
                                                >
                                                    <option value="" selected disabled>Select option</option>
                                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                        InActive
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submitBtn" class="btn btn-primary">Update</button>
                                        <a href="{{ route('admin.categories.index') }}" class="btn btn-danger"
                                            >Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
