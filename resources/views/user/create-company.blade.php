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
                        <h1 class="h4 mt-1">Submit New Agency</h1>
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
                            <form method="post" id="frm-company" action="{{ route('company.save') }}" enctype="multipart/form-data">
                                <div class="card-body">                                
                                    @csrf
                                    <div id="wizard1" class="wizard-main">
                                        <h3>Details of Agency</h3>
                                        <section id="step1">
                                            <div class="row g-4">
                                                <div class="col-sm-6">
                                                    <label class="form-label">Name of the Agency <span class="req">*</span></label>
                                                    <input type="text" name="name" class="form-control" placeholder="Name of the Agency" data-parsley-required="true" />
                                                    @error('category_id')
                                                    <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label">Type of the Agency <span class="req">*</span></label>
                                                    {!! Form::select('type_id', array('' => 'Select') + $ctypes, '', array('class' => 'form-control select2', 'required' => 'required', '')) !!}
                                                    @error('type_id')
                                                    <small class="text-danger">{{ $errors->first('type_id') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-12">
                                                    <label class="form-label">Domain Area of Business <span class="req">*</span></label>
                                                    <textarea name="domain_area" class="form-control" placeholder="Domain Area of Business" data-parsley-required="true"></textarea>
                                                    @error('domain_area')
                                                    <small class="text-danger">{{ $errors->first('domain_area') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label">Registered Address <span class="req">*</span></label>
                                                    <textarea name="registered_address" rows="5" class="form-control" placeholder="Registered Address" data-parsley-required="true"></textarea>
                                                    @error('registered_address')
                                                    <small class="text-danger">{{ $errors->first('registered_address') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label">Contact Address <span class="req">*</span></label>
                                                    <textarea name="contact_address" rows="5" class="form-control" placeholder="Contact Address" data-parsley-required="true"></textarea>
                                                    @error('contact_address')
                                                    <small class="text-danger">{{ $errors->first('contact_address') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">Name of the Contact Person <span class="req">*</span></label>
                                                    <input type="text" name="contact_person" class="form-control" placeholder="Name of the Contact Person" data-parsley-required="true" />
                                                    @error('contact_person')
                                                    <small class="text-danger">{{ $errors->first('contact_person') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">Contact number <span class="req">*</span></label>
                                                    <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" data-parsley-required="true" />
                                                    @error('contact_number')
                                                    <small class="text-danger">{{ $errors->first('contact_number') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">Email Address <span class="req">*</span></label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email Address" data-parsley-required="true" />
                                                    @error('email')
                                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">Date of Incorporation <span class="req">*</span></label>
                                                    <input type="date" class="form-control" name="date_of_incorp" value="{{ old('date_of_incorp') }}" data-parsley-required="true" />
                                                    @error('date_of_incorp')
                                                    <small class="text-danger">{{ $errors->first('date_of_incorp') }}</small>
                                                    @enderror                                    
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">Years of Experience <span class="req">*</span>&nbsp;&nbsp;<a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Number of years of experience in consultancy services"><i class="fa fa-info text-info"></i></a></label>
                                                    <input type="number" name="years_of_experience" class="form-control" placeholder="0" data-parsley-required="true" />
                                                    @error('years_of_experience')
                                                    <small class="text-danger">{{ $errors->first('years_of_experience') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label">Number of Professionally Qualified Employees in WM Projects<span class="req">*</span>&nbsp;&nbsp;<a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Number of Professionally Qualified Employees in WM Projects"><i class="fa fa-info text-info"></i></a></label>
                                                    <input type="number" name="number_of_employees" class="form-control" placeholder="0" data-parsley-required="true" />
                                                    @error('number_of_employees')
                                                    <small class="text-danger">{{ $errors->first('number_of_employees') }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row g-4 mt-3">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <p>Revenue earned from Waste Management Projects by the Company:</p>
                                                    <table class="table table-sm">
                                                        <thead><tr><th>Year</th><th>Amount (Rs.Lakhs)</th></tr></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <select class="form-control" name="year1">
                                                                        <option value="{{ $settings->last_fyear }}">{{ $settings->last_fyear }}</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" name="fee1" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <select class="form-control" name="year2">
                                                                        <option value="{{ $settings->second_last_fyear }}">{{ $settings->second_last_fyear }}</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" name="fee2" class="form-control" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <select class="form-control" name="year3">
                                                                        <option value="{{ $settings->third_last_fyear }}">{{ $settings->third_last_fyear }}</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" name="fee3" class="form-control" /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-12">
                                                    <label class="form-label">Whether the Agency has been blacklisted by any Central Govt. / State Govt./PSU/ Govt. Bodies / Autonomous? If yes, details thereof.</label>
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
                                                    <label class="form-label">Whether included in the list of agencies not eligible for empanelment this year based on the performance evaluation by Suchitwa Mission among the agencies empaneled last year ({{ $settings->last_fyear }})</label>
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
                                        </section>
                                        <h3>Eligibility Conditions</h3>
                                        <section>
                                            <div class="row g-4">
                                                <div class="col-sm-12 table-responsive">
                                                    <p class="text-end"><a href="javascript:void(0)" class="addTechQual"><i class="fa fa-plus fa-lg text-primary"></i></a></p>
                                                    <table class="table table-sm">
                                                        <thead><tr><th>Name of the Waste<br>Management Project</th><th>Client Name</th><th>Project Cost (Rs.)</th><th>Project Period (Months)</th><th>Project Start Date</th><th>Project Status</th><th></th></tr></thead>
                                                        <tbody class="techQual">
                                                            <tr>
                                                                <td><input type="text" name="project_name[]" class="form-control" placeholder='Name of Project'/></td>
                                                                <td><input type="text" name="client_name[]" class="form-control" placeholder='Client Name'/></td>
                                                                <td><input type="number" name="project_cost[]" class="form-control" placeholder='0.00'/></td>
                                                                <td><input type="number" name="project_period[]" class="form-control" placeholder='0'/></td>
                                                                <td><input type="date" name="project_start_date[]" class="form-control"/></td>
                                                                <td>
                                                                {!! Form::select('project_status[]', array('0' => 'Select') + $pstypes, '', array('class' => 'form-control select2', '')) !!}
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </section>
                                        <h3>Attachments</h3>
                                        <section>
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
                                        </section>
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