@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Members') }}</div>

                <div class="card-body">
                    <table class="table p-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">NIN</th>
                                <th scope="col">Inviter</th>
                                <th scope="col">Joined on</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->NIN }}</td>
                                    <td>{{
                                        $users =  DB::table('users')
                                        ->leftJoin('invites', function($join){
                                            $join->on('users.refferer_code','=','invites.refferer_code');
                                        })
                                        ->where('invites.refferer_code','=',$item->refferer_code)
                                        ->value('name');
                                     }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                            <a class="btn btn-success" href='#'>Member</a>
                                            <a class="btn btn-primary" href='/status_admin_a/{{ $item->id }}'>Make Admin</a>

                                            <a class="btn btn-danger" href='/status_delete/{{ $item->id }}'>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
