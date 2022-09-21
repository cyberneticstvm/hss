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
                                <h4 class="mb-3">{{ $title }} List</h4>
                                <table id="dataTbl" class="table table-striped table-hover align-middle table-sm" style="width:100%">
                                <thead><tr><th>SL No.</th><th>ID</th><th>Firm Name</th><th>Date of Incorp.</th><th>Contact Person</th><th>Contact Number</th><th>Contact Email</th><th>Status</th><th>View</th><th>PDF</th><th>Evaluate</th><th>Score</th></tr></thead><tbody>
                                    @php $i = 0; @endphp
                                    @foreach($companies as $key => $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->idate }}</td>
                                        <td>{{ $value->contact_person }}</td>
                                        <td>{{ $value->contact_number }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->status }}</td>
                                        <td class="text-center"><a href="{{ route('admin.company', $value->id) }}"><i class="fa fa-eye text-info"></i></a></td>
                                        <td class="text-center"><a href="/company-profile/{{ $value->id }}/" target="_blank"><i class="fa fa-file-pdf-o text-danger"></i></a></td>
                                        <td class="text-center"><a href="{{ route('admin.evaluate', $value->id) }}"><i class="fa fa-pencil text-warning"></i></a></td>
                                        <td>{{ $value->score }}</td>
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