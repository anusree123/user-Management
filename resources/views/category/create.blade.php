@extends('layouts.AdminLayout')

@section('content')
    <div class="container">
        <h3 class="text-center">Add New Category</h3>


        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form method="POST" action="/category/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="full_name"> Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="full_name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection
