@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Members') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Time</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Collateral</th>
                            <th scope="col">Guarantor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                            <tr>
                              {{-- <th scope="row">{{ $item->id }}</th> --}}
                              <td>{{ $item->created_at }}</td>
                              <td>{{ $item->amount }}</td>
                              <td>{{ $item->reason }}</td>
                              <td>{{ $item->collateral }}</td>
                              <td>{{ $item->garanter_id }}</td>
                              <td>{{ $item->application_status }}</td>
                              <td>

                                @if($item->application_status == 0)
                                    <a href="loan_approval_m/{{ $item->id }}" class="btn btn-primary btn-sm btn-outline-light" style="background-color: green;">Approve</a href="">
                                    <a href="loan_reject_m/{{ $item->id }}" class="btn btn-primary btn-sm btn-outline-light" style="background-color: red;">Reject</a href="">
                                @elseif ($item->application_status == 2 | $item->application_status == 1)
                                <button class="btn btn-primary btn-sm btn-outline-light" type="button" style="background-color: rgb(0, 255, 8);">Approved</button>

                                @elseif ($item->application_status == 3)
                                    <button class="btn btn-primary btn-sm btn-outline-light" type="button" style="background-color: rgb(0, 255, 8);">Approved</button>

                                @elseif ($item->application_status == 4)
                                    <button class="btn btn-primary btn-sm btn-outline-light" type="button" style="background-color: rgb(0, 255, 8);">Approved</button>
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
