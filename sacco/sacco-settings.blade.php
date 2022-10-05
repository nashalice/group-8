@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Manage Sacco Settings') }}</div>

                <div class="card-body">
                    <form action="{{ asset('/sacco-details') }}" method="POST">
                        @csrf
                        @foreach ($data as $datas)
                            <div class="row mb-3 form-group">
                                <label for="save_int" class="col-md-4 col-form-label text-md-end">{{ __('Savings interval(Preiod before save fine is issued)') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="save_int" name="save_int">
                                        <option>Never</option>
                                        <option>1 Day</option>
                                        <option>3 Days</option>
                                        <option>5 Days</option>
                                        <option>1 Week</option>
                                        <option>2 Weeks</option>
                                        <option>1 Month</option>
                                        <option>2 Months</option>
                                    </select>
                                </div>
                            </div>

                           {{-- ? @if('Kuongeza Pesa'== $category = DB::table('saccos')->where('id','=',Auth::user()->sacco_id)->value('category')) --}}
                            <div class="row mb-3">
                                <label for="save_fine" class="col-md-4 col-form-label text-md-end">{{ __('Late Save Fine Charge') }}</label>

                                <div class="col-md-6">
                                    <input placeholder="Amount in UGX" value="{{ $datas->save_fine }}" id="save_fine" type="number" class="form-control" name="save_fine" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="save_min" class="col-md-4 col-form-label text-md-end">{{ __('Minimum Save Amount(UGX)') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Must be greater than 500/=" id="save_min" type="number" value="{{ $datas->save_min }}" name="save_min">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="save_period" class="col-md-4 col-form-label text-md-end">{{ __('Date of sacco end') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Must be greater than 500/=" id="save_period" type="date" value="{{ $datas->save_period }}" name="save_period">
                                </div>
                            </div>
    {{--
                            @if('Kuongeza Pesa'== $category = DB::table('saccos')->where('id','=',Auth::user()->sacco_id)->value('category')) --}}
                            <div class="row mb-3">
                                <label for="loan_int_rate" class="col-md-4 col-form-label text-md-end">{{ __('Loan Interest Rate(%)') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="loan_int_rate" type="number" value="{{ $datas->loan_int_rate }}" name="loan_int_rate">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="loan_fine_rate" class="col-md-4 col-form-label text-md-end">{{ __('Late Loan Fine Rate(%)') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="loan_fine_rate" type="number" value="{{ $datas->loan_fine_rate }}" name="loan_fine_rate">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="max_free_loan_amount" class="col-md-4 col-form-label text-md-end">{{ __('Fixed Emergence Loan Amount') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="max_free_loan_amount" type="number" value="{{ $datas->max_free_loan_amount }}" name="max_free_loan_amount">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="loan_int_returns" class="col-md-4 col-form-label text-md-end">{{ __('Return on loans (on calculating withdrawable amount percentage is returned to members who borrowed)') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="loan_int_returns" type="number" value="{{ $datas->loan_int_returns }}" name="loan_int_returns">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="percentage_of_max_loan" class="col-md-4 col-form-label text-md-end">{{ __('Return on loans (on calculating withdrawable amount percentage is returned to members who borrowed)') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="percentage_of_max_loan" type="number" value="{{ $datas->percentage_of_max_loan }}" name="percentage_of_max_loan">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="minimum_sacco_balance" class="col-md-4 col-form-label text-md-end">{{ __('Minimum sacco balance') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="minimum_sacco_balance" type="number" value="{{ $datas->minimum_sacco_balance }}" name="minimum_sacco_balance">
                                </div>
                            </div>
                            {{-- @endif --}}
                            {{-- @endif --}}

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update settings') }}
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
