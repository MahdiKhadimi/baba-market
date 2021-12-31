@include('admin.layouts.partials.header')
@section('title', 'password')


<body class="auth-body-bg">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            @if (session('msg'))
                <div class="alert alert-danger"><strong>{{ session('msg') }}</strong></div>
            @endif
            <div class="card-body">
                <h3 class="text-center mt-0 mb-2">
                    <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo-light.png') }}"
                            height="26" alt="logo-img"></a>
                </h3>


                <form class="form-horizontal mt-3" method="post" action="{{ route('set.password') }}">
                    @csrf
                    @method('post')


                    {{-- password --}}
                    <div class="form-group mb-3">
                        <div class="col-12">
                            <label for="tel">Enter Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="tel"
                                name="password" type="text" placeholder="">
                        </div>
                        @error('password')
                            <div class="p-2  text-danger">
                                <span class="p-3">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <div class="col-12">
                            <label for="tel">Enter Confirm Password</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="tel" name="password_confirmation" type="text" placeholder="">
                        </div>
                        @error('password_confirmation')
                            <div class="p-2  text-danger">
                                <span class="p-3">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- Register Button --}}
                    <div class="form-group text-center mt-4">
                        <div class="col-12">
                            <button class="btn btn-info shadow btn-block btn-lg waves-effect waves-light w-100"
                                type="submit">
                                Confirm
                            </button>
                        </div>
                    </div>



                </form>
            </div>

        </div>
    </div>


    <!-- JAVASCRIPT -->
    @include('admin.layouts.partials.footer_script')

</body>

</html>
