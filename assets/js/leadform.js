// JavaScript Document
var edit = 0;
var contId = '';
var secId = '';

editContId = '';
editInnerContId = '';

var hdn1 = new Array();
var hdn2 = new Array();
var progressWidth = 0;
$(".savenext").click(function(){
	/*####################### Checking the validations ###############################################################*/
	if(validation((this.id).split('-')[1])) {
		if(!edit) {
			contId = $('#'+(this.id)).prop("title");
			secId = ($('#'+($('#'+this.closest('div').id).parent("div").prop("id"))).next().prop("id"));
		}
		/*####################### FILL THE LEFT CONTAINERS ###########################################################*/
		fillLeftContainer(this.id); 
		/*####################### END ################################################################################*/
		/*####################### MEMORY STORED THE CONTAINERID, SECTIONID OR NEW SECTIONID ##########################*/
		/*#######################  ################################*/
		var container_id = $('#'+(this.id)).prop("title")+'-container';
		var pid = ($('#'+this.closest('div').id).parent("div").prop("id"));
		var nid = ($('#'+pid).next().prop("id"));
		/*####################### END ################################################################################*/
		/*####################### EDIT SAVE THE SECTION ##############################################################*/
		if(edit) {
			edit = 0;
			$("#"+editContId+'-container').delay(1000).fadeOut(1000);
			$("#"+editInnerContId+'').delay(1000).fadeOut(1000);
			//var next_container_id = ($('#'+contId).next().prop("id"));
			$("#"+contId+'-container').delay(1000).fadeIn(1000);
			$('#container-heading').html($('#'+contId+'-container-heading').html());
			$('.editedCls').css('display','block');
			if(secId.length) {
				$("#"+secId).delay(1000).fadeIn(1000);
			}
		}
		/*####################### END ################################################################################*/
		/*####################### SAVE THE SECTION ##############################################################*/
		else {
			if(nid){
				$("#"+pid).fadeOut(1000);
				$("#"+nid).delay(1000).fadeIn(1000);
			}
			else {
				progressWidth += 20;
				$('.progress-bar').css('width',progressWidth+'%');
				$('.progress-bar').html(progressWidth+'%');
				var next_container_id =  ($('#'+container_id).next().prop("id"));
				//alert(next_container_id);
				$('#container-heading').html($('#'+next_container_id+'-heading').html());
				$("#"+pid).fadeOut(1000);
				$("#"+container_id).fadeOut(1000);
				$("#"+next_container_id).delay(1000).fadeIn(1000);
				$("#"+nid).delay(2000).fadeIn(1000);
				var nci_arr = next_container_id.split('-');
				contId = nci_arr[0];
			}
		}
	}
});
function validation(str) {
	switch(str) {
		case 'name':
		if($('#first_name').val() == '') {
			$( "#first_name" ).focus();
			return false;
		}
		if($('#last_name').val() == '') {
			$( "#last_name" ).focus();
			return false;
		}
		hdn1[0] = 'first_name';
		hdn1[1] = $('#first_name').val();
		hdn2[0] = 'last_name';
		hdn2[1] = $('#last_name').val();
		return true;
		break;
		case 'dob':
		if($('#dob').val() == '') {
			$( "#dob" ).focus();
			return false;
		}
		return true;
		break;
		case 'gender':
		if($('#gender').val()) {
			return true;
		}
		return true;
		break;
		case 'email':
		if($('#email').val()==0) {
			$( "#email" ).focus();
			return false;
		}
		if($('#email_val').val()==0) {
			$( "#email" ).focus();
			return false;
		}
		if($('#pin').val()==0) {
			$( "#pin" ).focus();
			return false;
		}
		if($('#pin_val').val()==0) {
			$( "#pin" ).focus();
			return false;
		}
		return true;
		break;
		case 'mobile':
		if($('#mobile').val()==0) {
			$( "#mobile" ).focus();
			return false;
		}
		if($('#username').val()==0) {
			$( "#username" ).focus();
			return false;
		}
		if($('#username_val').val()==0) {
			$( "#username" ).focus();
			return false;
		}
		return true;
		break;
		case 'address':
		if($('#address').val()=='') {
			$( "#address" ).focus();
			return false;
		}
		return true;
		break;
		case 'country':
		if($('#country').val()==0) {
			$( "#country" ).focus();
			return false;
		}
		return true;
		break;
		case 'state':
		if($('#state').val()==0) {
			$( "#state" ).focus();
			return false;
		}
		return true;
		break;
		case 'city':
		if($('#city').val()==0) {
			$( "#city" ).focus();
			return false;
		}
		return true;
		break;
		case 'zip':
		if($('#zip').val()==0) {
			$( "#zip" ).focus();
			return false;
		}
		return true;
		break;
		default:
		return true;
	}
}
function parentCategory(val,id) { 
//alert(id);
$('#aaatext'+id).nextAll(".rmDiv").remove();

	if(Number(val) !=0) {
		//var urls = "http://localhost/compareTree/index.php/leads/ajax2?id="+val;
		var urls = baseUrl+"/leads/ajax2?id="+val;
		//alert(urls);
		$.ajax({
			url: urls,
			type:'POST',
			//	dataType: 'json',
			error: function(){
				$('#datad').html('<p>goodbye world</p>');
			},
			success: function(results){
				$('#datad').append(results );		
			} // End of success function of ajax form
		}); // End of ajax call
	}
}
function fillState(country_id) {
	if(Number(country_id) !=0) {
		var urls = baseUrl+"/leads/fillState?id="+country_id;
		alert(urls);
		//alert(urls);
		$.ajax({
			url: urls,
			type:'POST',
			//	dataType: 'json',
			error: function(){
				$('#datad').html('<p>goodbye world</p>');
			},
			success: function(results){
				$('#state').html(results );		
			} // End of success function of ajax form
		}); // End of ajax call
	}
}
var num = 0; var d = 0; var g = 0;
function checkDob(str) {
	if(Number(str.length)<4) {
		str = checkNum(str);
		$('#dob').val(str);
	}
	else if(Number(str.length)==4) {
		str = checkNum(str);
		if(str) {
		$('#dob').val(str+'-');
		}
	}
	else if(Number(str.length)>=5 && Number(str.length)<8) {
		var c = str.split('-');
		var c1 = checkNum(c[0]);
		var c2 = checkNum1(c[1]);
		var str1 = c[0]+''+c[1];
		//alert(((str1)).length);
		if(str1.length<6){
			if(c2)
			$('#dob').val(c1+'-'+c2);
			else
			$('#dob').val(c1);
		}
		else if((str1.length)==6) {
			if(c2)
			$('#dob').val((c1.substring(0,4))+'-'+(c2.substring(0,2))+'-');
			else
			$('#dob').val((c1.substring(0,4))+'-'+(c2.substring(0,2)));
		}
	}
	else if(Number(str.length)>=8 && Number(str.length)<11) {
		var c = str.split('-');
		var c1 = checkNum(c[0]);
		var c2 = checkNum1(c[1]);
		var c3 = checkNum2(c[2]);
		var str1 = c[0]+''+c[1];
		//alert(c1+'#'+c2+'#'+c3+'#'+c2.substring(0,2)+'#'+c3.length);
		if(c3.length) {
			$('#dob').val((c1.substring(0,4))+'-'+(c2.substring(0,2))+'-'+(c3.substring(0,2)));
		}else {
			$('#dob').val((c1.substring(0,4))+'-'+(c2.substring(0,2))+'-');
		}
	}
	
}
function checkNum(str) {	
	if(str*10) {
		if(str.length == 4 ) {
			if( str > 1900 && str < 2017) {
				num = str;
			}
			else {
				alert('Year between 1900 - 2017');
				str = '';$('#dob').val('');
			}
		}
		else {
			num = str;
		}
		
		//num = str;
	}
	else {
		str = num;
	}
	return str;
}
function checkNum1(str) {	
	if(str*10) {
		if(str.length == 2 ) {
			if( str > 0 && str < 13) {
				d = str;
			}
			else {
				alert('month between 1 - 12');
				str = '';
			}
		}
		else {
			d = str;
		}
		d = str;
	}
	else {
		str = d;
	}
	return str;
}
function checkNum2(str) {	
	if(str*10) {
		if(str.length == 2 ) {
			if( str > 0 && str < 32) {
				g = str;
			}
			else {
				alert('day between 1 - 31');
				str = '';
			}
		}
		else {
			g = str;
		}
	}
	else {
		str = g;
	}
	return str;
}

