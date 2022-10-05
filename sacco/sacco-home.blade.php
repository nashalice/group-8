@extends('layouts.admin')

@section('content')
    <style>
        .amount {
            color: green;
        }

        .what {
            font-size: 20;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col md-3">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-wallet fa-4x" style="color: rgb(0, 73, 18);"></i>
                            </div>
                            <div class="col">
                                <p class="what">Account</p>
                                <h3 class="amount">{{ $total }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col md-3">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-cash-register fa-4x" style="color: rgb(6, 6, 100);"></i>
                            </div>
                            <div class="col">
                                <p class="what">Fines</p>
                                <h3 class="amount">{{ $fines }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if('Mpango'== $category = DB::table('saccos')->where('id','=',Auth::user()->sacco_id)->value('category'))
            <div class="col md-3">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-money-bill-1 fa-4x" style="color: rgb(250, 37, 0);"></i>
                            </div>
                            <div class="col">
                                <p class="what">Loans</p>
                                <h3 class="amount">{{ $loan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col md-3">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-money-bill fa-4x" style="color: rgb(7, 88, 57);"></i>
                            </div>
                            <div class="col">
                                <p class="what">Interest </p>
                                <h3 class="amount">{{$interest}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container p-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Add Member</h5>
                        <p class="card-text">Enter new members in to the database. Members will be added direct to database.
                        </p>
                        <a href="{{ asset('join-sacco') }}" class="btn btn-primary">proceed</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Initiate Fine</h5>
                        <p class="card-text">Issue warning fines to members who do not comply with terms of membership.</p>
                        <a href="{{ asset('issue-fine') }}" class="btn btn-primary">proceed</a>
                    </div>
                </div>
            </div>

            @if('Mpango'== $category = DB::table('saccos')->where('id','=',Auth::user()->sacco_id)->value('category'))
                <div class="col-md-3">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title">Loan Applications</h5>
                            <p class="card-text">Review loan applications and select ones to approve or reject.</p>
                            <a href="loan-application_a" class="btn btn-primary">proceed</a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-3">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Applications</h5>
                        <p class="card-text">See membership applications, and decide whether to approve or reject.</p>
                        <a href="{{ asset('invite') }}" class="btn btn-primary">proceed</a>
                    </div>
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
                                                $users =  DB::table('users')
                                                ->leftJoin('invites', function($join){
                                                    $join->on('users.refferer_code','=','invites.refferer_code');
                                                })
                                                ->where('invites.refferer_code','=',$item->refferer_code)
                                                ->value('name');
                                             }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>

                                                @if ($item->member_status == 1)
                                                    <a class="btn btn-warning" href='/status_update_a/{{ $item->id }}'>Approve member</a>
                                                    <a class="btn btn-danger" href='/status_delete/{{ $item->id }}'>Reject</a>

                                                @else
                                                    <a class="btn btn-success" href='#'>Member</a>
                                                    <a class="btn btn-primary" href='/status_admin_a/{{ $item->id }}'>Make Admin</a>

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

    <div class="container p-3">
        <div class="row">
            <div class="col-md-6">
                <div class="container p-3">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="card-header">Transactions</div>
                                <div class="card-body">
                                    <div class="col">
                                        <div class="py-12">
                                            <!-- Chart's container -->
                                            <div id="chart" style="height: 300px;"></div>
                                            <!-- Charting library -->
                                            <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                                            <!-- Chartisan -->
                                            <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                                            <!-- Your application script -->
                                            <script>
                                                const chart = new Chartisan({
                                                    el: '#chart',
                                                    url: "@chart('deposits_chart')",
                                                    hooks: new ChartisanHooks()
                                                        .colors(['#4299E1', '#FE0045', '#C07EF1', '#67C560', '#ECC94B'])
                                                        .datasets('bar')
                                                        .axis(true)
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="container p-3">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="card-header">Graphs</div>
                                <div class="card-body">
                                    <div class="col" style="text-align: center;">
                                        <i class="fa-solid fa-chart-column fa-10x"
                                            style="color: rgb(77, 77, 233); padding-top:40; padding-bottom:40;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
