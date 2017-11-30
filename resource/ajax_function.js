
// LOAD NEW ADMIN ADD FORM	
function login_popup() // Loading Adding form in lightbox while clicking the Plus Button
{	
	document.getElementById('add_form').style.display = 'block';
}

// FORM CLOSE
function login_popup_close() // Close Editing form 
{
	document.getElementById('add_form').style.display='none';
}


//  comment popup
function comment_popup(postId) // Load Student Edit Form with information
{
var xmlRequest = GetXmlHttpObject();
if (xmlRequest == null)
	return;
		
		var url="commentPopup/index/"+postId;

var browser=navigator.appName;
if (browser=="Microsoft Internet Explorer")
	{
		xmlRequest.open("POST",url, true);
	}
else
	{
		xmlRequest.open("GET",url, true);
	}
xmlRequest.setRequestHeader("Content-Type", "application/x-www-formurlencoded");
xmlRequest.onreadystatechange =function()
	{
		if(xmlRequest.readyState==4)
			{							
				HandleAjaxResponse_comment_popup(xmlRequest);
			}
	};
xmlRequest.send(null);			
return false;
}

function HandleAjaxResponse_comment_popup(xmlRequest)
{		
var xmlT=xmlRequest.responseText;
	document.getElementById("comment_popup").innerHTML=xmlT;
	document.getElementById('comment_popup').style.display='block';
	document.getElementById('fade').style.display='block'				
return false;
}


//ADMIN EDIT FORM CLOSE
function comment_popup_close() // Close Editing form 
{
	document.getElementById('comment_popup').style.display='none';
	document.getElementById('fade').style.display='none'
}

//nextSteap
function searchOrganization()
{	
	
	var organization = document.getElementById("organization").value;
	var program = document.getElementById("program").value;
	
	
	var xmlRequest = GetXmlHttpObject();
	if (xmlRequest == null)
    return;
	
		var url="home/searchByOrganization/"+organization+"/"+program;
		
    	var browser=navigator.appName;
		if (browser=="Microsoft Internet Explorer")
		{
			xmlRequest.open("POST",url, true);
		}
		else
		{
			xmlRequest.open("GET",url, true);
		}
		
		xmlRequest.setRequestHeader("Content-Type", "application/x-www-formurlencoded");
		xmlRequest.onreadystatechange =function()
		{
			if(xmlRequest.readyState==4)
			{
				HandleAjaxResponse_searchOrganization(xmlRequest);
			}
		};
			xmlRequest.send(null);
			return false;
}

function HandleAjaxResponse_searchOrganization(xmlRequest)
{
	var xmlT = xmlRequest.responseText;
	document.getElementById('searchOrganization').innerHTML = xmlT;
}

//SEARCH ALL APPLICANT
function findAppplicat()
{	
	var applicantName = document.getElementById("applicantName").value;
	var ageFrom = document.getElementById("ageFrom").value;
	var ageTo = document.getElementById("ageTo").value;
	var gender = document.getElementById("gender").value;
	var starcandidates = document.getElementById("starcandidates").value;
	
	
	var xmlRequest = GetXmlHttpObject();
	if (xmlRequest == null)
    return;
	
		var url="organizationUserHome/searchAllApplicant/"+applicantName/"+ageFrom+"/"+ageTo+"/"+gender+"/"+starcandidates;
		
    	var browser=navigator.appName;
		if (browser=="Microsoft Internet Explorer")
		{
			xmlRequest.open("POST",url, true);
		}
		else
		{
			xmlRequest.open("GET",url, true);
		}
		
		xmlRequest.setRequestHeader("Content-Type", "application/x-www-formurlencoded");
		xmlRequest.onreadystatechange =function()
		{
			if(xmlRequest.readyState==4)
			{
				HandleAjaxResponse_findAppplicat(xmlRequest);
			}
		};
			xmlRequest.send(null);
			return false;
}

function HandleAjaxResponse_findAppplicat(xmlRequest)
{
	var xmlT = xmlRequest.responseText;
	document.getElementById('viewReport').innerHTML = xmlT;
}


// DELETE ADMIN
function shortList()
{	
	var selected_short_array = document.getElementsByName("applicant_id[]");

	var action_array = new Array();
	
	l = selected_short_array.length;
	var j=0;
	for (var i=0; i<l ; i++)
	{
		if(selected_short_array[i].checked == true)
		{			
			action_array[j++] = selected_short_array[i].value;
		}
	}

	al = action_array.length;
	
	if(al == 0)
	{
		alert("Please Tick at least one Check Box.");
		return false;

	} else {
	
	var confirmation = confirm("Sure to ShortList Them ?");

	if(confirmation)
	{
		shortList_action();
		
	} else {
	
		return false;
	}
}
}

	function shortList_action() // Delete Student.
{	
	var selected_short_array = document.getElementsByName("applicant_id[]");

	var action_array = new Array();

	l = selected_short_array.length;
	var j=0;
	for (var i=0; i<l ; i++)
		{
			if(selected_short_array[i].checked == true)
			{			
				action_array[j++] = selected_short_array[i].value;
			}
		}
	
	var xmlRequest = GetXmlHttpObject();
	if (xmlRequest == null)
	return;
	//var url="admin_delete.php?admin_user="+action_array;
	var url="OrganizationUserHome/shortListAction/"+action_array;

	var browser=navigator.appName;
	if (browser=="Microsoft Internet Explorer")
	{
		xmlRequest.open("POST",url, true);
	}
else
	{
		xmlRequest.open("GET",url, true);
	}
xmlRequest.setRequestHeader("Content-Type", "application/x-www-formurlencoded");
xmlRequest.onreadystatechange =function()
	{
		if(xmlRequest.readyState==4)
		{							
			HandleAjaxResponse_shortList_action(xmlRequest);
		}
	};
xmlRequest.send(null);
return false;
}

function HandleAjaxResponse_shortList_action(xmlRequest)
{
	var xmlT=xmlRequest.responseText;
	//only_admin_user_manage_list();
	return false;
}


//<<<<<<<<<<<<<<<<<********************************************************>>>>>>>>>>>>>>\\

			//********OBJECT FUNCTION**********//

//<<<<<<<<<<<<<<<<*********************************************************>>>>>>>>>>>>>>\\



function GetXmlHttpObject()
{		
	var xmlHttp=null;
	try
	{
	   xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		// Internet Explorer
		try
			{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		catch (e)
			{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			}
	}
	return xmlHttp;
  
}