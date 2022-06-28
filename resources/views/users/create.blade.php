@extends('layouts.AdminLayout')

@section('content')
    <div class="container">
            <h3 class="text-center">Add New User</h3>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form method="POST" action="/users/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="full_name">
                        @error('name')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                        @error('email')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="pass">
                        @error('password')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Mobile</label>
                        <input type="mobile" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile">
                        @error('mobile')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth Date</label>
                        <input type="date" name="birth_date" class="form-control" id="birth_date">
                    </div>
                    <div class="form-group">
                        <label for="email">Address</label>
                        <input type="address" name="address" class="form-control @error('address') is-invalid @enderror" id="address">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                        @error('role')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="permissionSelect">Permission</label>
                        <select class="form-control" name="permission" id="permissionSelect">
                            <option value="read">Read</option>
                            <option value="write">Write</option>
                            <option value="execute">Execute</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Upload Image</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection
