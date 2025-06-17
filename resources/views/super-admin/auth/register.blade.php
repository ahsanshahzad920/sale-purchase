@extends('back.auth.layout.app')
@section('title', 'Register')
@section('content')

    <section class="signup position-relative">
        <div class="right-down-arrow">
            <img src="{{ asset('back/assets/dasheets/img/Ellipse.png') }}" class="img-fluid" alt="" />
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12 position-relative signup-img">
                    <img src="{{ asset('back/assets/dasheets/img/login.svg') }}"
                        class="img-fluid text-center align-items-center py-5" alt="" />
                </div>
                <div class="col-md-6 col-12 px-4">
                    <div class="signup-form text-white">
                        <div class="mb-5">
                            <h2>Sign Up</h2>
                            <p>Create your account to get started</p>
                        </div>
                        <form class="signup-input mt-2" method="POST" action="{{ route('auth.register') }}">
                            @csrf
                            <input type="text" class="form-control subheading" placeholder="First Name"
                                id="exampleFormControlInput1" name="first_name" />
                            @error('first_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" class="form-control subheading" placeholder="Last Name"
                                id="exampleFormControlInput1" name="last_name" />
                            @error('last_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="password-container">
                                <input type="email" class="form-control" placeholder="Email" required name="email" />
                                <img src="{{ asset('back/assets/dasheets/img/mail.svg') }}" class="password-toggle pe-2"
                                    alt="" />
                            </div>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" class="form-control subheading" placeholder="Subdomain Name"
                                id="subdomain" name="subdomain" />
                            @error('subdomain')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="password-container">
                                <input type="password" id="password" class="password-input form-control subheading"
                                    placeholder="Password" name="password"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                                    title="Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character."
                                    required />
                                <img src="{{ asset('back/assets/dasheets/img/lock.svg') }}" class="password-toggle pe-2"
                                    onclick="togglePasswordVisibility('password')" alt="" />
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="password-container">
                                <input type="password" id="password_confirmation"
                                    class="password-input form-control subheading" placeholder="Retype Password"
                                    name="password_confirmation" />
                                <img src="{{ asset('back/assets/dasheets/img/lock.svg') }}" class="password-toggle pe-2"
                                    onclick="togglePasswordVisibility('password_confirmation')" alt="" />
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button class="btn save-btn text-white p-3 w-100 mt-4">
                                Sign Up
                            </button>
                        </form>
                        <div class="exist mt-2">
                            <p class="exist">Already have an account? <a href="{{ route('auth.login') }}"
                                    class="text-decoration-none">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function() {});

        function togglePasswordVisibility(input) {
            let passwordInput = document.getElementById(input);
            if (passwordInput.type == 'password')
                passwordInput.type = 'text'
            else
                passwordInput.type = 'password'
        }
    </script>
@endsection
