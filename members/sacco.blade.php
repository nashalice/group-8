@extends('layouts.app')

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
                                <p class="what">Available funds</p>
                                <h3 class="amount">{{ $sacco_totals }}</h3>
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
                                <i class="fa-solid fa-wallet fa-4x" style="color: rgb(0, 73, 18);"></i>
                            </div>
                            <div class="col">
                                <p class="what">Total savings</p>
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
                                <p class="what">Total expected Fines</p>
                                @if($interest != null)
                                <h3 class="amount">{{ $fines }}</h3>
                                @else
                                    <h3 class="amount">0</h3></h3>
                                @endif
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
                                    <p class="what">Total Loan </p>
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
                                <p class="what">Projected Interest</p>
                                @if($interest != null)
                                    <h3 class="amount">{{ $interest }}</h3>
                                @else
                                    <h3 class="amount">0</h3></h3>
                                @endif
                            </div>
                        </div>
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
                                    @foreach ($members as $item)
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
                                                <a class="btn btn-success" href='#'>Approved</a>
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
