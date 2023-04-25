@extends('layouts.app')


@section('content')
<h1 class="h3 mb-2 text-gray-800">Vendors</h1>
<p class="mb-4">Edit vendors</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit vendors</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('vendors.update', $vendor->id) }}">
        @method('PUT')  
        @csrf
            <!-- name -->
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')??$vendor->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Mobile-->
            <div class="form-group row">
                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                <div class="col-md-6">
                    <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile')??$vendor->user->mobile  }}" required autocomplete="mobile" autofocus>

                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Email-->
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')??$vendor->user->email }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  autocomplete="password" autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="form-group row">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}"  autocomplete="password_confirmation" autofocus>

                    @error('password_confirmation')
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
                    <input id="status" type="checkbox" class="custom-control-input" name="status"  value="{{$vendor->status == \App\Enums\ConstantStatus::INACTIVE ? \App\Enums\ConstantStatus::INACTIVE : \App\Enums\ConstantStatus::ACTIVE }}" autofocus {{ $status == \App\Enums\ConstantStatus::ACTIVE ? 'checked' : '' }}>
                    <label id="statuslabel" class="custom-control-label" for="status">{{$vendor->status == \App\Enums\ConstantStatus::INACTIVE ? \App\Enums\ConstantStatus::INACTIVE : \App\Enums\ConstantStatus::ACTIVE }}</label>         
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
                        {{ __('Commit Changes') }}
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
            var newValue = this.checked ? "{{\App\Enums\ConstantStatus::ACTIVE}}" : "{{\App\Enums\ConstantStatus::INACTIVE}}";
            $(this).val(newValue);
            console.log(newValue)
            $("#statuslabel").text(this.checked ? "Active" : "Inactive");
        });
    });
</script>

@endsection