@extends('layouts.mainlayout')
@section('content')
    <div class="container h-100">
        <h1 class="text-center">Register</h1>
        <div class="row h-100" style="margin-left: 30%">
            <div class="col-12">
                <form method="post" action="">
                    @csrf
                    <div class=" form-group has-feedback mb-3 w-50 justify-content-center">
                        <label for="username" class="form-label">Username</label>
                        <div>
                        <input type="text"
                               class="form-control @if ($errors->has('username')) is-invalid @elseif (old('username') !== null) is-valid @endif"
                               id="username"
                               name="username" aria-describedby="emailHelp" value="{{old('username')}}">
                        </div>

                        @error('username')
                        <div id="username" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 w-50">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email"
                               class="form-control @if ($errors->has('email')) is-invalid @elseif (old('email') !== null) is-valid @endif"
                               id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                        @error('email')
                        <div id="email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 w-50">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                               class="form-control @if ($errors->has('password')) is-invalid @elseif (old('password') !== null) is-valid @endif"
                               id="password" name="password">
                        @error('password')
                        <div id="password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 w-50">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password')) is-invalid @enderror"
                               id="password" name="password_confirmation">
                        @error('password')
                        <div id="password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>

@endsection