$("input").keyup(function(){
	if(!hdn1[0] || hdn1[0]==this.id) {
		hdn1[0] = this.id;
		hdn1[1] = $('#'+(this.id)).val();
	//alert(hdn1);
	}
	else {
		hdn2[0] = this.id;
		hdn2[1] = $('#'+(this.id)).val();
	//alert(hdn2);		
	}
    //$("input").css("background-color", "pink");
});
$("select").change(function() {
		if(!hdn1[0] || hdn1[0]==this.id) {
			hdn1[0] = this.id;
			hdn1[1] = $('#'+(this.id)+' option:selected').text();
		}
		else {
			hdn2[0] = this.id;
			hdn2[1] = $('#'+(this.id)+' option:selected').text();
		//alert(hdn2);		
		}
        //alert($('#'+this.id).val());
});
$(".radio").change(function() {
	hdn1[0] = this.name;
	hdn1[1] = $('#'+(this.id)).val();
});
function genFunc(str) {
	//alert(str);
	hdn1[0] = str;
	hdn1[1] = $('#'+(str)).val();
}
function fillLeftContainer(str) {
	var name = str.split('-');
	if(hdn1[0]) {
		if($('#li-'+hdn1[0]).length) {
			//alert('#li-'+hdn1[0]);
			$('#li-'+hdn1[0]).html('<b>'+name[1]+': </b><span id="s-first-name">&nbsp;&nbsp;'+((hdn1[1])?(hdn1[1]):(''))+' '+((hdn2[1])?(hdn2[1]):(''))+' </span>&nbsp;&nbsp;<i class="editedCls fa fa-pencil" onclick=editCls123("'+str+'")></i>');
		}
		else {
			//alert(contId);
			$('#ul-'+contId).append('<li id="li-'+hdn1[0]+'"></li>');
			$('#li-'+hdn1[0]).html('<b>'+name[1]+' : </b><span id="s-first-name">&nbsp;&nbsp;'+((hdn1[1])?(hdn1[1]):(''))+' '+((hdn2[1])?(hdn2[1]):(''))+'</span>&nbsp;&nbsp;<i class="editedCls fa fa-pencil" onclick=editCls123("'+str+'")></i>');
		}
	}
	hdn1[0] = 0;hdn1[1] = 0;hdn2[0] = 0;hdn2[1] = 0;
}
function editCls123(str) {
	edit = 1;
	var arr = new Array();
	arr = str.split('-');
	if(editContId.length) {//00971552312913
		$('#'+editContId).css('display','none');
	}
	if(editInnerContId.length) {
		$('#'+editInnerContId+'-container').css('display','none');
	}
	editContId = arr[0];
	editInnerContId = arr[0]+'-'+arr[1];
	$('#'+contId+'-container').css('display','none');
	$('#'+secId).css('display','none');
	
	$('#'+arr[0]+'-container').css('display','block');
	$('#'+arr[0]+'-'+arr[1]).css('display','block');
	$('#container-heading').html($('#'+arr[0]+'-container-heading').html());
	$('.editedCls').css('display','none');
}
function checkEmail(email) {
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
	  var sUrl = 'http://localhost/compare/index.php/customer/checkEmail?email='+email;
	  //alert(sUrl);
	$.ajax({
		url: sUrl,
		type:'POST',		
		//	dataType: 'json',
		error: function(){
			//$('#datad').html('<p>goodbye world</p>');
		},		
		success: function(data){
			if(data=="error") {
				//alert('error');
			} 
			else {
					$('#email_txt').html(data);
					if(data == 'Available') {
						$('#email_val').val(1);
					}
					else {
						$('#email_val').val(0);
						$('#email').focus();
					}
					return true;
				//alert('http://localhost/compare/assets/'+(comp.logo));
			}
		} // End of success function of ajax form
	});
    
  }
  else {
    $('#email_txt').html("You have entered an invalid email address!");
    return (false);
  }

}
function checkUsername(username) {
	  var sUrl = 'http://localhost/compare/index.php/customer/checkUsername?username='+username;
	$.ajax({
		url: sUrl,
		type:'POST',		
		//	dataType: 'json',
		error: function(){
			//$('#datad').html('<p>goodbye world</p>');
		},		
		success: function(data){
			if(data=="error") {
				//alert('error');
			} 
			else {
					$('#username_txt').html(data);
					//alert($('#username_val').val());
					if(data == 'Available') {
						$('#username_val').val('1');
					}
					else {
						$('#username_val').val('0');
						$('#username').focus();
					}
				//alert('http://localhost/compare/assets/'+(comp.logo));
			}
		} // End of success function of ajax form
	});
    return (true);

}
var pinText = 0;
function sendPin() {
	$('#sendPin_btn').css('display','none');$('#pin_txt').val('Check your email and fill the pin for validate your email');
	 var sUrl = 'http://localhost/compare/index.php/customer/sendPinToEmail?email='+($('#email').val());
	$.ajax({
		url: sUrl,
		type:'POST',		
		//	dataType: 'json',
		error: function(){
			//$('#datad').html('<p>goodbye world</p>');
		},		
		success: function(data){
			if(data=="error") {
				//alert('error');
			} 
			else {
				alert(data);
				$('#sendPin_btn').css('display','block');
				pinText = data;
				//alert($('#username_val').val());
				$('#pin_txt').val('Check your email and fill the pin for validate your email');
			}
		} // End of success function of ajax form
	});
    return (true);
}
function validatePin() {
	//alert(pinText+" "+$('#pin').val());
	if(pinText==($('#pin').val())) {
		$('#pin_txt').html('Verified.');
		$('#pin_val').val(1);
	}
	else {
		$('#pin_txt').html('Not Verified.');
		$('#pin_val').val(0);
	}
}