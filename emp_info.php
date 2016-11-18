<?php
session_start();

if(isset($_SESSION['sin']))
{
	$err_msg = '<h1 style="background-color:#e5e5e5">Employee ID: '.$_SESSION['sin'].'</h1>';
	
	session_destroy();
	unset($_SESSION);
}

if(!empty($_POST['sin']))
{
	$sin = $empId = null;
//	if(ctype_alnum($_POST['fn']))
//		$fn = $_POST['fn'];
//
//	if(ctype_alnum($_POST['ln']))
//		$ln	= $_POST['ln'];
	
	$post_sin = str_replace("-", "", $_POST['sin']);
	if(ctype_digit($post_sin))
		$sin = $_POST['sin'];
	
	if(ctype_digit($_POST['empId']))
		$empId = $_POST['empId'];
	

	
	if($sin && $empId)
	{
		$date		= date("Y-m-d H:i:s", time());
//		$csvArr[] 	= $ln;
//		$csvArr[] 	= $fn;
		$csvArr[] 	= $sin;
		$csvArr[] 	= $empId;
		$csvArr[]	= $date;
		$csvData 	= implode(",", $csvArr);
		$csvData	.= "\n";
	//	$fp 		= fopen("C:/Documents and Settings/Administrator/My Documents/Dropbox/KHC/EmployeeID_iphone.csv", "a");
		$fp 		= fopen("EmployeeID_nextgen.csv", "a");

		if($fp)
		{
			fwrite($fp, $csvData); // Write information to the file
			fclose($fp); // Close the file
		}
		
		$_SESSION['sin'] 	= $empId;

	//	Redirect to same page
		header("Location:emp_info.php");
		exit();
	}
	else
	{
		$err_msg = '<b><font color="#FF0000">All fields are mandatory to fill.</font></b>';
	}
}
?>

<!--?xml version="1.0" encoding="UTF-8"?-->
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="cache-control" content="no-cache">
<title>Kindred Home Care Employee ID Generator</title>
<link href="css/layout.css" rel="stylesheet" type="text/css">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="True">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<style type="text/css" charset="utf-8">

/** reset styling **/

.firebugResetStyles {

    z-index: 2147483646 !important;

    top: 0 !important;

    left: 0 !important;

    display: block !important;

    border: 0 none !important;

    margin: 0 !important;

    padding: 0 !important;

    outline: 0 !important;

    min-width: 0 !important;

    max-width: none !important;

    min-height: 0 !important;

    max-height: none !important;

    position: fixed !important;

    -moz-transform: rotate(0deg) !important;

    -moz-transform-origin: 50% 50% !important;

    -moz-border-radius: 0 !important;

    -moz-box-shadow: none !important;

    background: transparent none !important;

    pointer-events: none !important;

}



.firebugBlockBackgroundColor {

    background-color: transparent !important;

}



.firebugResetStyles:before, .firebugResetStyles:after {

    content: "" !important;

}

/**actual styling to be modified by firebug theme**/

.firebugCanvas {

    display: none !important;

}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

.firebugLayoutBox {

    width: auto !important;

    position: static !important;

}



.firebugLayoutBoxOffset {

    opacity: 0.8 !important;

    position: fixed !important;

}



.firebugLayoutLine {

    opacity: 0.4 !important;

    background-color: #000000 !important;

}



.firebugLayoutLineLeft, .firebugLayoutLineRight {

    width: 1px !important;

    height: 100% !important;

}



.firebugLayoutLineTop, .firebugLayoutLineBottom {

    width: 100% !important;

    height: 1px !important;

}



.firebugLayoutLineTop {

    margin-top: -1px !important;

    border-top: 1px solid #999999 !important;

}



.firebugLayoutLineRight {

    border-right: 1px solid #999999 !important;

}



.firebugLayoutLineBottom {

    border-bottom: 1px solid #999999 !important;

}



.firebugLayoutLineLeft {

    margin-left: -1px !important;

    border-left: 1px solid #999999 !important;

}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

.firebugLayoutBoxParent {

    border-top: 0 none !important;

    border-right: 1px dashed #E00 !important;

    border-bottom: 1px dashed #E00 !important;

    border-left: 0 none !important;

    position: fixed !important;

    width: auto !important;

}



.firebugRuler{

    position: absolute !important;

}



.firebugRulerH {

    top: -15px !important;

    left: 0 !important;

    width: 100% !important;

    height: 14px !important;

    border-top: 1px solid #BBBBBB !important;

    border-right: 1px dashed #BBBBBB !important;

    border-bottom: 1px solid #000000 !important;

}



.firebugRulerV {

    top: 0 !important;

    left: -15px !important;

    width: 14px !important;

    height: 100% !important;

   
    border-left: 1px solid #BBBBBB !important;

    border-right: 1px solid #000000 !important;

    border-bottom: 1px dashed #BBBBBB !important;

}



.overflowRulerX > .firebugRulerV {

    left: 0 !important;

}



.overflowRulerY > .firebugRulerH {

    top: 0 !important;

}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

.fbProxyElement {

    position: fixed !important;

    pointer-events: auto !important;

}
</style>


<script>
	<!--
	function isNumberKey(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		
		var sin_val = document.getElementById('sin').value;

		if(sin_val.length == 3 || sin_val.length == 7)
		document.getElementById('sin').value = sin_val+'-';
		return true;
	}
	
	
	
	
	function generate_id()
	{
		var sin_val = document.getElementById('sin').value;

//		if(!document.getElementById('fn').value)
//		{
//			alert("Firstname cannot be empty.");
//			document.getElementById('fn').focus();
//			return false;
//		}
//		else if(!document.getElementById('ln').value)
//		{
//			alert("Lastname cannot be empty.");
//			document.getElementById('ln').focus();
//			return false;
//		}
		if(!sin_val)
		{
			alert("Social Insurance Number cannot be empty.");
			document.getElementById('sin').focus();
			return false;
		}
		else if(sin_val.length < 11)
		{
			alert("Social Insurance Number cannot be less than 9 digits.");
			document.getElementById('sin').focus();
			return false;
		}


//////// After Validation, Calculate Emplpoyee ID ////////

		sin_val = parseInt(sin_val.replace(/-/g, ''));
		
		var emp_obj  = document.getElementById('empId');
		var sub_val = 947368421 - sin_val;

		if(sin_val == 0)	//	947368421 - sin_val == 947368421
		{
			emp_obj.value = 0;
		}
		else
		{
			if(sub_val < 9)
				emp_obj.value = sub_val * 10;
			else
				emp_obj.value = sub_val;
		}
		
		document.add_emp_form.submit();
	}
	
	//-->
</script>

</head>
<body>
<div id="wrapper">
  <div class="full">
    <div class="header">
      <div class="logo">Kindred Home Care Employee</div>
    </div>
    <div class="containermain">
	<form name="add_emp_form" method="post">
      <div class="container">
	  	<p><?php echo $err_msg; ?></p>
        <h1>Kindred Home Care Employee ID Generator</h1>
        <p>Social Insurance Number: &nbsp; <br />
          <input name="sin" id="sin" type="text" class="textbox" maxlength="11" onKeyPress="return isNumberKey(event)" />
          <br />
          The Employee ID: &nbsp; <br />
          <input readonly="readonly" name="empId" id="empId" type="text" class="textbox" />
          <br />
          <input type="button" onclick="return generate_id()" value="Generate ID" />
          <br />
          Date:  <?php echo date("F d, Y", time()); ?> <br />
          <br />
        </p>
      </div>
	</form>
    </div>
  </div>
</div>
</body>
</html>