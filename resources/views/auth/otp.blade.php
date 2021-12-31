@include('admin.layouts.partials.header')
@section('title', 'opt')

<body class="auth-body-bg">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">

            <div class="card-body shadow">
                <br>


                @if (session('msg'))
                    <h4 class=" text-center text-danger">{{ session('msg') }}</h4>
                @endif
                <h5 class="ssstext-center mt-0 text-color text-center">
                    <b>
                        Please enter the one time password <br> to verify
                        your account
                    </b>
                </h5>

                <form class="form-horizontal mt-3" method="post" action="{{ route('otp.check') }}">
                    @csrf
                    @method('post')
                    {{-- Mobile --}}



                    <div class="container height-100 d-flex justify-content-center align-items-center">
                        <div class="position-relative">
                            <div class="card p-2 text-center">

                                <div class="text-color">

                                    @if (session('otp'))
                                        <strong>{{ session('otp') }}</strong>
                                    @endif

                                </div>
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                    <input class="m-2 text-center form-control rounded" type="number" name="first"
                                        maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="number" name="second"
                                        maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="number" name="third"
                                        maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="number" name="fourth"
                                        maxlength="1" />

                                </div>
                                <br>


                            </div>
                            <div class="card-2">
                                <div class="content d-flex justify-content-center align-items-center"><span>Didn't get
                                        the code</span>
                                    <a href="#" class="text-decoration-none ms-3">Resend(1/3)</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Register Button --}}
                    <div class="form-group text-center mt-4">
                        <div class="col-12">
                            <button class="btn shadow btn-warning btn-block btn-lg waves-effect waves-light w-100"
                                type="submit">
                                Confirm
                            </button>
                        </div>
                    </div>

                    <div class="form-group mt-3 mb-0">
                        <div class="col-sm-12 text-center">
                            <a href="auth-login.html" class="text-color">Already have account?</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>


    {{--   JAVASCRIPT   --}}
    @include('admin\layouts\partials\footer_script')

</body>

</html>
