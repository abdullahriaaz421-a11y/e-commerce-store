@extends('admin.layouts.master')
@section('title', 'Create New Color')

@section('content')
    <div class="wrapper" style="min-height: 100%; display: flex; flex-direction: column">
        <!-- Content Wrapper -->
        <div class="content-wrapper" style="flex: 1">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Colors</h1>
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
                                    <h6 class="card-title">Create New Color</h6>
                                </div>
                                <form action="{{ route('admin.colors.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Color Name -->
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Color Name" />
                                                @error('name')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <!-- Color Picker -->
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label for="color_picker">
                                                    Select Color
                                                </label>
                                                <input type="color" id="color_picker" class="form-control form-control-color" value="{{ old('code') }}" title="Choose your color" />
                                                <!-- Hidden Color Code -->
                                                <input type="hidden" name="code" id="code" value="{{ old('code') }}" />
                                                @error('code')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submitBtn" class="btn btn-primary">
                                            Submit
                                        </button>
                                        <a href="{{ route('admin.colors.index') }}" class="btn btn-danger">
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

