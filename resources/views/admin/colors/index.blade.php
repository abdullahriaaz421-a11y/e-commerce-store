@extends('admin.layouts.master')
@section('title', 'Color List')
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
                                    <h6 class="card-title">Color List</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table-bordered table-hover table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>
                                                <th>Name</th>
                                                <th>Color Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($colors as $color)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $color->name }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-2" style="width: 20px; height: 20px; background-color: {{ $color->code }}; border: 1px solid #ccc;"></div>
                                                            {{ $color->code }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.colors.destroy', $color->id) }}" method="post" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this color?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center fw-bold">No colors found......</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
