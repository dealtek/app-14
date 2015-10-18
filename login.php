<?php
ini_set('display_errors', 0);
require_once('../Connections/userbasic.php');
if(!session_id()) session_start();
include('Email_Module/emailer.php');
// move query to top
if (isset ($_POST['trylogin'])){
//new find

$getclient_find = $userbasic->newFindCommand('clients1');
$getclient_findCriterions = array(

//'Client_ID'=>'=='.'11586',
//
'Client_ID'=>'=='.$_POST['Client_ID'],

//'login_c'=>'=='.$_POST['cellphone'],
'pass_c'=>'=='.$_POST['webpass'],
//'Phone2'=>'=='.$_POST['cellphone'],
//'password'=>'=='.$_POST['webpass'],

);
foreach($getclient_findCriterions as $key=>$value) {
    $getclient_find->AddFindCriterion($key,$value);
}

fmsSetPage($getclient_find,'getclient',10); 

$getclient_result = $getclient_find->execute(); 

//
if(FileMaker::isError($getclient_result)) fmsTrapError($getclient_result,"errorlog.php");

fmsSetLastPage($getclient_result,'getclient',10); 

$getclient_row = current($getclient_result->getRecords());

$getclient__cltoc_portal = fmsRelatedRecord($getclient_row, 'cl_toc');

//set session vars

$_SESSION['nowuser'] = $getclient_row->getField('Client_ID');
$_SESSION["nowpass"] = $getclient_row->getField('password');
$_SESSION["clients_tableLogin"]["user"] = $_SESSION["nowuser"];
$_SESSION["clients_tableLogin"]["pass"] = $_SESSION["nowpass"];

// new idea

include ("vars_inc.php");

//set cookie here
//$cookie_name = "idc_client_id";
$cookie_value = $getclient_row->getField('Client_ID');
setcookie('idc_client_id', $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day

$cookie_value2 = $getclient_row->getField('password');
setcookie('idc_client_pass', $cookie_value2, time() + (86400 * 365), "/"); // 86400 = 1 day

//login ok - now go
//echo '<meta http-equiv="refresh" content="0; url=varsmob.php">';

//
$newURL = "dashboard.php";
//
header('Location: '.$newURL);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Independent Drivers Consortium -  LOGIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- 

<link rel="stylesheet" href="inc/jq/themes/theme-02.min.css" />
<link rel="stylesheet" href="inc/jq/themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script>
	$(function(){
		$( "[data-role='header'], [data-role='footer']" ).toolbar();
		});
    </script>
    
      -->
    
<link href="mob.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div data-role="header" data-position="fixed" data-theme="a">
<div class="box1" center1> <img class="center" src="pics/appbanner-320x60-main.png" ></div>
<!--<h1>Page head Title</h1> --> 
</div>
<!-- /header -->

<section id="page01111" data-role="page"> 

<!--	
<div class="box1 center1" >this box fill all<br><br>
<br>
</div> 
-->

<div role="main" class="ui-content">
<div class="content" >
<div class="box1 center1" > 

<!--INSERT START -->

<table  border="0" align="center" cellpadding="0" cellspacing="0" class="bk3">
<!--<tr>
<td valign="top" class="menu1">44</td>
</tr> -->
<tr>
<td>

<table width="95%" border="0" align="center" >
<!--<tr>
<td height="10" colspan="3" valign="TOP" class="style3">222</td>
</tr> -->
<tr>
<td width="1" valign="TOP" background="pix/bk2.jpg" class="style3"></td>
<td  valign="TOP">
<h3>IDC LOGIN</h3>

Login to our <strong class="green1">- Secure Server - </strong><br><br>

<div id="container">
<!--<a href="index.php">Home</a><br>
<hr /> -->

<!-- 

tmpppp id pass cook
<?php 
echo $_COOKIE['idc_client_id'];
echo $_COOKIE['idc_client_pass'];
?><br>
tmpppp222 toc DL cell sess
<br>
<?php 
echo $_SESSION['nowtoc'];
echo $_SESSION['nowlicense'];
echo $_SESSION['nowcellphone'];
?>-->

<?php 

if (isset($_SESSION['newflag1']) && $_SESSION['newflag1'] =='yes'){
	
/*	
$_COOKIE['idc_client_id'] = $_SESSION['nowuser'];
$_COOKIE['idc_client_pass'] = $_SESSION['nowlicense'];
$_COOKIE['idc_client_cellphone'] = $_SESSION['nowcellphone'];
*/

setcookie('idc_client_id', $_SESSION['nowuser'] );
setcookie('idc_client_pass', $_SESSION['nowlicense'] );
setcookie('idc_client_cellphone', $_SESSION['nowcellphone'] );



//off
$_SESSION['newflag1'] = 'no';




	}



//$_SESSION['nowtoc'] = $_GET['conum'];
//$_SESSION['nowlicense'] = $_GET['driverslicense'];
//$_SESSION['nowcellphone'] = $_GET['cellphone'];




?>






<form action="login.php"  method="post">
<!--
<h2>Enter your information:</h2>
 --> 
<?php echo $_SESSION['nownote'];
?> 


<div align="left">

<!--cookie start -->
 



Enter Your Client ID*: <!--(tmp login 45021 pass 123456) --><br> 
<input name="Client_ID" type="text" class="print_data_22" value="

<?php
if(!isset($_COOKIE['idc_client_id'])) {
} else {
echo $_COOKIE['idc_client_id'];
}
?>


" size="15" class="print_data_22" />

<p>Drivers License-PASSWORD*:<br>
(Your Drivers License Number<br>
Is Your Password)

<input name="webpass" type="password" class="print_data_22" value="<?php
if(!isset($_COOKIE['idc_client_pass'])) {
   
} else {
echo $_COOKIE['idc_client_pass'];
}
?>
" size="15" class="print_data_22" />
</p>
<hr />
<input type="submit" class="buttonform2_24" name="submit" value= " - Login - " />

<!--
rel="external" hmm not submit?
            -->

<input type="hidden" name="trylogin" value= "true" >
</form>
<br>
(just numbers and letters)<br>



<br />
<br />
<br />
<br />
<br />
</div></td>
<td class="style3" valign="TOP">&nbsp;</td>
</tr>
</table></td>
</tr>
</table>
<br>

<!--INSERT END --> 

</div>
<!-- end .box --> 
</div>
<!-- end .content --> 
</div>
<!-- /ui-content --> 

</section>
<!-- /page --> 


<!-- /footer -->

</body>
</html>
