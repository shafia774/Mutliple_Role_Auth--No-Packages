@extends('layouts.app')


@section('content')


<h1 class="h3 mb-2 text-gray-800">Countries</h1>
<p class="mb-4">Add countries</p>

<div class="card shadow mb-4 rounded">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Countries</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('countries.store') }}">
            @csrf
            <!-- name -->
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Country Code -->
            <div class="form-group row">
                <label for="countrycode" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>

                <div class="col-md-6">
                    <input id="countrycode" type="text" class="form-control @error('countrycode') is-invalid @enderror" name="countrycode" value="{{ old('countrycode') }}" required autocomplete="countrycode" autofocus>

                    @error('countrycode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Status -->
            <div class="form-group row">
                <label  class="col-md-4 col-form-label text-md-right">Status</label>
                <div class="custom-control custom-switch  col-md-6 m-2">
                    <input  type="hidden" class="custom-control-input" name="status" value="{{\App\Enums\ConstantStatus::INACTIVE}}" autofocus >
                    <input id="status" type="checkbox" class="custom-control-input" name="status" value="{{\App\Enums\ConstantStatus::INACTIVE}}" autofocus >
                    <label id="statuslabel" class="custom-control-label" for="status">Inactive</label>         
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#status').click(function() {
            var value = $(this).val();
            // var newValue = this.checked ? "{{\App\Enums\ConstantStatus::ACTIVE}}" : "{{\App\Enums\ConstantStatus::INACTIVE}}";
            // $(this).val(newValue);
            console.log(value)
            $("#statuslabel").text(this.checked ? "Active" : "Inactive");
        });
    });
</script>

@endsection