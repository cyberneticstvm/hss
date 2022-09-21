<!DOCTYPE html>
<html>
<head>
    <title>Suchitwa Mission Empanelment Company Profile</title>
    <style>
        .tbl{
            border: 1px solid #000;
            width: 100%;
        }
        th, td{
            border: 1px solid #000;
            padding: 5px;
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <h1>SUCHITWA MISSION</h1>
        <h5>Company Profile</h5>
    </center>
    <table class="tbl" cellspacing="0" cellpadding="0">
        <thead><tr><th width="40%">COLUMN</th><th>VALUE</th></tr></thead>
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
            <tr><td>Professional /Consultancy Fee Received by the Consultant:</td><td><table class="tbl" cellspacing="0" cellpadding="0">
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
    <table class="tbl" cellspacing="0" cellpadding="0">
        <thead><tr><th>Project Name</th><th>Client Name</th><th>Project Cost(Rs.)</th><th>Project Period(Yrs)</th><th>Project Start Date</th><th>Project Status</th></thead>
        <tbody>
            @forelse($projects as $key => $project)
                <tr>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->client_name }}</td>
                    <td>{{ $project->project_cost }}</td>
                    <td>{{ $project->	project_period }}</td>
                    <td>{{ date('d/M/Y', strtotime($project->project_start_date)) }}</td>
                    <td>{{ DB::table('project_status')->where('id', $project->project_status)->pluck('name')->first(); }}</td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No Records Found</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>