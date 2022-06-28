@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row">
        <table class="table text-center" id="dataTable1">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Birth Date</th>
                    <th scope="col">Controls</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr style="backgroundColor:#fff">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{($user->birth_date)? $user->birth_date : 'empty'}}</td>

                    <td class="justify-content-center">

                        <a href={{"users/edit/".$user->id}} class="btn btn-success btn-sm text-light">Edit</a>

                        <form action="{{url('users/'.$user->id)}}" method="POST" style="display:inline-block">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-light" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <div class="display-3 text-center">No Users Available</div>
            @endforelse
            </tbody>
        </table>

    </div>
        {{ $users->links() }}
    </div>
@endsection


