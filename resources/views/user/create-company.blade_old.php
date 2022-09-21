@extends("user.base")

@section("content")
    <!-- main body area -->
    <div class="main px-xl-5 px-lg-4 px-md-3">

        <!-- Body: Header -->
        <div class="body-header border-bottom d-flex py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <small class="text-muted">Welcome {{ Auth::user()->name }}.</small>
                        <h1 class="h4 mt-1">Submit New Firm</h1>
                    </div>
                </div> <!-- Row end  -->
            </div>
        </div>

        <!-- Body: Body -->
        <div class="body d-flex py-lg-4 py-3">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <form method="post" id="frm-company" action="{{ route('company.save') }}">
                                <div class="card-body">                                
                                    @csrf
                                    <div class="wizard-main" id="wizard1">
                                        <div class="step-app">
                                            <ul class="step-steps">
                                                <li data-step-target="step1"><span>1</span> Details of Consultancy</li>
                                                <li data-step-target="step2"><span>2</span> Technical Qualification</li>
                                                <li data-step-target="step3"><span>3</span> Attachments </li>
                                            </ul>
                                            <div class="step-content">
                                                <div class="step-tab-panel" data-step="step1">
                                                    <div class="row g-4">
                                                        <div class="col-sm-6">
                                                            <label class="form-label">Name of the Firm <span class="req">*</span></label>
                                                            <input type="text" name="name" class="form-control" placeholder="Name of the Firm" />
                                                            @error('category_id')
                                                            <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="form-label">Type of the Firm <span class="req">*</span></label>
                                                            {!! Form::select('type_id', array('' => 'Select') + $ctypes, '', array('class' => 'form-control select2', '')) !!}
                                                            @error('type_id')
                                                            <small class="text-danger">{{ $errors->first('type_id') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="form-label">Domain Area of Business <span class="req">*</span></label>
                                                            <textarea name="domain_area" class="form-control" placeholder="Domain Area of Business"></textarea>
                                                            @error('domain_area')
                                                            <small class="text-danger">{{ $errors->first('domain_area') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="form-label">Registered Address <span class="req">*</span></label>
                                                            <textarea name="registered_address" rows="5" class="form-control" placeholder="Registered Address"></textarea>
                                                            @error('registered_address')
                                                            <small class="text-danger">{{ $errors->first('registered_address') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="form-label">Contact Address <span class="req">*</span></label>
                                                            <textarea name="contact_address" rows="5" class="form-control" placeholder="Contact Address"></textarea>
                                                            @error('contact_address')
                                                            <small class="text-danger">{{ $errors->first('contact_address') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Name of the Contact Person <span class="req">*</span></label>
                                                            <input type="text" name="contact_person" class="form-control" placeholder="Name of the Contact Person" />
                                                            @error('contact_person')
                                                            <small class="text-danger">{{ $errors->first('contact_person') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Contact number <span class="req">*</span></label>
                                                            <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" />
                                                            @error('contact_number')
                                                            <small class="text-danger">{{ $errors->first('contact_number') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Email Address <span class="req">*</span></label>
                                                            <input type="email" name="email" class="form-control" placeholder="Email Address" />
                                                            @error('email')
                                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Date of Incorporation <span class="req">*</span></label>
                                                            <fieldset class="form-icon-group left-icon position-relative">
                                                                <input type="text" class="form-control dtpicker" name="date_of_incorp" value="{{ old('date_of_incorp') }}" placeholder="dd/mm/yyyy" />
                                                                <div class="form-icon position-absolute">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                                                        <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                                    </svg>
                                                                </div>
                                                                @error('date_of_incorp')
                                                                <small class="text-danger">{{ $errors->first('date_of_incorp') }}</small>
                                                                @enderror
                                                            </fieldset>                                    
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Years of Experience <span class="req">*</span>&nbsp;&nbsp;<a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Number of years of experience in consultancy services"><i class="fa fa-info text-info"></i></a></label>
                                                            <input type="number" name="years_of_experience" class="form-control" placeholder="0" />
                                                            @error('years_of_experience')
                                                            <small class="text-danger">{{ $errors->first('years_of_experience') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Number of Permanent Employees <span class="req">*</span>&nbsp;&nbsp;<a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Number of Permanent Employees"><i class="fa fa-info text-info"></i></a></label>
                                                            <input type="number" name="number_of_employees" class="form-control" placeholder="0" />
                                                            @error('number_of_employees')
                                                            <small class="text-danger">{{ $errors->first('number_of_employees') }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row g-4 mt-3">
                                                        <div class="col-sm-4"></div>
                                                        <div class="col-sm-4">
                                                            <p>Professional / Consultancy Fee Received by the Consultant:</p>
                                                            <table class="table table-sm">
                                                                <thead><tr><th>Year</th><th>Amount (Rs.Lakhs)</th></tr></thead>
                                                                <tbody>
                                                                    <tr><td><input type="number" name="year1" class="form-control" /></td><td><input type="number" name="fee1" class="form-control" /></td></tr>
                                                                    <tr><td><input type="number" name="year2" class="form-control" /></td><td><input type="number" name="fee2" class="form-control" /></td></tr>
                                                                    <tr><td><input type="number" name="year3" class="form-control" /></td><td><input type="number" name="fee3" class="form-control" /></td></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-sm-4"></div>
                                                        <div class="col-sm-12">
                                                            <label class="form-label">Whether the firm has been blacklisted by any Central Govt. / State Govt./PSU/ Govt. Bodies / Autonomous? If yes, details thereof.</label>
                                                            <textarea name="blacklisted_details" class="form-control" placeholder="Details"></textarea>
                                                            @error('blacklisted_details')
                                                            <small class="text-danger">{{ $errors->first('blacklisted_details') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="form-label">Whether any litigations pending before any court of law or tribunal If yes details thereof</label>
                                                            <textarea name="litigations_details" class="form-control" placeholder="Details"></textarea>
                                                            @error('litigations_details')
                                                            <small class="text-danger">{{ $errors->first('litigations_details') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="form-label">Whether included in the list of agencies not eligible for empanelment this year based on the performance evaluation by Suchitwa Mission among the agencies empaneled last year (2020-2021)</label>
                                                            <textarea name="not_eligible_details" class="form-control" placeholder="Details"></textarea>
                                                            @error('not_eligible_details')
                                                            <small class="text-danger">{{ $errors->first('not_eligible_details') }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="form-label">Any other important information about the organization.</label>
                                                            <textarea name="other_details" class="form-control" placeholder="Details"></textarea>
                                                            @error('other_details')
                                                            <small class="text-danger">{{ $errors->first('other_details') }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-tab-panel" data-step="step2">
                                                    <div class="row g-4">
                                                        <div class="col-sm-12 table-responsive">
                                                            <p class="text-end"><a href="javascript:void(0)" class="addTechQual"><i class="fa fa-plus fa-lg text-primary"></i></a></p>
                                                            <table class="table table-sm">
                                                                <thead><tr><th>Name of Project</th><th>Client Name</th><th>Project Cost (Rs.)</th><th>Project Period (Yrs)</th><th>Project Start Date</th><th>Project Status</th><th></th></tr></thead>
                                                                <tbody class="techQual">
                                                                    <tr>
                                                                        <td><input type="text" name="project_name[]" class="form-control" placeholder='Name of Project' /></td>
                                                                        <td><input type="text" name="client_name[]" class="form-control" placeholder='Client Name' /></td>
                                                                        <td><input type="number" name="project_cost[]" class="form-control" placeholder='0.00' /></td>
                                                                        <td><input type="number" name="project_period[]" class="form-control" placeholder='0' /></td>
                                                                        <td><input type="date" name="project_start_date[]" class="form-control" /></td>
                                                                        <td>
                                                                        {!! Form::select('project_status', array('' => 'Select') + $pstypes, '', array('class' => 'form-control select2', '')) !!}
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-tab-panel" data-step="step3">
                                                    <div class="row g-4">
                                                        <div class="col-sm-12">
                                                            <h6 class="text-primary">Scanned Cover letter</h6>
                                                            <input type="file" name="attachment_1" class="form-control"/>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <h6 class="text-primary">Partnership Deed / Sales Tax Registration / Memorandum of Articles of Association</h6>
                                                            <input type="file" name="attachment_2" class="form-control"/>
                                                        </div>
                                                        <h5>Financial Criteria</h5>
                                                        <div class="col-sm-6">
                                                            <h6 class="text-primary">Copy of Certificate of incorporation</h6>
                                                            <input type="file" name="attachment_3" class="form-control"/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h6 class="text-primary">Copy of the audited balance sheet for the last three years</h6>
                                                            <input type="file" name="attachment_4" class="form-control"/>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <h6 class="text-primary">Certification by Chartered Accountant regarding turnover from Design/Execution of LWM Projects</h6>
                                                            <input type="file" name="attachment_5" class="form-control"/>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6 class="text-primary">Net worth certification by a Chartered accountant</h6>
                                                            <input type="file" name="attachment_6" class="form-control"/>
                                                        </div>
                                                        <h5>Technical Criteria</h5>
                                                        <div class="col-sm-6">
                                                            <h6 class="text-primary">Copies of at least three work orders</h6>
                                                            <input type="file" name="attachment_7" class="form-control"/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h6 class="text-primary">Letter of satisfaction from at least two clients</h6>
                                                            <input type="file" name="attachment_8" class="form-control"/>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <h6 class="text-primary">In support of the information, Photo copies of project completion / commissioning certificates, and any other relevant documents. The details should cover Consultant experience in the development of the facility</h6>
                                                            <input type="file" name="attachment_9" class="form-control"/>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <h6 class="text-primary">Key Full time staff Qualifications and Experience &nbsp;&nbsp;(<a href="{{ public_path().'/storage/docs/cv-format.pdf' }}" target="_blank">Download Format</a>)</h6>
                                                            <input type="file" name="attachment_10" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step-footer d-flex">
                                                <button data-step-action="prev" class="btn btn-primary">Prev</button>
                                                <button data-step-action="next" class="btn btn-primary">Next</button>
                                                <button data-step-action="finish" class="btn btn-primary btn-company-save">Submit</button>
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
    </div>
@endsection