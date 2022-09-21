@extends("user.base")

@section("content")
    <!-- main body area -->
    <div class="main px-xl-5 px-lg-4 px-md-3">

        <!-- Body: Header -->
        <div class="body-header border-bottom d-flex py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <small class="text-muted">Welcome Guest.</small>
                        <h1 class="h4 mt-1">Dashboard</h1>
                    </div>
                    <div class="col-auto">
                        @if(Auth::User()->company_count > $rcount)
                            <a href="{{ route('user.company.create') }}" class="btn btn-primary lift">SUBMIT NEW FIRM</a>
                        @endif
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
                                <table id="dataTbl" class="table table-striped table-hover align-middle table-sm" style="width:100%">
                                <thead><tr><th>SL No.</th><th>Firm Name</th><th>Date of Incorp.</th><th>Contact Person</th><th>Contact Number</th><th>Contact Email</th><th></th><th>Score</th><th>Edit</th></tr></thead><tbody>
                                    @php $i = 0; @endphp
                                    @foreach($companies as $key => $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->idate }}</td>
                                        <td>{{ $value->contact_person }}</td>
                                        <td>{{ $value->contact_number }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->status }}</td>
                                        <td>{{ $value->score }}</td>
                                        <td class="text-center">@if($value->stat == 3)<a href="{{ route('company.edit', $value->id) }}"><i class="fa fa-pencil text-warning"></i>@endif</a></td>
                                    </tr>
                                    @endforeach
                                </tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection