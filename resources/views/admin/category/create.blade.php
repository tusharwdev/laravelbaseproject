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
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category List</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->

                    <!-- /.card -->

                    <!-- Form Element sizes -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Category Create Form</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                            <label for="name">Name</label>
                               @error('name') <i class="text-danger">{{ $message }}</i> @enderror
                            <input name="name" value="{{ old('name') }}" class="form-control form-control-lg" type="text" placeholder="Enter Category Name">
                            <br>

                            <label for="description">Description</label>
                            <textarea name="description"  class="form-control" type="text" placeholder="Enter Category Description ">
                                {{ old('description') }}
                            </textarea>

                                <br>

                            <label for="status">Status</label>
                                @error('status') <i class="text-danger">{{ $message }}</i>@enderror
                            <div class="form-check">
                                <label for="Active">Active&nbsp;</label>
                                <input type="radio" name="status" class="form-check-inline" value="Active"
                                @if(old('status') && old('status') == "Active") checked @endif >
                                <label for="Inactive">Inactive &nbsp;</label>
                                <input type="radio" name="status" class="form-check-inline" value="Inactive"
                                       @if(old('status') && old('status') == "Inactive") checked @endif >
                            </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
