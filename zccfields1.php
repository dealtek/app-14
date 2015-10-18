<?


'SignUp_Amt'=>$_SESSION['amount'],
'Billing Company Name'=>$co,
'F Name Billing'=>$_POST['firstname'],
'L Name Billing'=>$_POST['lastname'],

'Company'=>$co,
'cl_emp::telephone'=>$_POST['cellphone'],
'cl_emp::Notify_PhoneVoice'=>$_POST['cellphone'],
'cl_emp::Notify_PhoneText'=>$_POST['cellphone'],
'cl_emp::City_Taxi_Permit_No'=>'NEW',

//new doc agree
'cl_emp::web_agree_contract'=>$_POST['agree'],


//hmmm these?
'email_Confidential Email'=>$_POST["email"],
//'email_Employee_List Address'=>$_POST["email"],
'cl_emp::Notify_Email'=>$_POST['email'],
'email_Billing Address'=>$_POST['email'],
'client E Mail'=>$_POST['email'],

//'Phone1'=>$_POST["cellphone"],
'Phone2'=>$_POST["cellphone"],
'Billing Phone'=>$_POST["cellphone"],

//more

'Signup_date'=>$_POST['datetoday'],
'date TAXI annual renewexpir certification'=>$_POST['expdate'],
'type_of_company_number'=>$_POST['tocnum'],
'zweb_nopay'=>$_POST['zweb_nopay'],
// hmmm 'password'=>$_POST['password'],
'password'=>$_POST['driverslicense'], //hmmm

//'em_printPrefs_invoice'=>$_POST["optmailinv"],
//'z_webtmp'=>'',
'Status'=>'WEB-HOLD',
'z_websignup'=>'1',
//
'DOT_100_Annual_Fee'=>$_SESSION["renewamt"],
//'DOT_100_enroll'=>$_SESSION["amount"],
'Sales Person ID'=>'110',
'sales person first'=>'Marie',
'sales person last'=>'Torerro',
'initials for type of payment Signup'=>'web',
'type of initial payment'=>'credit card',
'Kind of Company'=>'Taxi Cab',
'ALC'=>'1',
'em_printPrefs'=>'paper',
'PUC Number'=>$_POST["PUC_Number"],
'Fax'=>'818 779 1908',

?>