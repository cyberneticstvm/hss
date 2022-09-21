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
                        <h1 class="h4 mt-1">Weightage Settings</h1>
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
                <form method="post" action="{{ route('admin.weightage.update', $weightage->id) }}">
                    @csrf
                    @method("PUT")
                    <h5 class="text-primary">Experience in designing and executing Liquid Waste Management Projects.</h5>
                    <table class="table table-bordered table-sm table-striped">
                        <thead><tr><th width="80%">Criteria</th><th>Max. Limit</th><th>Max.Score</th></thead>
                        <tbody>
                            <tr>
                                <td>Participation in tenders</td>
                                <td><input type="number" class="form-control text-end" name="cr1_limit" value="{{ $weightage->cr1_limit }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr1_score" value="{{ $weightage->cr1_limit }}" /></td>
                            </tr>
                            <tr>
                                <td>TS issued projects</td>
                                <td><input type="number" class="form-control text-end" name="cr2_limit" value="{{ $weightage->cr2_limit }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr2_score" value="{{ $weightage->cr2_score }}" /></td>
                            </tr>
                            <tr>
                                <td>Existence of completed & functional projects</td>
                                <td><input type="number" class="form-control text-end" name="cr3_limit" value="{{ $weightage->cr3_limit }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr3_score" value="{{ $weightage->cr3_score }}" /></td>
                            </tr>
                            <tr>
                                <td>Experience in designing and / or designing and executing presently working septage/ Effluent treatment plants</td>
                                <td><input type="number" class="form-control text-end" name="cr4_limit" value="{{ $weightage->cr4_limit }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr4_score" value="{{ $weightage->cr4_score }}" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <h5 class="text-primary">Background, experience and qualifications of full time employees, including their familiarity with similar work undertaken by agency.</h5>
                    <table class="table table-bordered table-sm table-striped">
                        <thead><tr><th width="70%">Criteria</th><th>Min. Yrs.</th><th>Max.Yrs.</th><th>Max.Score</th></thead>
                        <tbody>
                            <tr>
                                <td>Engineering Expert (Civil) - Degree in Civil Engineering and experience in Utility services like Water, Sewerage & Sewage/Septage Treatment Plants</td>
                                <td><input type="number" class="form-control text-end" name="cr5_min[]" value="{{ $weightages[0]['min_val'] }}"/></td>
                                <td><input type="number" class="form-control text-end" name="cr5_max[]" value="{{ $weightages[0]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr5_score[]" value="{{ $weightages[0]['score'] }}"/></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr5_min[]" value="{{ $weightages[1]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr5_max[]" value="{{ $weightages[1]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr5_score[]" value="{{ $weightages[1]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr5_min[]" value="{{ $weightages[2]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr5_max[]" value="{{ $weightages[2]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr5_score[]" value="{{ $weightages[2]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr5_min[]" value="{{ $weightages[3]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr5_max[]" value="{{ $weightages[3]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr5_score[]" value="{{ $weightages[3]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>Engineering Expert (Process/Chemical/Environmental) Degree/Masters in Engineering (Process/Chemical/Environmental) with experience in Utility services like Water, Sewerage & Sewage/Septage Treatment Plants</td>
                                <td><input type="number" class="form-control text-end" name="cr6_min[]" value="{{ $weightages[4]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr6_max[]" value="{{ $weightages[4]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr6_score[]" value="{{ $weightages[4]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr6_min[]" value="{{ $weightages[5]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr6_max[]" value="{{ $weightages[5]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr6_score[]" value="{{ $weightages[5]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr6_min[]" value="{{ $weightages[6]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr6_max[]" value="{{ $weightages[6]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr6_score[]" value="{{ $weightages[6]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr6_min[]" value="{{ $weightages[7]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr6_max[]" value="{{ $weightages[7]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr6_score[]" value="{{ $weightages[7]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>Engineering Expert (Structural) - MTech in Structural Engineering with experience in designing structural components of Plant</td>
                                <td><input type="number" class="form-control text-end" name="cr7_min[]" value="{{ $weightages[8]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr7_max[]" value="{{ $weightages[8]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr7_score[]" value="{{ $weightages[8]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr7_min[]" value="{{ $weightages[9]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr7_max[]" value="{{ $weightages[9]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr7_score[]" value="{{ $weightages[9]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr7_min[]" value="{{ $weightages[10]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr7_max[]" value="{{ $weightages[10]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr7_score[]" value="{{ $weightages[10]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>Engineering Expert (Mech.) - Degree in Mechanical Engineering with experience in Utility services like Water, Sewerage & Sewage/Septage Treatment Plants</td>
                                <td><input type="number" class="form-control text-end" name="cr8_min[]" value="{{ $weightages[11]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr8_max[]" value="{{ $weightages[11]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr8_score[]" value="{{ $weightages[11]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr8_min[]" value="{{ $weightages[12]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr8_max[]" value="{{ $weightages[12]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr8_score[]" value="{{ $weightages[12]['score'] }}" /></td>
                            </tr>
                            <tr>
                                <td>S/A</td>
                                <td><input type="number" class="form-control text-end" name="cr8_min[]" value="{{ $weightages[13]['min_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr8_max[]" value="{{ $weightages[13]['max_val'] }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr8_score[]" value="{{ $weightages[13]['score'] }}" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <h5 class="text-primary">CAPEX of projects handled by Consultancy firm.</h5>
                    <table class="table table-bordered table-sm table-striped">
                        <thead><tr><th width="80%">Criteria</th><th>Weightage</th><th>Max.Score</th></thead>
                        <tbody>
                            <tr>
                                <td>20 Lakhs to 50 Lakhs cost projects upto 5 nos</td>
                                <td><input type="number" class="form-control text-end" name="cr9_weightage" value="{{ $weightage->cr9_weightage }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr9_score" value="{{ $weightage->cr9_score }}" /></td>
                            </tr>
                            <tr>
                                <td>20 Lakhs to 50 Lakhs cost projects > 5 nos</td>
                                <td><input type="number" class="form-control text-end" name="cr10_weightage" value="{{ $weightage->cr10_weightage }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr10_score" value="{{ $weightage->cr10_score }}" /></td>
                            </tr>
                            <tr>
                                <td>50 Lakhs to 100 Lakhs cost projects upto 5 nos</td>
                                <td><input type="number" class="form-control text-end" name="cr11_weightage" value="{{ $weightage->cr11_weightage }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr11_score" value="{{ $weightage->cr11_score }}" /></td>
                            </tr>
                            <tr>
                                <td>50 Lakhs to 100 Lakhs cost projects > 5 nos</td>
                                <td><input type="number" class="form-control text-end" name="cr12_weightage" value="{{ $weightage->cr12_weightage }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr12_score" value="{{ $weightage->cr12_score }}" /></td>
                            </tr>
                            <tr>
                                <td>> 100 Lakhs cost projects upto 5 nos</td>
                                <td><input type="number" class="form-control text-end" name="cr13_weightage" value="{{ $weightage->cr13_weightage }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr13_score" value="{{ $weightage->cr13_score }}" /></td>
                            </tr>
                            <tr>
                                <td>> 100 Lakhs cost projects > 5 nos</td>
                                <td><input type="number" class="form-control text-end" name="cr14_weightage" value="{{ $weightage->cr14_weightage }}" /></td>
                                <td><input type="number" class="form-control text-end" name="cr14_score" value="{{ $weightage->cr14_score }}" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-submit btn-block btn-primary lift text-uppercase">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection