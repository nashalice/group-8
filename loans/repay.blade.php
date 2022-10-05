@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header">{{ __('Repay') }}</div>

                <div class="card-body">
                    <form>
                        @csrf

                        <div class="row mb-3">
                            <label for="Amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="source" class="col-md-4 col-form-label text-md-end">{{ __('Source') }}</label>

                            <div class="col-md-6">
                                <input id="source" type="phone" class="form-control" name="source" required>
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
        </div>

    </div>
</div>
@endsection