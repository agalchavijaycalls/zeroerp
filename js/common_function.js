function check_organization(val)
{
	$.ajax({
			type: 'POST',
			url :'login/check_org',
			data:{val:val},
		  })	
		 .done(function(msg){
			 //alert(msg);
			 $("#chk_org").html(msg);
			 return false;
		 }); 
	return false;
}

function email_chek(val)
{
	$.ajax({
		type:'POST',
		url:'login/email_chek',
		data:{val:val},
	})
	.done(function(msg){
		$("#chk_org").html(msg);
	});
}

function email_forget(val)
{
	$.ajax({
		type:'POST',
		url:'login/email_forget',
		data:{val:val},
	})
	.done(function(msg){
		$("#chk_org").html(msg);
	});
}

function org_list(val)
{
	//alert(val);
	$.ajax({
		type: 'POST',
		url: 'login/org_list',
		data:{val:val},
	})
	.done(function(msg){
		alert(msg);
		$("#map-canvas").html(msg);
	});
}

function validation()
{
	var a= document.getElementById("passwd").value; 
	var b= document.getElementById("re-passwd").value;
	if(a==b)
	{
		return true;
	}
	else
	{
		alert("Password does not match");
		$("#passwd").focus();
		document.getElementById("passwd").value="";
		document.getElementById("re-passwd").value="";
		return false;
	}	
}

function userid(val)
{	
	var a= document.getElementById("username").value;
	if(a.match(' '))
		{
			alert('Don`t use space in user Name');
			document.getElementById("username").value="";
		}
	var c=/^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/;
	if(a.match(c))
		{
			alert('don`t use spacial charector');
			document.getElementById("username").value="";
		}
	
}

function emailid()
{	
	var a= document.getElementById("email").value;
	var email=/[^@]+@[^@]+\.[a-zA-Z]{2,}/;
	if(a.match(email))
		{
			alert('Please Enter Correct Email Address');
		}
}

function count(val)
{
	//alert("good eve");
	//alert(val);	
}