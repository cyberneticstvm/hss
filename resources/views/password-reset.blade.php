<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Suchitwa Mission">
    <meta name="keyword" content="Suchitwa Mission">
    <title>Reset Password</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ public_path().'/back-end/css/al.style.min.css' }}">
    <!-- project layout css file -->
    <link rel="stylesheet" href="{{ public_path().'/back-end/css/layout.f.min.css' }}">
    <link rel="stylesheet" href="{{ public_path().'/back-end/css/style.css' }}">
</head>

<body>

<div id="layout-f" class="theme-cyan">

    <!-- main body area -->
    <div class="main auth-div p-2 py-3 p-xl-5">
        
        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-fluid">

                <div class="row g-0">

                    <div class="col-lg-12 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-4 p-md-5 card border-0" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-0 p-md-4" method="post" action="{{ route('resetpassword') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}" />
                                <div class="col-12 text-center mb-5">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Password<span class="req">*</span></label>
                                        <input type="password" class="form-control" name="password" placeholder="*****">
                                    </div>
                                    @error('password')
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Confirm Password<span class="req">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="*****">
                                    </div>
                                    @error('confirm_password')
                                    <small class="text-danger">{{ $errors->first('confirm_password') }}</small>
                                    @enderror
                                </div>                                
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-submit btn-block btn-primary lift text-uppercase">RESET</button>
                                </div>
                                
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div> <!-- End Row -->
                
            </div>
        </div>

    </div>

</div>

<!-- Jquery Core Js -->
<script src="{{ public_path().'/back-end/bundles/libscripts.bundle.js' }}"></script>

<!-- Jquery Page Js -->
<script src="{{ public_path().'/back-end/js/template.js' }}"></script>
<script src="{{ public_path().'/back-end/js/script.js' }}"></script>

</body>
</html>