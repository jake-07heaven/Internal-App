                                        <div id="st-trigger-effects" class="column">
                        <button id="task_tab" class="button" data-effect="st-effect-7"><img src="<?php echo base_url(); ?>img/task_tab.png"></button>
                    </div>
                            </div><!-- /st-content-inner -->
                                    </div><!-- /st-content -->
<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="col-sm-3 first-footer-col">
                <h4>WEEK</h4>
                <p class="blue">Total: &pound;99999999</p>
                <p class="grey">Target: &pound;99999999</p>
            </div>
            <div class="col-sm-3 first-footer-col">
                <h4>MONTH</h4>
                <p class="blue">Total: &pound;99999999</p>
                <p class="grey">Target: &pound;99999999</p>
            </div>
            <div class="col-sm-3 first-footer-col">
                <h4>YEAR</h4>
                <p class="blue">Total: &pound;99999999</p>
                <p class="grey">Target: &pound;99999999</p>
            </div>
            <div class="col-sm-3 last-footer-col">
                <h4>HOURS</h4>
                <p class="blue">Total: &pound;99999999</p>
                <p class="grey">Target: &pound;99999999</p>
            </div>
        </div>
    </div>
    <div class="footer-bot">
        <p>&copy; 2015 07 Heaven Design. All rights reserved | Website designed by 07 Heaven Design | Made by yours truly Jake Alder</p>
    </div>
</footer>
</div><!-- /st-pusher -->
 
</div><!-- /st-container -->
</body>
<script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/stickyfooter.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/classie.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.hotkeys.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/sidebarEffects.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/sorttable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/modernizr.custom.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/sidebarContent.js" type="text/javascript"></script>
<script>
$( ".task_input" ).keyup(function() {
    var val = $(this).val();
    var lastClass = $(this).attr('class').split(' ').pop();
    lastClass = "." + lastClass;
    $(lastClass).val(val);
});
$( ".task_date" ).change(function() {
    var val = $(this).val();
    var lastClass = $(this).attr('class').split(' ').pop();
    lastClass = "." + lastClass;
    $(lastClass).val(val);
});
</script>

<script>
$( ".task_select" ).change(function () {
    $( ".task_select option:selected" ).each(function() {
        selectedval = $(this).val();
        var jobandcomp = $(this).text().split(' - ');
        $('.task-job').val("Job: " + jobandcomp[1]);
        $('.task-comp').val("Company: " + jobandcomp[0]);
    });
    $(this).val(selectedval);
  })
.change();
</script>
<script>
$('.task_next').click(function() {
    
    var lastClass = $(this).attr('class').split(' ').pop();

    lastClass = "." + lastClass;
    $(this).parent().parent().toggleClass('unextended');
    $(this).parent().parent().parent().siblings(lastClass).children('div').toggleClass('unextended');
    
    $(this).siblings('.task_side_content').toggleClass('unextended');
    
    id_list = "";
    
    $('.employees-inputs').remove();
    $('.added_employees li').each(function(i)
    {
       var val = $(this).text();
       var id = $(this).val() + ',';
       id_list += id;
       $('.employees-list').append('<li class="quarter employees-inputs"><input readonly="readonly" value="'+val+'"</li>');
    });
    if (lastClass === '.finish')
    {
        $('#submit').trigger("click");
    }
    $('.input_ids').val(id_list);
});
$('.task_back').click(function() {
    
    var lastClass = $(this).attr('class').split(' ').pop();

    lastClass = "." + lastClass;
    $(this).parent().parent().toggleClass('unextended');
    $(this).parent().parent().parent().siblings(lastClass).children('div').toggleClass('unextended');
    
    $(this).siblings('.task_side_content').toggleClass('unextended');
});
</script>
<script type="text/javascript">
    $(function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  });
</script>
<script>
    $(document).bind('keydown', 't', function() {
        var open = $('.st-container').attr('class').split(' ').pop();
        if (open !== "st-menu-open")
        {
                $('#task_tab').trigger("click");
        }
        else
        {
            $('.st-content').trigger("click");

        }
    });
</script>
<script>
$('.task-row').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "tasks/view/" + id;
});
$('.employee-button').click(function() { 
    var id = $(this).attr('id');
    var row = "#row-" + id;
    console.log(row);
    $(row).toggleClass('hidden');
});

$('.employee-edit-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
	window.location.href = url + "employees/employee/" + id + "/edit/";
});

$('.employee-view-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
	window.location.href = url + "employees/employee/" + id + "/profile/";
});

$('.employee-add-button').click(function() { 
    var url = <?php echo json_encode(base_url()); ?>;
	window.location.href = url + "employees/add";
});

