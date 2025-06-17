@extends('back.auth.layout.app')
@section('title', 'Login')
@section('content')


    <div >
        <section class="signup position-relative">
          <div class="right-down-arrow">
            <img src="{{asset('back/assets/dasheets/img/Ellipse.png')}}" class="img-fluid" alt="" />
          </div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6 col-12 position-relative signup-img">
                <img
                  src="{{asset('back/assets/dasheets/img/login.svg')}}"
                  class="img-fluid text-center align-items-center py-5"
                  alt=""
                />
              </div>
              <div class="col-md-6 col-12 py-3 px-4">
                <div class="signup-form text-white my-5">
                  <div class="mb-5">
                    <h2>Sign in</h2>
                    <p>Please enter your credentials</p>
                  </div>
                  <form class="signup-input" method="POST" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="password-container">
                      <input
                        type="email"
                        class="form-control @error('email') border border-danger @enderror"
                        placeholder="Email"
                        name="email"
                        required
                      />

                      <img
                        src="{{asset('back/assets/dasheets/img/mail.svg')}}"
                        class="password-toggle pe-2"
                        alt=""
                      />

                    </div>
                    @error('email')
                          <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                    <div class="password-container">
                      <input
                        type="password"
                        id="password"
                        class="password-input form-control subheading @error('password') border border-danger @enderror"
                        placeholder="Password"
                        name="password"
                      />

                      <img
                        src="{{asset('back/assets/dasheets/img/lock.svg')}}"
                        class="password-toggle pe-2"
                        onclick="togglePasswordVisibility()"
                        alt=""
                      />
                    </div>
                    @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <div class="row text-white keep-me-logged">
                      <div class="col-md-6 d-flex mt-3">
                        <input type="checkbox" class="checkboxing" name="" id="" />
                        <span>Keep me signed in</span>
                      </div>

                      <div class="col-md-6 mt-3 forget-password text-end">
                        <a href="" class="text-decoration-none text-white"> Forgot Password? </a>
                      </div>
                    </div>
                    <button class="btn save-btn text-white p-3 w-100 mt-4">
                      Sign In
                    </button>
                  </form>
                    <div class="exist mt-2">
                        <p class="exist">Not registered yet? <a href="{{route('auth.register')}}" class="text-decoration-none">Create
                                Account</a></p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Template Javascript -->
        <script src="dasheets/js/main.js"></script>
        <script>
            function togglePasswordVisibility(input){
                let passwordInput = document.getElementById('password');
                if(passwordInput.type == 'password')
                    passwordInput.type = 'text'
                else
                    passwordInput.type = 'password'
            }
        </script>
    </div>


@endsection


