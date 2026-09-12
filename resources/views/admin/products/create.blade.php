@extends('admin.layouts.master')
@section('title', 'Create New Product')
@section('content')
    <div class="wrapper" style="min-height: 100%; display: flex; flex-direction: column">
        <!-- Content Wrapper -->
        <div class="content-wrapper" style="flex: 1">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Products</h1>
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
                                    <h6 class="card-title">Create New Product</h6>
                                </div>
                                <form
                                    action="{{ route('admin.products.store') }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- Name --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label for="name">Name</label>
                                                <input
                                                    type="text"
                                                    name="name"
                                                    id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}"
                                                    placeholder="Enter Product Name"
                                                />
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Price --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label for="price">Price</label>
                                                <input
                                                    type="text"
                                                    name="price"
                                                    id="price"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    value="{{ old('price') }}"
                                                    placeholder="Enter Price"
                                                />
                                                @error('price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Sale Price --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label for="sale_price">Sale Price</label>
                                                <input
                                                    type="text"
                                                    name="sale_price"
                                                    id="sale_price"
                                                    class="form-control @error('sale_price') is-invalid @enderror"
                                                    value="{{ old('sale_price') }}"
                                                    placeholder="Enter Sale Price"
                                                />
                                                @error('sale_price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Category Select --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label for="category_id">Category Select</label>
                                                <select
                                                    name="category_id"
                                                    id="category_id"
                                                    class="form-control select2 @error('category_id') is-invalid @enderror"
                                                >
                                                    <option value="" selected disabled>Select option</option>
                                                    @foreach ($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}"
                                                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                        >
                                                            {{ $category->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Alert Quantity --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label for="alert_quantity">Alert Quantity</label>
                                                <input
                                                    type="number"
                                                    name="alert_quantity"
                                                    id="alert_quantity"
                                                    class="form-control @error('alert_quantity') is-invalid @enderror"
                                                    value="{{ old('alert_quantity') }}"
                                                    placeholder="Enter Alert Quantity"
                                                />
                                                @error('alert_quantity')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Colors --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label for="colors">Colors</label>
                                                <input
                                                    type="text"
                                                    name="colors"
                                                    id="colors"
                                                    class="form-control @error('colors') is-invalid @enderror"
                                                    value="{{ old('colors') }}"
                                                    placeholder='Example: ["Red", "Black", "White"]'
                                                />
                                                @error('colors')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Sizes --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="d-block">Sizes</label>

                                                @php
                                                    $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                                                @endphp

                                                @foreach ($sizes as $size)
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            type="checkbox"
                                                            name="sizes[]"
                                                            id="size_{{ $size }}"
                                                            value="{{ $size }}"
                                                            class="form-check-input"
                                                        /><label class="form-check-label" for="size_{{ $size }}">
                                                            {{ $size }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                                @error('sizes')
                                                    <small class="text-danger d-block">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Images --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label for="images">Images</label>
                                                <input
                                                    type="file"
                                                    name="images[]"
                                                    id="images"
                                                    class="form-control @error('images') is-invalid @enderror"
                                                    value="{{ old('images') }}"
                                                    multiple
                                                />
                                                @error('images')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Status --}}
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
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
                                            {{-- Description --}}
                                            <div class="col-12 mb-3">
                                                <label for="description">Description</label>
                                                <textarea
                                                    name="description"
                                                    id="description"
                                                    rows="4"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="Enter Product Description"
                                                >{{ old('description') }}</textarea>
                                                @error('description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Details --}}
                                            <div class="col-12 mb-3">
                                                <label for="details">Details</label>
                                                <textarea
                                                    name="details"
                                                    id="details"
                                                    rows="6"
                                                    class="form-control @error('details') is-invalid @enderror"
                                                    placeholder="Enter Product Details"
                                                >{{ old('details') }}</textarea>
                                                @error('details')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('admin.products.index') }}" class="btn btn-danger">
                                            Cancel
                                        </a>
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
