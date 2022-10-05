@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Loan history') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Amount requested</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Collateral</th>
                            <th scope="col">Guarantor</th>
                            <th scope="col">Amount to be paid</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Interval of payment</th>
                            <th scope="col">Balance remaining</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                            <tr>
                              {{-- <th scope="row">{{ $item->id }}</th> --}}
                              <td>{{ $item->amount }}</td>
                              <td>{{ $item->reason }}</td>
                              <td>{{ $item->collateral }}</td>
                              <td>{{ $item->garanter_id }}</td>
                              <td>{{ $item->expected_amount }}</td>
                              <td>{{ $item->start_date }}</td>
                              <td>{{ $item->end_date }}</td>
                              <td>{{ $item->interval_pay }}</td>
                              <td>{{ $item->balance_remaining }}</td>

                              <td>
                                @if($item->application_status <= 1)
                                    <button class="btn btn-primary btn-sm btn-outline-light" type="button" style="background-color: rgb(255, 140, 0);">Waiting</button>
                                @elseif ($item->application_status == 2)
                                <a href="loan_collect_m/{{ $item->id }}" class="btn btn-primary btn-sm btn-outline-light" style="background-color: rgb(0, 255, 8);">Collect</a>

                                @elseif ($item->application_status == 3)
                                    <a href="loan_pay/{{ $item->id }}" class="btn btn-primary btn-sm btn-outline-light" type="button" style="background-color:  rgb(0, 90, 128);">Pay</a>

                                @elseif ($item->application_status == 4)
                                    <button class="btn btn-primary btn-sm btn-outline-light" type="button" style="background-color: rgba(58, 113, 39, 0.248);">Paid</button>
                                @elseif ($item->application_status == 5)
                                    <button class="btn btn-primary btn-sm btn-outline-light" type="button" style="background-color: red;">Rejected</button>
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
@endsection
