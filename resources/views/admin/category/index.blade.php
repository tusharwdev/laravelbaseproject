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
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key=>$category)

                            <tr>
                                <td>{{ $categories->firstItem() + $key }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>

                                <td><span class="tag tag-success">{{ $category->status }}</span></td>
                                <td><a href="{{ route('category.edit',$category->id) }}">Edit</a>

                                    <form action="{{ route('category.destroy',$category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button button-danger" onclick="return confirm('Are You Sure To Delete ?')">Delete</button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    {{ $categories->render() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
