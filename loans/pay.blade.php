@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header">{{ __('Loan Repay') }}</div>

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

                    <form action="{{ asset('/loan_pay_m') }}" method="GET">
                        @csrf
                        @foreach ($loans as $loan )
                        <div class="row mb-3">
                            <label for="lid" class="col-md-4 col-form-label text-md-end">{{ __('Loan Id') }}</label>

                            <div class="col-md-6">
                                <input id="lid" class="form-control" name="lid" value="{{ $loan->id }}">
                                <span style="color: red">
                                    @error('lid'){{
                                        $message
                                    }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $loan->balance_remaining }}" autofocus>
                                <span style="color: red">
                                    @error('amount'){{
                                        $message
                                    }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pay') }}
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
