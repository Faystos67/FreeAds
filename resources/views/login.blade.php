@extends('layouts.mainlayout')
@section('content')

    <div class="container pb-5">
        <h1 class="text-center">Login</h1>
        <div class="row h-100" style="margin-left: 33%">
            <div class="col-12">
                <form method="post" action="">
                    @csrf
                    <div class="mb-3 w-50">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @if ($errors->has('email')) is-invalid @elseif (old('email') !== null) is-valid @endif" id="email" name="email" aria-describedby="emailHelp">
                        @error('email')
                        <div id="email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 w-50">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password')) is-invalid @enderror" id="password" name="password">
                        @error('password')
                        <div id="password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Confirm</button>
                </form>
            </div>
        </div>
    </div>
    <div style="height: 275px"></div>


@endsection
