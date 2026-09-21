@extends('admin.layouts.master')
@section('title', 'Order List')
@section('content')
    <div class="wrapper" style="min-height: 100%; display: flex; flex-direction: column">
        <!-- Content Wrapper -->
        <div class="content-wrapper" style="flex: 1">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Orders</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pl-3 pr-3">
                <div class="row mb-3 align-items-center">
                    {{-- Left Side: Search --}}
                    <div class="col-md-7">
                        <form action="" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search Order #, Customer Name, Phone, Adress..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>
                            {{-- Keep selected status --}}
                            @if (request('status'))
                                <input type="hidden" name="status" value="{{ request('status') }}">
                            @endif
                        </form>
                    </div>
    
                    {{-- Right Side: Date --}}
                    <div class="col-md-3 ms-auto">
                        <form action="" method="GET">
                            <input type="date" name="date" class="form-control" value="{{ request('date') }}"
                                onchange="this.form.submit()">
                            {{-- Keep selected status --}}
                            @if (request('status'))
                                <input type="hidden" name="status" value="{{ request('status') }}">
                            @endif
                            {{-- Keep search --}}
                            @if (request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card rounded">
                                <div class="card-header">
                                    <h6 class="card-title">Order List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-1">
                                        <a href="{{ route('admin.orders.show', ['status' => 'all']) }}"
                                            class="btn bg-dark ml-2">All</a>
                                        <a href="{{ route('admin.orders.show', ['status' => 'confirmed']) }}"
                                            class="btn btn-primary ml-2">Confirmed</a>
                                        <a href="{{ route('admin.orders.show', ['status' => 'pending']) }}"
                                            class="btn btn-warning text-white ml-2">Pending</a>
                                        <a href="{{ route('admin.orders.show', ['status' => 'order_processed']) }}"
                                            class="btn bg-purple ml-2">Order Processed</a>
                                        <a href="{{ route('admin.orders.show', ['status' => 'on_the_way']) }}"
                                            class="btn bg-info ml-2">On The Way</a>
                                        <a href="{{ route('admin.orders.show', ['status' => 'hold']) }}"
                                            class="btn bg-orange text-white ml-2">Hold</a>
                                        <a href="{{ route('admin.orders.show', ['status' => 'delivered']) }}"
                                            class="btn bg-green ml-2">Delivered</a>
                                        <a href="{{ route('admin.orders.show', ['status' => 'refund']) }}"
                                            class="btn bg-secondary ml-2">Refund</a>
                                        <a href="{{ route('admin.orders.show', ['status' => 'cancelled']) }}"
                                            class="btn bg-danger ml-2">Cancelled</a>
                                    </div>
                                    <table class="table table-bordered table-hover ">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th>No#</th>
                                                <th>Order#</th>
                                                <th>Customer</th>
                                                <th>Total</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Placed On</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>{{ $order->fname }} {{ $order->lname }}</td>
                                                    <td>{{ $order->total_price }}</td>
                                                    <td>Cash On deliverytd</td>
                                                    <td>
                                                        @if ($order->status == 'confirmed')
                                                            <span class="badge bg-primary">Confirmed</span>
                                                        @elseif ($order->status == 'in_process')
                                                            <span class="badge bg-warning text-dark">In Process</span>
                                                        @elseif ($order->status == 'order_processed')
                                                            <span class="badge bg-purple">Order Processed</span>
                                                        @elseif ($order->status == 'on_the_way')
                                                            <span class="badge bg-success">On The Way</span>
                                                        @elseif ($order->status == 'hold')
                                                            <span class="badge bg-orange">Hold</span>
                                                        @elseif ($order->status == 'delivered')
                                                            <span class="badge bg-success">Delivered</span>
                                                        @elseif ($order->status == 'refund')
                                                            <span class="badge bg-secondary">Refund</span>
                                                        @elseif ($order->status == 'cancelled')
                                                            <span class="badge bg-danger">Cancelled</span>
                                                        @else
                                                            <span class="badge bg-dark">{{ $order->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $order->created_at->format('d F Y') }}</td>
                                                    <td>
                                                        <a href="" class="btn bg-purple"><i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="{{ route('admin.invoice', $order->order_number) }}"
                                                            target="blank" class="btn bg-primary"><i
                                                                class="fa fa-file"></i></a>
                                                    </td>
                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="12" class="text-danger font-weight-bold text-center">
                                                        No Orders Found.....
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                    <div class="mt-2">{!! $orders->links('pagination::bootstrap-5') !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
