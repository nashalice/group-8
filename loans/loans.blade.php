@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow mb-5 bg-white rounded">
                {{-- <div class="card-header">{{ __('Loan Balance') }}</div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <p>Pending Balance: </p>
                            <h1 class="amount" style="color: green">{{ $pending_balance }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-5 bg-white rounded">
                {{-- <div class="card-header">{{ __('Loan Balance') }}</div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <p>Cleared Balance: </p>
                            <h1 class="amount" style="color: green">{{ $cleared_balance }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-5 bg-white rounded">
                {{-- <div class="card-header">{{ __('Loan Balance') }}</div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <p>Total Balance: </p>
                            <h1 class="amount" style="color: green">{{ $total_balance }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow mb-5 bg-white rounded">
                {{-- <div class="card-header">{{ __('Loan Balance') }}</div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <p>Recommended Maximum amount: </p>
                            <h1 class="amount" style="color: green">{{ $eligible }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-5 bg-white rounded">
                {{-- <div class="card-header">{{ __('Loan Balance') }}</div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <p>Emergency loan amount: </p>
                            <h1 class="amount" style="color: green">{{ $elig_amount }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row justify-content-center">


        <div class="col-md-6">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header">{{ __('Loan Application') }}</div>
                <div class="card-body">
                    <form action="{{ asset('/loan-form') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label for="Amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" required autofocus>
                                <span style="color: red">
                                    @error('amount'){{
                                        $message
                                    }}
                                    @enderror
                                </span>
                            </div>
                        </div>


                        <div class="row mb-3 form-group">
                            <label for="reason" class="col-md-4 col-form-label text-md-end">{{ __('Reason') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="reason" id="reasons">
                                    <option>Emergency</option>
                                    <option>Personal</option>
                                </select>
                                <span style="color: red">
                                    @error('reason'){{
                                        $message
                                    }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="guarantor" class="col-md-4 col-form-label text-md-end">{{ __('Guarantor') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="guarantor" name="guarantor">
                                    @foreach ($users as $item)
                                        <option>{{ $item->id }},{{ $item->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="collateral" class="col-md-4 col-form-label text-md-end">{{ __('Collateral') }}</label>
                            <div class="col-md-6">
                                <input id="collateral" type="text" class="form-control" name="collateral" required>
                                <span style="color: red">
                                    @error('collateral'){{
                                        $message
                                    }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Apply') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
