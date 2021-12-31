@include('admin.layouts.partials.header')
@section('title', 'login')

<body class="auth-body-bg">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">

            <div class="card-body">
                <h3 class="text-center mt-0 mb-3">
                    <a href="" class="logo"><img src="{{ asset('assets/images/logo-light.png') }}" height="24"
                            alt="logo-img"></a>
                </h3>
                <h5 class="text-center mt-0 text-color"><b>Sign In</b></h5>

                <form class="form-horizontal mt-3 mx-3" method="post" action="{{ route('login') }}">
                    @csrf
                    @method('post')
                    <div class="form-group mb-3">
                        <div class="col-12">
                            <input name="username" class="form-control @error('username') is-invalid @enderror"
                                type="text" placeholder="mobile">
                        </div>
                        @error('username')
                            <div class="p-2  text-danger">
                                <span class="p-3">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <div class="col-12">
                            <input name="password" class="form-control @error('password') is-invalid @enderror"
                                type="password" placeholder="Password">
                        </div>
                        @error('password')
                            <div class="p-2  text-danger">
                                <span class="p-3">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="">
                                <label for="checkbox-signup" class="text-color">
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-3">
                        <div class="col-12">
                            <button class="btn btn-info btn-block btn-lg waves-effect waves-light w-100" type="submit">
                                Log In
                            </button>
                        </div>
                    </div>
                    @if (session('fail'))
                        <br>
                        <div class="alert alert-danger">{{ session('fail') }}</div>
                    @endif

                    <div class="form-group row mt-4 mb-0">
                        <div class="col-sm-7">
                            <a href="auth-recoverpw.html" class="text-color">
                                <i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="auth-register.html" class="text-color">Create an account</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!-- JAVASCRIPT -->
    @include('admin\layouts\partials\footer_script')

</body>

</html>
