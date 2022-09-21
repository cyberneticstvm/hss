<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Suchitwa Mission">
    <meta name="keyword" content="Suchitwa Mission">
    <title>User Signup</title>
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
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @else
                                <!-- Form -->
                                <form class="row g-1 p-0 p-md-4" method="post" action="{{ route('signup') }}">
                                    @csrf
                                    <div class="col-12 text-center mb-5">
                                        <h1>Create your account</h1>                                    
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Full Name<span class="req">*</span></label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                                        </div>
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Mobile Number<span class="req">*</span></label>
                                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile Number" maxlength="10">
                                        </div>
                                        @error('mobile')
                                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Email Address<span class="req">*</span></label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
                                        </div>
                                        @error('email')
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label class="form-label">Company Type<span class="req">*</span></label>
                                            <select class="form-control" name="company_type" onChange="if($(this).val() == 'SC'){$('#company_count').val(1);$('#company_count').prop('disabled', true);}else{$('#company_count').prop('disabled', false);}">
                                                <option value="">Select</option>
                                                <option value="JV" {{ (old('company_type') == 'JV') ? 'selected' : '' }}>Joint Venture</option>
                                                <option value="SC" {{ (old('company_type') == 'SF') ? 'selected' : '' }}>Firm</option>
                                            </select>
                                        </div>
                                        @error('company_type')
                                        <small class="text-danger">{{ $errors->first('company_type') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label class="form-label">Number of Companies</label>
                                            <select class="form-control" name="company_count" id="company_count">
                                                <option value="1">Select</option>
                                                <option value="1" {{ (old('company_count') == 1) ? 'selected' : '' }}>1</option>
                                                <option value="2" {{ (old('company_count') == 2) ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ (old('company_count') == 3) ? 'selected' : '' }}>3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12"><div class="mb-2"><small class="text-primary">Select number of companies if the company type is JV.</small></div></div>
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
                                        <button type="submit" class="btn btn-submit btn-block btn-primary lift text-uppercase">SIGN UP</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <span class="text-muted">Already have an account? <a href="{{ route('user.login') }}">Sign in here</a></span>
                                    </div>
                                </form>
                                <!-- End Form -->
                            @endif
                            
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