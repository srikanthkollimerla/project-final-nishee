// JavaScript Document
function validateEmailAddress(email_id){
	 var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	 if(!email_id.match(emailExp)){
		return false;
	}	
}
function validateUrl(url){
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(url);
}
function slowMotion(){
	$("body").css("display", "none");		
	$("body").fadeIn(800); 	
}
//This function is for XSS script
function val_xss(xss){ 
	var maintainplus = '';
	var numval = xss.value
	curphonevar = numval.replace(/[\\!"£$%^&*+={};:'#~,¦\/<>?|`¬\]\[]/g,'');
	xss.value = maintainplus + curphonevar;
	var maintainplus = '';
	xss.focus;
}
//edit record
function editRecord(id,page){
	document.frmedit.editId.value=id;
	document.frmedit.action = page;
	document.frmedit.submit();
}
//delete record
function deleteRecord(id,page){
	var delRecord = confirm('Are you sure you want to delete this record ?');
	if(delRecord){
		window.location.href=page+"?action=del&id="+id;
	}
}
//View Records
function viewRecord(id,page){
	document.frmedit.editId.value=id;
	document.frmedit.action = page;
	document.frmedit.submit();
}
//phone validation
//onKeyUp="validatephone(this);" 
function validatephone(contact) {
  var maintainplus = '';
  var numval = contact.value;
  if ( numval.charAt(0)=='+' ){ var maintainplus = '+';}
  curphonevar = numval.replace(/[\\A-Za-z!"£$%^&*+_={};:'@#~,.¦\/<>?|`¬\]\[]/g,'');
  contact.value = maintainplus + curphonevar;
  var maintainplus = '';
  contact.focus;
 }

//This function is for price validation
//onBlur="extractNumber(this,2,false)" onKeyUp="extractNumber(this,2,false);" onKeyPress="return blockNonNumbers(this, event, true, false);"
function extractNumber(obj, decimalPlaces, allowNegative)
{
	var temp = obj.value;
	
	// avoid changing things if already formatted correctly
	var reg0Str = '[0-9]*';
	if (decimalPlaces > 0) {
		reg0Str += '\\.?[0-9]{0,' + decimalPlaces + '}';
	} else if (decimalPlaces < 0) {
		reg0Str += '\\.?[0-9]*';
	}
	reg0Str = allowNegative ? '^-?' + reg0Str : '^' + reg0Str;
	reg0Str = reg0Str + '$';
	var reg0 = new RegExp(reg0Str);
	if (reg0.test(temp)) return true;

	// first replace all non numbers
	var reg1Str = '[^0-9' + (decimalPlaces != 0 ? '.' : '') + (allowNegative ? '-' : '') + ']';
	var reg1 = new RegExp(reg1Str, 'g');
	temp = temp.replace(reg1, '');

	if (allowNegative) {
		// replace extra negative
		var hasNegative = temp.length > 0 && temp.charAt(0) == '-';
		var reg2 = /-/g;
		temp = temp.replace(reg2, '');
		if (hasNegative) temp = '-' + temp;
	}
	
	if (decimalPlaces != 0) {
		var reg3 = /\./g;
		var reg3Array = reg3.exec(temp);
		if (reg3Array != null) {
			// keep only first occurrence of .
			//  and the number of places specified by decimalPlaces or the entire string if decimalPlaces < 0
			var reg3Right = temp.substring(reg3Array.index + reg3Array[0].length);
			reg3Right = reg3Right.replace(reg3, '');
			reg3Right = decimalPlaces > 0 ? reg3Right.substring(0, decimalPlaces) : reg3Right;
			temp = temp.substring(0,reg3Array.index) + '.' + reg3Right;
		}
	}
	
	obj.value = temp;
}



//This function is for only number validation
//onKeyPress="return onlyNumbers(event);"
function onlyNumbers(e)
{
	var browser = navigator.appName;
	
	if(browser == "Netscape"){
		var keycode = e.which;		
		if((keycode >=48 && keycode <=57) || keycode == 13 || keycode == 8 || keycode == 0)
			return true;
		else
			return false;
	}else{
		if((e.keyCode >=48 && e.keyCode<=57) || e.keycode == 13 || e.keycode == 8 || e.keycode == 0)
			e.returnValue=true;
		else
			e.returnValue=false;		
	}		
}

$(window).load(function(){
	setTimeout(function(){
		$('.error_class3').fadeOut('3000');	
	},3000);
});