@extends('admin.layouts.master')
@section('title', 'Category List')
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
                                    <h6 class="card-title">Category List</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table-bordered table-hover table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>
                                                <th>Name</th>
                                                <th>Category Image</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $category)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $category->category_name }}</td>
                                                    <td>
                                                        @if ($category->image)
                                                            <img
                                                                src="{{ asset('storage/uploads/' . $category->image->image_name) }}"
                                                                alt=""
                                                                width="100px"
                                                            />
                                                        @else
                                                            No Image Fount of This Category
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($category->status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">InActive</span>
                                                        @endif
                                                        {{-- {{ $category->status }} --}}
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('admin.categories.destroy', $category->id) }}"
                                                            method="post"
                                                        >
                                                            @csrf
                                                            @method('Delete')
                                                            <button
                                                                type="submit"
                                                                class="btn btn-danger"
                                                                onclick="
                                                                    return confirm(
                                                                        'Are you Sure to Delete this Category?',
                                                                    );
                                                                "
                                                            >
                                                                Delete
                                                            </button>
                                                            <a
                                                                href="{{ route('admin.categories.edit', $category->id) }}"
                                                                class="btn btn-primary"
                                                            >Edit</a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="12" class="text-danger font-weight-bold text-center">
                                                        No Categories Found.....
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="mt-2">{!! $categories->links('pagination::bootstrap-5') !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
