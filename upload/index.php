<?php session_start();
//require_once("base_connect.php");
if(isset($_SESSION['empid']))
{
	unset($_SESSION['empid']) ;
}
if(isset($_SESSION['pname']))
{

	unset($_SESSION['pname']) ;
}
$sucessres=0;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Project</title>
<link rel="stylesheet" href="css\layout.css">
		<link rel="stylesheet" href="css\additional.css">

<script type="text/javascript" src="js/jquery.min1.js"></script>
<script language="javascript" type="text/javascript" src="js/commonValidations.js"></script>
<!--Jquery Autocomplete -->
<!--UI JQUERY DATE TIME PICKER-->
<!--<script src="datepicker/jquery.ui.core.js" defer="defer"></script>-->
<!--<script src="datepicker/jquery.ui.datepicker.js" defer="defer"></script>-->
<!-- <script src="datepicker/jquery.ui.widget.js"></script>-->
<style>
body {

    background-repeat: repeat;
    background-position: top;
    margin: 0px;
    padding: 0px;
    background: #F4F4F4;
    text-align: center;

}
.web-button2 {
	background-color:#5f5f5f;
}
.web-button2:hover {
	background-color:grey;
}
.logininnerbox ._logo, .cpwdinnerbox ._logo {
    background: #5f5f5f;
}
</style>
</head>
<body oncontextmenu="return true;">
    <noscript>    
    <div style="text-align:center;position: fixed; top: 0px; left: 0px;padding-top:200px; z-index: 3000; height: 100%; width: 100%; background-image:url(images/hacking.gif);">
    <span style="font-family:Calibri; font-size:36px; font-weight:bold;color:#FF9900;" class="blink">Please Enable the javascript...</span>
    </div>
    </noscript>	
<!--Fancybox-->
<!--<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.2.css" type="text/css" />
-->
<script  type="text/javascript">
$(window).load(function(){
	 //setErrorPosition("._logo img");
});

function setErrorPosition(objID){
	var pLeft = $(objID).parent().position().left;
	var pTop = $(objID).parent().position().top - 34;
		
		
	$(objID).blur(function(){
			resetErrorPosition("._logo img");
	});		
	$(".error_class2").css({'left' : pLeft});
	$(".error_class2").css({'top' : pTop});
	$(".error_class2").css({'width' : $(objID).parent().width() - 12});
}
	
function resetErrorPosition(objID){
	$(".error_class2").hide();	
	var pLeft2 = $(objID).position().left;

	var pTop2 = $(objID).position().top - 34;
	$(".error_class2").css({'left' : pLeft2});
	$(".error_class2").css({'top' : pTop2});
	$(".error_class2").css({'width' : $(objID).width() - 12});	
}

//LOG IN VALIDATION
function loginValidation(){
	var frm=document.frm_login;
	if(frm.txt_email.value == "" || frm.txt_email.value=="User Id or Email Id"){
		$(".error_class2").fadeIn("slow");
		$(".error_class2").html('User Id or Email Id can not be blank');
		setErrorPosition("#txt_email");
		$("#txt_email").focus();
        return false;
	}else if(frm.txt_password.value == "" || frm.txt_password.value=="Password"){
		$(".error_class2").fadeIn("slow");
        $(".error_class2").html('Password can not be blank.');
		setErrorPosition("#txt_password");
        $("#txt_password").focus();
        return false;
        }else{
           $(".error_class2").hide();
           document.frm_login.submit();
        }	
    }
    
//For password field placeholder 
$(document).ready(function() {
	$('#txt_password').focus(function() {
		$(this).prop('type', 'password').val('');
        this.style.color='#000';
	});
	
	$('#txt_password').blur(function() {
		if(this.value==''){
			$(this).prop('type', 'text').val('Password');
			this.style.color='#757575';
		}
	});
	
	//Remove cross symbol for ie10
	$('#txt_email').focus(function(){
		var controlID = $(this).attr("id");
        var spanID = controlID + "spanEle";
		$("#" + spanID).remove();
	});
});
</script> 
    <form action="projectslist.php" method="post"  name="frm_login" id="frm_login" onSubmit="return loginValidation();" autocomplete="off">
    	<input type="hidden"  name="action" value="login">	
        <div class="logininnerbox">
            <a class="_logo " style="text-align:center;color:white;font-size:25px;font-weight:bold" >LOGIN</a>
            <div class="spacer"></div>
            <div class="useridtbcon"><input name="id" id="txt_email" type="text" onKeyUp="val_xss(this);" class="textbox removeIECross" value="User Id or Email Id"  onBlur="if(this.value==''){this.value = 'User Id or Email Id';this.style.color='#757575';}" onFocus="if(this.value == 'User Id or Email Id'){this.value ='';this.style.color='#000';}" autocomplete="off" style="color:#5B5B5B;"></div>
       
            <div class="passwordtbcon"><input name="pass" id="txt_password" onKeyUp="val_xss(this);" type="text" class="textbox removeIECross" autocomplete="off"  value="Password" style="color:#5B5B5B;"></div>
         
            <div class="loginbtndiv" align="right">
            <input type="submit" value="Login" name="log" class="web-button2 _logout" />
            <div class="forgotpwd">
            
            </div>            
            </div>             
            <div class="spacer1"></div>  
            
	    <div class="error_class3 req_msg" style="display:<?php  echo ($sucessres==1)?"":"none"; ?>;">Failed Login
		    </div>
	<div class="error_class2" style="display:none"></div>
    </div>  	
    </form>
    <div class="spacer1"></div>   
</body>
</html>
