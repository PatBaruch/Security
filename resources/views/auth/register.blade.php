@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="registerForm" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" onfocus="this.setAttribute('autocomplete', 'new-password');">
                                <small class="form-text text-muted">We recommend using a password manager to generate and store a secure password.</small>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="passwordHelp" class="form-text text-danger"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" onfocus="this.setAttribute('autocomplete', 'new-password');">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var passwordInput = document.getElementById('password');
        var passwordHelp = document.getElementById('passwordHelp');
        var passwordValidation = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).{12,}$/;

        passwordInput.addEventListener('input', function () {
            var password = passwordInput.value;
            if (!passwordValidation.test(password)) {
                passwordHelp.textContent = 'The password must be at least 12 characters long and include at least one lowercase letter, one uppercase letter, one number, and one special character.';
                passwordHelp.style.color = 'red';
            } else {
                passwordHelp.textContent = 'Password meets all requirements.';
                passwordHelp.style.color = 'green';
            }
        });

        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var password = passwordInput.value;
            if (!passwordValidation.test(password)) {
                passwordHelp.textContent = 'The password must be at least 12 characters long and include at least one lowercase letter, one uppercase letter, one number, and one special character.';
                passwordHelp.style.color = 'red';
                event.preventDefault();
            } else {
                passwordHelp.textContent = '';
            }
        });
    });
</script>
@endsection
