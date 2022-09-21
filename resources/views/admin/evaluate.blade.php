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
                        <h1 class="h4 mt-1">Evaluation</h1>
                    </div>
                </div> <!-- Row end  -->
            </div>
        </div>

        <!-- Body: Body -->
        <div class="body d-flex py-lg-4 py-3">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">                        
                                <h5 class="">Name of the Firm: {{ $company->name }}</h5>
                            </div>
                            <form method="post" action="{{ route('admin.evaluate.update', $company->id) }}">
                                @csrf
                                <input type="hidden" name="company_id" value="{{ $company->id }}" />
                                <div class="col-md-12 table-responsive mt-3">
                                    <h5 class="text-primary">Experience in designing and executing Liquid Waste Management Projects.</h5>
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead><tr><th width="65%">Qualification</th><th>Value</th><th>Score</th></thead>
                                        <tbody>
                                            <tr><td>Participation in tenders</td><td>
                                                <select class='form-control selScore' name="qualification_1" required>
                                                    <option value="0">Select</option>
                                                    @for($i=1; $i<=9; $i++)
                                                    <option value="{{ $i }}" {{ ($score && $score->qualification_1 == $i) ? 'selected' : '' }}>{{ $i }} Project(s)</option>
                                                    @endfor
                                                    <option value="10" {{ ($score && $score->qualification_1 == 10) ? 'selected' : '' }}> >= 10 Projects</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->qualification_1 : 0 }}</td></tr>
                                            <tr><td>TS issued projects</td><td>
                                                <select class='form-control selScore' name="qualification_2" required>
                                                    <option value="0">Select</option>
                                                    @for($i=1; $i<=4; $i++)
                                                    <option value="{{ $i*2 }}" {{ ($score && $score->qualification_2 == $i*2) ? 'selected' : '' }}>{{ $i }} Project(s)</option>
                                                    @endfor
                                                    <option value="10" {{ ($score && $score->qualification_2 == 10) ? 'selected' : '' }}>>= 5 Projects</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->qualification_2 : 0 }}</td></tr>
                                            <tr><td>Existence of completed & functional projects</td><td>
                                                <select class='form-control selScore' name="qualification_3" required>
                                                    <option value="0">Select</option>
                                                    @for($i=1; $i<=4; $i++)
                                                    <option value="{{ $i }}" {{ ($score && $score->qualification_3 == $i) ? 'selected' : '' }}>{{ $i }} Project(s)</option>
                                                    @endfor
                                                    <option value="5" {{ ($score && $score->qualification_3 == 5) ? 'selected' : '' }}> >= 5 Projects</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->qualification_3 : 0 }}</td></tr>
                                            <tr><td>Experience in designing and / or designing and executing presently working Septage Treatment Plant(STP) / Faecal Sludge Treatment Plant (FSTP) / Effluent Treatment Plants (ETP).</td><td>
                                                <select class='form-control selScore' name="qualification_4" required>
                                                    <option value="0">Select</option>
                                                    <option value="15" {{ ($score && $score->qualification_4 == 15) ? 'selected' : '' }}>Experience in designing and / or designing and executing presently working all three types</option>
                                                    <option value="10" {{ ($score && $score->qualification_4 == 10) ? 'selected' : '' }}>Experience in designing and / or designing and executing presently working any two types of plants</option>
                                                    <option value="5" {{ ($score && $score->qualification_4 == 5) ? 'selected' : '' }}>Experience in designing and / or designing and executing presently working any one type of plant</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->qualification_4 : 0 }}</td></tr>
                                            <tr><th colspan="3">Background, experience and qualifications of full time employees, including their familiarity with similar work undertaken by agency</th></tr>
                                            <tr><td>Engineering Expert (Civil) - Degree in Civil Engineering and experience in Utility services like Water, Sewerage & Sewage/Septage Treatment Plants</td><td>
                                            <select class='form-control selScore' name="experience_1" required>
                                                    <option value="0">Select</option>
                                                    <option value="5" {{ ($score && $score->experience_1 == 5) ? 'selected' : '' }}>Experience 1 to 2 years</option>
                                                    <option value="8" {{ ($score && $score->experience_1 == 8) ? 'selected' : '' }}>Experience 3 to 5 years</option>
                                                    <option value="10" {{ ($score && $score->experience_1 == 10) ? 'selected' : '' }}>Experience 6 to 7 years</option>
                                                    <option value="12" {{ ($score && $score->experience_1 == 12) ? 'selected' : '' }}>Experience > 7 years</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->experience_1 : 0 }}</td></tr>
                                            <tr><td>Engineering Expert (Process/Chemical/Environmental) Degree/Masters in Engineering (Process/Chemical/Environmental) with experience in Utility services like Water, Sewerage & Sewage/Septage Treatment Plants</td><td>
                                            <select class='form-control selScore' name="experience_2" required>
                                                    <option value="0">Select</option>
                                                    <option value="5" {{ ($score && $score->experience_2 == 5) ? 'selected' : '' }}>Experience 1 to 2 years</option>
                                                    <option value="8" {{ ($score && $score->experience_2 == 8) ? 'selected' : '' }}>Experience 3 to 5 years</option>
                                                    <option value="10" {{ ($score && $score->experience_2 == 10) ? 'selected' : '' }}>Experience 6 to 7 years</option>
                                                    <option value="12" {{ ($score && $score->experience_2 == 12) ? 'selected' : '' }}>Experience > 7 years</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->experience_2 : 0 }}</td></tr>
                                            <tr><td>Engineering Expert (Structural) - MTech in Structural Engineering with experience in designing structural components of Plant</td><td>
                                            <select class='form-control selScore' name="experience_3" required>
                                                    <option value="0">Select</option>
                                                    <option value="3" {{ ($score && $score->experience_3 == 3) ? 'selected' : '' }}>Experience 1 to 2 years</option>
                                                    <option value="6" {{ ($score && $score->experience_3 == 6) ? 'selected' : '' }}>Experience 3 to 5 years</option>
                                                    <option value="10" {{ ($score && $score->experience_3 == 10) ? 'selected' : '' }}>Experience > 5 years</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->experience_3 : 0 }}</td></tr>
                                            <tr><td>Engineering Expert (Mech.) - Degree in Mechanical Engineering with experience in Utility services like Water, Sewerage & Sewage/Septage Treatment Plants</td><td>
                                            <select class='form-control selScore' name="experience_4" required>
                                                    <option value="0">Select</option>
                                                    <option value="3" {{ ($score && $score->experience_4 == 3) ? 'selected' : '' }}>Experience 1 to 2 years</option>
                                                    <option value="5" {{ ($score && $score->experience_4 == 5) ? 'selected' : '' }}>Experience 3 to 5 years</option>
                                                    <option value="6" {{ ($score && $score->experience_4 == 6) ? 'selected' : '' }}>Experience > 5 years</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->experience_4 : 0 }}</td></tr>
                                            <tr><th colspan="3">CAPEX of projects handled by Consultancy firm</th></tr>
                                            <tr><td>20 - 50 Lakhs</td><td>
                                            <select class='form-control selScore' name="capex_1" required>
                                                    <option value="0">Select</option>
                                                    <option value="1" {{ ($score && $score->capex_1 == 1) ? 'selected' : '' }}>1 - 5 Projects</option>
                                                    <option value="2" {{ ($score && $score->capex_1 == 2) ? 'selected' : '' }}>> 5 Projects</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->capex_1 : 0 }}</td></tr>
                                            <tr><td>51 - 100 Lakhs</td><td>
                                            <select class='form-control selScore' name="capex_2" required>
                                                    <option value="0">Select</option>
                                                    <option value="4" {{ ($score && $score->capex_2 == 4) ? 'selected' : '' }}>1 - 5 Projects</option>
                                                    <option value="6" {{ ($score && $score->capex_2 == 6) ? 'selected' : '' }}>> 5 Projects</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->capex_2 : 0 }}</td></tr>
                                            <tr><td>> 100 Lakhs</td><td>
                                            <select class='form-control selScore' name="capex_3" required>
                                                    <option value="0">Select</option>
                                                    <option value="9" {{ ($score && $score->capex_3 == 9) ? 'selected' : '' }}>1 - 5 Projects</option>
                                                    <option value="12" {{ ($score && $score->capex_3 == 12) ? 'selected' : '' }}>> 5 Projects</option>
                                                </select>
                                            </td><td class="score">{{ ($score) ?  $score->capex_3 : 0 }}</td></tr>
                                            <tr><th colspan="2" class="text-end">Total Score</th><th><input type="text" name="total" class="form-control totScore" value="{{ ($score) ?  $score->total : 0 }}" readonly /></th></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-submit btn-block btn-primary lift text-uppercase">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection