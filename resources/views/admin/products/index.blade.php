@extends('admin.layouts.master')
@section('title', 'Product List')
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
                                    <h6 class="card-title">Product List</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table-bordered table-hover table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Color</th>
                                                <th>Sizes</th>
                                                <th>Status</th>
                                                <th>Product Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>
                                                        @foreach ($product->colors as $color)
                                                            <div class="d-flex align-items-center">
                                                                <div class="mr-2" style="width: 20px; height: 20px; background-color: {{ $color }}; border: 1px solid #ccc;"></div>
                                                                {{ $color }}
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ implode(', ', $product->sizes) }}</td>
                                                    <td>
                                                        @if ($product->status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">InActive</span>
                                                        @endif
                                                        {{-- {{ $category->status }} --}}
                                                    </td>
                                                    <td>
                                                        @if ($product->images->isNotEmpty())
                                                            <img
                                                                src="{{ asset('storage/uploads/' . $product->images->first()->image_name) }}"
                                                                alt=""
                                                                width="100px"
                                                            />
                                                        @else
                                                            No Image Fount of This Category
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('admin.products.destroy', $product->id) }}"
                                                            method="post"
                                                        >
                                                            @csrf
                                                            @method('Delete')
                                                            <button
                                                                type="submit"
                                                                class="btn btn-danger"
                                                                onclick="
                                                                    return confirm(
                                                                        'Are you Sure to Delete this Product?',
                                                                    );
                                                                "
                                                            >
                                                                Delete
                                                            </button>
                                                            <a
                                                                href="{{ route('admin.products.edit', $product->id) }}"
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
                                    <div class="mt-2">{!! $products->links('pagination::bootstrap-5') !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
