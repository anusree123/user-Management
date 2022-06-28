@extends('layouts.AdminLayout')

@section('content')
    <div class="container">



        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form method="POST" action="/subcategory/store" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">


                                <label  for="basicSelect">Category</label>
                                <select class="form-control CategorySelect" id="CategorySelect" name="category_id" >
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $key }}" {{ (old('category_id') == $key ) ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>

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
