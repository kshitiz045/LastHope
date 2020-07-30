function validateFirstName () 
{
	var fname = document.getElementById("firstname").value;
	var  re1 = /^[a-zA-Z\s\'\-]{2,15}$/ ;

	if (re1.test(fname))
	{
		document.getElementById("firstNamePrompt").style.color="green";
		document.getElementById("firstNamePrompt").innerHTML = "<strong>valid</strong>";
		return true ;
	}
	else
	{ 
		document.getElementById("firstNamePrompt").style.color = "red";
		document.getElementById("firstNamePrompt").innerHTML = "<strong>Enter 2-15 character name</strong>";
		return false;
	}
}

function validateLastName () 
{
	var lname = document.getElementById("lastname").value;
	var  re2 = /^[a-zA-Z\s\'\-]{2,15}$/;

	if (re2.test(lname))
	{
		document.getElementById("lastNamePrompt").style.color="green";
		document.getElementById("lastNamePrompt").innerHTML = "<strong>valid</strong>";
		return true ;
	}
	else
	{ 
		document.getElementById("lastNamePrompt").style.color = "red";
		document.getElementById("lastNamePrompt").innerHTML = "<strong>Enter 2-15 character name</strong>";
		return false;
	}
}




		
