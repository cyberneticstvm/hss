@extends("admin.base")

@section("content")
    <!-- main body area -->
    <div class="main px-xl-5 px-lg-4 px-md-3">

        <!-- Body: Header -->
        <div class="body-header border-bottom d-flex py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <small class="text-muted">Welcome {{ Auth::User()->name }}.</small>
                        <h1 class="h4 mt-1">Dashboard</h1>
                    </div>
                </div> <!-- Row end  -->
            </div>
        </div>

        <!-- Body: Body -->
        <div class="body d-flex py-lg-4 py-3">
            <div class="container">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="row g-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" id="frm-company" action="{{ route('settings.com.update') }}">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-sm-3">
                                            <label class="form-label">Cut Off Mark <span class="req">*</span></label>
                                            <input type="number" name="cut_off_mark" class="form-control" min="1" max="100" value="{{ $settings->cut_off_mark }}" />
                                            @error('cut_off_mark')
                                            <small class="text-danger">{{ $errors->first('cut_off_mark') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-4 mt-1">
                                        <div class="col-sm-12 text-end">
                                            <button type="submit" class="btn btn-submit btn-primary rounded-0">UPDATE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection