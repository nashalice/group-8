@extends('layouts.login')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Issue Fine') }}</div>

                <div class="card-body">
                    <form action="{{ asset('/issue-fines') }}" method="POST">
                        @csrf
                        <div class="row mb-3 form-group">
                            <label for="reason" class="col-md-4 col-form-label text-md-end">{{ __('Reason') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="reason" name="reason">
                                    <option>Late Deposit</option>
                                    <option>Defaulting Loans</option>
                                    <option>Breach of terms</option>
                                  </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="offender_id" class="col-md-4 col-form-label text-md-end">{{ __('Offender ID') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="offender_id" name="offender_id">
                                    @foreach ($users as $item)
                                        <option>{{ $item->id }},{{ $item->name }}</option>
                                    @endforeach
                                  </select>
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
