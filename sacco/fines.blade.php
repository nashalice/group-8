@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row p-3">
        <div class="col-md-2">
            <a href="{{ asset('issue-fine') }}">
                <button class="btn btn-primary" type="button">Add</button>
            </a>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Fines') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Offender</th>
                            <th scope="col">Initiated on</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                            <tr>
                              <th scope="row">{{ $item->id }}</th>
                              <td>{{ $item->reason }}</td>
                              <td>{{ $item->amount }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->created_at }}</td>
                              <td>
                                @if($item->status == 1)
                                    <button class="btn btn-success btn-sm">Paid</button>
                                @else
                                    <button class="btn btn-warning btn-sm">Pending</button>
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
