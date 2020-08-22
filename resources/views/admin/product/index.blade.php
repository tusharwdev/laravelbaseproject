@extends('admin.layouts.master')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-default-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key=>$product)

                            <tr>
                                <td>{{ $products->firstItem() + $key }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category_id }}</td>
                                <td>{{ $product->price }}</td>
                                <td>


                                    <img src="{{ asset($product->image) }} " alt="Product Image" width="20%">

                                </td>
                                <td>{{ $product->color }}</td>
                                <td>{{ $product->size }}</td>
                                <td>{{ $product->status }}</td>
                                <td>{{ $product->description }}</td>

                                <td><span class="tag tag-success">{{ $product->status }}</span></td>
                                <td><a href="{{ route('product.edit',$product->id) }}">Edit</a>

                                    <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button button-danger" onclick="return confirm('Are You Sure To Delete ?')">Delete</button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    {{ $products->render() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
