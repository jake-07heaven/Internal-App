<head>
	<title>07 Heaven Application</title>
	<meta name="robots" content="noindex">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!--<link rel="stylesheet" type="text/css" href="//cloud.typography.com/7578754/725886/css/fonts.css">-->
	<link href='https://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
	<script type="text/javascript"> 
	function display_c(){
	var refresh=1000; // Refresh rate in milli seconds
	mytime=setTimeout('display_ct()',refresh)
	}

	function display_ct() {
	var strcount
	var x = new Date()
	document.getElementById('ct').innerHTML = x;
	tt=display_c();
	}
	</script>
</head>