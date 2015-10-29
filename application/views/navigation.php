<?php
if ($level == 5)
{
	$admin = array (
		'employee' => 'Employees'
		);
}
else
{
	$admin = array (
		'employee' => 'Employee'
		);
}

$urlString = uri_string();

$segUrl = explode('/', $urlString);
$class='';
if($segUrl['0'] == 'hrs'){$class = 'current';}
$hr = "<a class='".$class."' href='" . base_url() . "hrs/'>HR</a>";
?>


<nav>
        <a class="<?php if($segUrl['0'] == 'employees'){echo 'current';} ?>" href="<?php echo base_url(); ?>employees/"><?php echo $admin['employee']; ?></a>
	<a class="<?php if($segUrl['0'] == 'companies'){echo 'current';} ?>" href="<?php echo base_url(); ?>companies/">Companies</a>
	<a class="<?php if($segUrl['0'] == 'jobs'){echo 'current';} ?>" href="<?php echo base_url(); ?>jobs/">Jobs</a>
	<a class="<?php if($segUrl['0'] == 'issues'){echo 'current';} ?>" href="<?php echo base_url(); ?>issues/">Issues</a>
	<a class="<?php if($segUrl['0'] == 'routes'){echo 'current';} ?>" href="<?php echo base_url(); ?>routes/">Routes</a>
        <a class="<?php if($segUrl['0'] == 'timings'){echo 'current';} ?>" href="<?php echo base_url(); ?>timings/">Timings</a>
        <a class="<?php if($segUrl['0'] == 'services'){echo 'current';} ?>" href="<?php echo base_url(); ?>services/">Services</a>
        <?php if($level == 5) {echo $hr;}?>
</nav>