$('.employee-delete-button').click(function() {
    if (window.confirm("Are you sure you wish to delete this employee?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "employees/remove/" + id;
    }

});

$('.employee-move-prev-button').click(function() {
    if (window.confirm("Are you sure you wish to move this employee?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "employees/move/" + id + "/prev";
    }

});

$('.employee-move-cur-button').click(function() {
    if (window.confirm("Are you sure you wish to move this employee?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "employees/move/" + id + "/cur";
    }

});
</script>

<script>
$('.company-button').click(function() { 
    var id = $(this).attr('id');
    var row = "#row-" + id;
    console.log(row);
    $(row).toggleClass('hidden');
});

$('.company-edit-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "companies/company/" + id + "/edit/";
});

$('.company-view-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "companies/company/" + id + "/profile/";
});

$('.company-add-button').click(function() { 
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "companies/add";
});

$('.company-delete-button').click(function() {
    if (window.confirm("Are you sure you wish to delete this company?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "companies/remove/" + id;
    }

});

$('.company-move-prev-button').click(function() {
    if (window.confirm("Are you sure you wish to move this company?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "companies/move/" + id + "/prev";
    }

});

$('.company-move-cur-button').click(function() {
    if (window.confirm("Are you sure you wish to move this company?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "companies/move/" + id + "/cur";
    }

});
</script>

<script>
$('.job-button').click(function() { 
    var id = $(this).attr('id');
    var row = "#row-" + id;
    console.log(row);
    $(row).toggleClass('hidden');
});

$('.job-edit-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "jobs/job/" + id + "/edit/";
});

$('.job-view-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "jobs/job/" + id + "/profile/";
});

$('.job-add-button').click(function() {
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "jobs/add";
});

$('.job-delete-button').click(function() {
    if (window.confirm("Are you sure you wish to delete this job?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "jobs/remove/" + id;
    }

});

$('.job-move-prev-button').click(function() {
    if (window.confirm("Are you sure you wish to move this job?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "jobs/move/" + id + "/prev";
    }

});

$('.job-move-cur-button').click(function() {
    if (window.confirm("Are you sure you wish to move this job?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "jobs/move/" + id + "/cur";
    }

});

$('.add-employee-button-job').click(function() {
    var employee_id = $("#employee-select").val();
    var employee_name = $('#employee-select option:selected').text();
    console.log(employee_name);
    var current_employees = $('.linked_employees').val();
    var currnet_employees_names = $('.linked_employees_view').val();
    if (current_employees.indexOf(employee_id) == -1)
    {
        var new_employees_names = currnet_employees_names + employee_name  + ", "; 
        var new_employees = current_employees + employee_id  + ",";
       
        $('.linked_employees').val(new_employees);
        $('.linked_employees_view').val(new_employees_names);
    }
    else
    {
        console.log('Can only have one of each of employee!');
    }

});

$('.remove-employee-button-job').click(function() {
    var rem_employee_id = $("#employee-select").val() + ',';
    var rem_employee_name = $('#employee-select option:selected').text() + ', ';
    var rem_current_employees = $('.linked_employees').val();
    var rem_currnet_employees_names = $('.linked_employees_view').val();
    var rem_new_employees = rem_current_employees.replace(rem_employee_id, '');
    var rem_new_employees_names = rem_currnet_employees_names.replace(rem_employee_name, '');
    $('.linked_employees').val(rem_new_employees);
    $('.linked_employees_view').val(rem_new_employees_names);

});

$('.add-job-button-job').click(function() {
    var job_id = $("#job-select").val();
    var job_name = $('#job-select option:selected').text();
    console.log(job_name);
    var current_jobs = $('.linked_jobs').val();
    var currnet_jobs_names = $('.linked_jobs_view').val();
    if (current_jobs.indexOf(job_id) == -1)
    {
        var new_jobs_names = currnet_jobs_names + job_name + ", "; 
        var new_jobs = current_jobs + job_id + ",";
       
        $('.linked_jobs').val(new_jobs);
        $('.linked_jobs_view').val(new_jobs_names);
    }
    else
    {
        console.log('Can only have one of each of job!');
    }

});

$('.remove-job-button-job').click(function() {
    var rem_job_id = $("#job-select").val() + ',';
    var rem_job_name = $('#job-select option:selected').text() + ', ';
    var rem_current_jobs = $('.linked_jobs').val();
    var rem_currnet_jobs_names = $('.linked_jobs_view').val();
    var rem_new_jobs = rem_current_jobs.replace(rem_job_id, '');
    var rem_new_jobs_names = rem_currnet_jobs_names.replace(rem_job_name, '');
    $('.linked_jobs').val(rem_new_jobs);
    $('.linked_jobs_view').val(rem_new_jobs_names);

});

$('.add-company-button-job').click(function() {
    var company_id = $("#company-select").val();
    var company_name = $('#company-select option:selected').text();
    console.log(company_name);
    var current_companies = $('.linked_companies').val();
    var currnet_companies_names = $('.linked_companies_view').val();
    if (current_companies.indexOf(company_id) == -1)
    {
        var new_companies_names = currnet_companies_names + company_name + ", "; 
        var new_companies = current_companies + company_id + ",";
       
        $('.linked_companies').val(new_companies);
        $('.linked_companies_view').val(new_companies_names);
    }
    else
    {
        console.log('Can only have one of each of company!');
    }

});

$('.remove-company-button-job').click(function() {
    var rem_company_id = $("#company-select").val() + ',';
    var rem_company_name = $('#company-select option:selected').text() + ', ';
    var rem_current_companies = $('.linked_companies').val();
    var rem_currnet_companies_names = $('.linked_companies_view').val();
    var rem_new_companies = rem_current_companies.replace(rem_company_id, '');
    var rem_new_companies_names = rem_currnet_companies_names.replace(rem_company_name, '');
    $('.linked_companies').val(rem_new_companies);
    $('.linked_companies_view').val(rem_new_companies_names);

});
</script>

<script>
$('.issue-button').click(function() { 
    var id = $(this).attr('id');
    var row = "#row-" + id;
    console.log(row);
    $(row).toggleClass('hidden');
});

$('.issue-edit-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "issues/issue/" + id + "/edit/";
});

$('.issue-view-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "issues/issue/" + id + "/profile/";
});

$('.issue-add-button').click(function() {
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "issues/add";
});

$('.issue-delete-button').click(function() {
    if (window.confirm("Are you sure you wish to delete this issue?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "issues/remove/" + id;
    }

});

$('.issue-move-prev-button').click(function() {
    if (window.confirm("Are you sure you wish to move this issue?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "issues/move/" + id + "/prev";
    }

});

$('.issue-move-cur-button').click(function() {
    if (window.confirm("Are you sure you wish to move this issue?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "issues/move/" + id + "/cur";
    }

});

$('.add-employee-button-issue').click(function() {
    var employee_id = $("#employee-select").val();
    var employee_name = $('#employee-select option:selected').text();
    console.log(employee_name);
    var current_employees = $('.linked_employees').val();
    var currnet_employees_names = $('.linked_employees_view').val();
    if (current_employees.indexOf(employee_id) == -1)
    {
        var new_employees_names = currnet_employees_names + employee_name  + ", "; 
        var new_employees = current_employees + employee_id  + ",";
       
        $('.linked_employees').val(new_employees);
        $('.linked_employees_view').val(new_employees_names);
    }
    else
    {
        console.log('Can only have one of each of employee!');
    }

});

$('.remove-employee-button-issue').click(function() {
    var rem_employee_id = $("#employee-select").val() + ',';
    var rem_employee_name = $('#employee-select option:selected').text() + ', ';
    var rem_current_employees = $('.linked_employees').val();
    var rem_currnet_employees_names = $('.linked_employees_view').val();
    var rem_new_employees = rem_current_employees.replace(rem_employee_id, '');
    var rem_new_employees_names = rem_currnet_employees_names.replace(rem_employee_name, '');
    $('.linked_employees').val(rem_new_employees);
    $('.linked_employees_view').val(rem_new_employees_names);

});

$('.add-company-button-issue').click(function() {
    var company_id = $("#company-select").val();
    var company_name = $('#company-select option:selected').text();
    console.log(company_name);
    var current_companies = $('.linked_companies').val();
    var currnet_companies_names = $('.linked_companies_view').val();
    if (current_companies.indexOf(company_id) == -1)
    {
        var new_companies_names = currnet_companies_names + company_name + ", "; 
        var new_companies = current_companies + company_id + ",";
       
        $('.linked_companies').val(new_companies);
        $('.linked_companies_view').val(new_companies_names);
    }
    else
    {
        console.log('Can only have one of each of company!');
    }

});

$('.remove-company-button-issue').click(function() {
    var rem_company_id = $("#company-select").val() + ',';
    var rem_company_name = $('#company-select option:selected').text() + ', ';
    var rem_current_companies = $('.linked_companies').val();
    var rem_currnet_companies_names = $('.linked_companies_view').val();
    var rem_new_companies = rem_current_companies.replace(rem_company_id, '');
    var rem_new_companies_names = rem_currnet_companies_names.replace(rem_company_name, '');
    $('.linked_companies').val(rem_new_companies);
    $('.linked_companies_view').val(rem_new_companies_names);

});
</script>

<script>
$('.hr-button').click(function() { 
    var id = $(this).attr('id');
    var row = "#row-" + id;
    console.log(row);
    $(row).toggleClass('hidden');
});

$('.hr-edit-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "hrs/hr/" + id + "/edit/";
});

$('.hr-view-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "hrs/hr/" + id + "/profile/";
});

$('.hr-add-button').click(function() {
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "hrs/add";
});

$('.hr-delete-button').click(function() {
    if (window.confirm("Are you sure you wish to delete this hr?")) {
        var id = $(this).attr('id');
        var url = <?php echo json_encode(base_url()); ?>;
        window.location.href = url + "hrs/remove/" + id;
    }

});
</script>

<script>
$('.route-edit-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
    window.location.href = url + "routes/edit/";
});
</script>

<script>
$('.edit-notes-job').click(function(){
    $('.edit-notes-job').toggleClass('hidden');
    $('.update-notes-job').toggleClass('hidden');
    $('.notes-read').toggleClass('hidden');
    $('.notes-write').toggleClass('hidden');
});
</script>

<script>
$('.service-edit-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
	window.location.href = url + "services/service/" + id + "/edit/";
});
</script>

<script>
$('.time-edit-button').click(function() { 
    var url = <?php echo json_encode(base_url()); ?>;
	window.location.href = url + "timings/time/0/edit/";
});
</script>
    