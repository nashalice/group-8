@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(Auth::user()->withdraw_status == 1)
                <div class="card">
                    <div class="card-header">{{ __('Withdraw Savings') }}</div>

                    <div class="card-body">
                        <form action="{{ asset('save_withdraw') }}" method="get">
                            @csrf
                            <div class="row mb-3">
                                <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Continue') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="card">
                    <div class="card-header text-center">{{ __('Message') }}</div>
                    <div class="card-body text-center">
                        <h3>You are not eligible to make a withdraw</h3>
                    </div>
                </div>
                @endif
            </div>

        </div>
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header">Withdraws</div>
                        <div class="card-body">
                            <div class="col">
                                <table class="table p-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($withdraws != NULL)

                                            @foreach ($withdraws as $item)
                                                <tr>
                                                    <th scope="row">{{ $item->id }}</th>
                                                    <td>{{ $item->amount }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                            @endforeach

                                        @endif
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
