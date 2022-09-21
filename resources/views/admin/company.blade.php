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
                        <h1 class="h4 mt-1">Company Details</h1>
                    </div>
                </div> <!-- Row end  -->
            </div>
        </div>

        <!-- Body: Body -->
        <div class="body d-flex py-lg-4 py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{ route('admin.company.update') }}">
                            @csrf
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <h5 class="text-primary">Details of Consultancy</h5>
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead><tr><th width="50%">Column</th><th>Value</th></thead>
                                        <tbody>
                                            <tr><td>Name of the Firm</td><td>{{ $company->name }}</td></tr>
                                            <tr><td>Type of the Firm</td><td>{{ DB::table('company_types')->where('id', $company->type_id)->pluck('name')->first(); }}</td></tr>
                                            <tr><td>Domain Area of Business</td><td>{{ $company->domain_area }}</td></tr>
                                            <tr><td>Registered Address</td><td>{{ $company->registered_address }}</td></tr>
                                            <tr><td>Contact Address</td><td>{{ $company->contact_address }}</td></tr>
                                            <tr><td>Contact Person</td><td>{{ $company->contact_person }}</td></tr>
                                            <tr><td>Contact Number</td><td>{{ $company->contact_number }}</td></tr>
                                            <tr><td>Contact Email</td><td>{{ $company->email }}</td></tr>
                                            <tr><td>Date of Incorporation</td><td>{{ date('d/M/Y', strtotime($company->date_of_incorp)) }}</td></tr>
                                            <tr><td>Number of years of experience in consultancy services</td><td>{{ $company->years_of_experience }}</td></tr>
                                            <tr><td>Number of permanent employees</td><td>{{ $company->number_of_employees }}</td></tr>
                                            <tr><td>Professional /Consultancy Fee Received by the Consultant in last three consecutive years:</td><td><table class="table table-bordered table-sm table-striped">
                                                <tr><th>Year</th><th>Amount(In Lakhs)</th></tr>
                                                <tr><td>{{ $company->year1 }}</td><td>{{ $company->fee1 }}</td></tr>
                                                <tr><td>{{ $company->year2 }}</td><td>{{ $company->fee2 }}</td></tr>
                                                <tr><td>{{ $company->year3 }}</td><td>{{ $company->fee3 }}</td></tr>
                                            </table></td></tr>
                                            <tr><td>Whether the firm has been blacklisted by any Central Govt. / State Govt./PSU/ Govt. Bodies / Autonomous? If yes, details thereof.</td><td>{{ $company->blacklisted_details }}</td></tr>
                                            <tr><td>Whether any litigations pending before any court of law or tribunal If yes details thereof</td><td>{{ $company->litigations_details }}</td></tr>
                                            <tr><td>Whether included in the list of agencies not eligible for empanelment this year based on the performance evaluation by Suchitwa Mission among the agencies empaneled last year (2020-2021)</td><td>{{ $company->not_eligible_details }}</td></tr>
                                            <tr><td>Any other important information about the organization.</td><td>{{ $company->other_details }}</td></tr>
                                        </tbody>
                                    </table>
                                    <h5 class="text-primary">Project Details</h5>
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead><tr><th>Project Name</th><th>Client Name</th><th>Project Cost(Rs.)</th><th>Project Period(Months)</th><th>Project Start Date</th><th>Project Status</th></thead>
                                        <tbody>
                                            @forelse($qualifications as $key => $qualification)
                                                <tr>
                                                    <td>{{ $qualification->project_name }}</td>
                                                    <td>{{ $qualification->client_name }}</td>
                                                    <td>{{ $qualification->project_cost }}</td>
                                                    <td>{{ $qualification->	project_period }}</td>
                                                    <td>{{ date('d/M/Y', strtotime($qualification->project_start_date)) }}</td>
                                                    <td>{{ DB::table('project_status')->where('id', $qualification->project_status)->pluck('name')->first(); }}</td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="6" class="text-center">No Records Found</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <h5 class="text-primary">Attachments</h5>
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead><tr><th width="50%">Column</th><th width="35%">Value</th><th>Status</th></thead>
                                        <tbody>
                                            <tr><td>Scanned Cover letter</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_1 }}">{{ ($company->attachment_1) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_1_status">
                                                        <option value="0" {{ ($company->doc_1_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_1_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_1_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>Partnership Deed / Sales Tax Registration / Memorandum of Articles of Association</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_2 }}">{{ ($company->attachment_2) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_2_status">
                                                        <option value="0" {{ ($company->doc_2_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc__status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_2_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>Copy of Certificate of incorporation</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_3 }}">{{ ($company->attachment_3) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_3_status">
                                                        <option value="0" {{ ($company->doc_3_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_3_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_3_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>Copy of the audited balance sheet for the last three years</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_4 }}">{{ ($company->attachment_4) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_4_status">
                                                        <option value="0" {{ ($company->doc_4_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_4_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_4_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>Certification by Chartered Accountant regarding turnover from Design/Execution of LWM Projects</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_5 }}">{{ ($company->attachment_5) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_5_status">
                                                        <option value="0" {{ ($company->doc_5_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_5_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_5_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>Net worth certification by a Chartered accountant</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_6 }}">{{ ($company->attachment_6) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_6_status">
                                                        <option value="0" {{ ($company->doc_6_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_6_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_6_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>Copies of at least three work orders</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_7 }}">{{ ($company->attachment_7) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_7_status">
                                                        <option value="0" {{ ($company->doc_7_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_7_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_7_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>Letter of satisfaction from at least two clients</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_8 }}">{{ ($company->attachment_8) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_8_status">
                                                        <option value="0" {{ ($company->doc_8_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_8_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_8_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>In support of the information, Photo copies of project completion / commissioning certificates, and any other relevant documents. The details should cover Consultant experience in the development of the facility</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_9 }}">{{ ($company->attachment_9) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_9_status">
                                                        <option value="0" {{ ($company->doc_9_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_9_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_9_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr><td>Key Full time staff Qualifications and Experience</td><td><a target="_blank" href="{{ public_path().'/storage/'.$company->attachment_10 }}">{{ ($company->attachment_10) ? 'View Document' : '' }}</a></td>
                                                <td>
                                                    <select class="form-control" name="doc_10_status">
                                                        <option value="0" {{ ($company->doc_10_status == 0) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ ($company->doc_10_status == 1) ? 'selected' : '' }}>Approved</option>
                                                        <option value="2" {{ ($company->doc_10_status == 2) ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="company_id" value="{{ $company->id }}" />
                                    <input type="hidden" name="user_email" value="{{ $company->email }}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Comments <span class="req">*</span></label>
                                            <textarea class="form-control" name="comments" rows="5">{{ old('comments') }}</textarea>
                                            @error('comments')
                                            <small class="text-danger">{{ $errors->first('comments') }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Status <span class="req">*</span></label>
                                            {!! Form::select('status_id', $status, $company->status, array('class' => 'form-control select2', '')) !!}
                                            @error('status')
                                            <small class="text-danger">{{ $errors->first('status') }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" class="btn btn-submit btn-block btn-primary lift text-uppercase">UPDATE</button>
                                        </div>
                                    </div>                                
                                </div>                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection