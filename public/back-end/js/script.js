$(function(){
    "use strict";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>&nbsp;Loading...");
    });

    $(".dtpicker").pickadate({
        format: "dd/mmm/yyyy",
        selectYears: 100,
        selectMonths: true,
        //max: true
    });

    $('#dataTbl').dataTable({
        responsive: true
    });

    $('#wizard1').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
        labels:{
            finish: "Submit",
        },
        onInit: function (event, currentIndex) {
            $('.actions a[href="#finish"]').attr('class', "btn-submit");
        },
        onStepChanging:function(event, currentIndex, newIndex){
            if(currentIndex === 0){
                $('#frm-company').parsley().validate();
                if($('#frm-company').parsley().validate()){
                    return true;
                }
            }
            if(currentIndex === 1){
                return true;
            }
            if(currentIndex === 2){
                return true;
            }
        },
        onFinished: function (event, currentIndex){
            $("#frm-company").submit();
        }
    });

    $(".addTechQual").click(function(){
        $("table .techQual").append("<tr><td><input type='text' name='project_name[]' class='form-control' placeholder='Name of Project' /></td><td><input type='text' name='client_name[]' class='form-control' placeholder='Client Name' /></td><td><input type='number' name='project_cost[]' class='form-control' placeholder='0.00' /></td><td><input type='number' name='project_period[]' class='form-control' placeholder='0' /></td><td><input type='date' name='project_start_date[]' class='form-control' /></td><td><select name='project_status[]' class='form-control selProjectStatus'><option value='0'>Select</option></select></td><td class='text-center'><a href='javascript:void(0)' onClick='$(this).parent().parent().remove()'><i class='fa fa-trash text-danger'></i></a></td></tr>");
        $('.selProjectStatus').select2();
        bindDDL('/helper/projectstatus/', 'selProjectStatus');
    });

    $(".selScore").change(function(){
        var iscore = $(this).val(); var score = 0;
        $(this).parent().next('td').text(iscore);
        $(".score").each(function(){
            score += parseInt($(this).text())
        });
        $(".totScore").val(score);
    });
});

function bindDDL(url, ddl){
    $.ajax({
        type: 'GET',
        url: url
    }).then(function (data){
        xdata = $.map(data, function(obj){
            obj.text = obj.name || obj.id;  
            return obj;
        });
        $('.'+ddl).select2({data:xdata});
    });
}

