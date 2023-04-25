@extends('layouts.app')


@section('content')
<h1 class="h3 mb-2 text-gray-800">States</h1>
<p class="mb-4">Edit States</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit States</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('states.update', $state->id) }}">
        @method('PUT')  
        @csrf
            <!-- name -->
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')??$state->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- Country -->
            <div class="form-group row">
                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                
                <div class="col-md-6">
                    <select class="form-control" id="country" name="country" >
                        <option disabled selected>Select One</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}" {{ $country->id == $state->country->id ? 'selected' : '' }}>
                            {{$country->name}}
                        </option>
                        @endforeach
                    </select>

                    @error('country')
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
                    <input id="status" type="checkbox" class="custom-control-input" name="status"  value="{{$state->status == \App\Enums\ConstantStatus::INACTIVE ? \App\Enums\ConstantStatus::INACTIVE : \App\Enums\ConstantStatus::ACTIVE }}" autofocus {{ $status == \App\Enums\ConstantStatus::ACTIVE ? 'checked' : '' }}>
                    <label id="statuslabel" class="custom-control-label" for="status">{{$state->status == \App\Enums\ConstantStatus::INACTIVE ? \App\Enums\ConstantStatus::INACTIVE : \App\Enums\ConstantStatus::ACTIVE }}</label>         
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