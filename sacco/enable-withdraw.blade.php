@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Select member to recieve withdraw') }}</div>

                <div class="card-body">

                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success')}}
                        </div>

                    @endif

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail')}}
                        </div>

                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="container p-3">
        <div class="row">
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header">Members</div>
                    <div class="card-body">
                        <div class="col">
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
                                            // $ref_id = DB::table('invites')->where('refferer_code',$item->refferer_code)->value('user_id');
                                            $users =  DB::table('users')
                                            ->leftJoin('invites', function($join){
                                                $join->on('users.refferer_code','=','invites.refferer_code');
                                            })
                                            ->where('invites.refferer_code','=',$item->refferer_code)
                                            ->value('name');
                                             }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                @if ($item->withdraw_status == 0)
                                                    @if ($status == 1)
                                                        <a class="btn btn-primary" href='/status_update_withdraw/{{ $item->id }}'>Enable withdraw</a>

                                                    @endif

                                                @elseif($item->withdraw_status == 1)
                                                    @if ($status == 0)
                                                        <div>Disable member withdraw status to view other members</div>
                                                        <a class="btn btn-danger" href='/status_delete_withdraw/{{ $item->id }}'>Disable</a>
                                                    @endif

                                                @else
                                                    <a class="btn btn-success" href='#'>Approved</a>
                                                @endif
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
    </div>

</div>
@endsection
