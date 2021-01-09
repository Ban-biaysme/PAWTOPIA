
const submitBtn = document.getElementById('submitbtn1');
var valid=true;
let userData;

submitBtn.addEventListener('click', function () {
	if (checkForm2()) {
		
		//Call PHP
		let jsonString = JSON.stringify(userData);
		//postData(jsonString, 'register.php');	

		postData(jsonString, 'register.php').then(function(data){

			//data send from server and check the status. for successdful login user can see the feedback details file.
			if(data['status'] === 'success') {		

				//If status successful then it redirect the user to the feedback details page
				window.open("login.html");
			} else {
				alert("User name already exist!! please LOGIN.");
			}
		});

	}
});

function checkForm2() {
	// test the fields in the form

	// User name: Required, at least two letter long
	var uname = document.getElementById('username1').value;
	var name_msg = document.getElementById('name_msg1');
	 valid = true;

	if (uname.length < 3) {
		name_msg.innerHTML = "Name should be at least 2 letter in length";
		name_msg.className = 'error';	
		valid = false;

	}
	else {
		var uname1 =uname ;
		name_msg.innerHTML = "";
		name_msg.className = '';
	}



		// First name: Required, at least two letter long
		var fname = document.getElementById('fname').value;
		var lname_msg = document.getElementById('fname_msg');
	
		if (fname.length < 3) {
			fname_msg.innerHTML = "First Name should be at least 2 letter in length";
			fname_msg.className = 'error';	
			valid = false;
	
		}
		else {
			var fname1 =fname ;
			fname_msg.innerHTML = "";
			fname_msg.className = '';
		}
	

	// Family name: Required, at least two letter long
		var lname = document.getElementById('lname').value;
		var lname_msg = document.getElementById('lname_msg');
			
			if (lname.length < 3) {
				lname_msg.innerHTML = "Family Name should be at least 2 letter in length";
				lname_msg.className = 'error';	
				valid = false;
			
			}
			else {
				var lname1 =lname ;
				lname_msg.innerHTML = "";
				lname_msg.className = '';
			}


	//	EMAIL: is required, and must be valid email address
	var email = document.getElementById('email').value;
	var email_msg = document.getElementById('email_msg1');

	// regular expression for validation
	var emailRegExp = /^(\w+@[a-z\d]+?([a-z-\d_\.]*?)\.[a-z]{2,6})$/i;

	if (email == "" || !emailRegExp.test(email)) {
		email_msg.innerHTML = "Must be a valid email address.";
		email_msg.className = 'error';
		valid = false;
	}
	else {
		var email1=email;
		email_msg.innerHTML = "";
		email_msg.className = '';
	}


	// Password: Required, at least 4 charecter long
	var password = document.getElementById('pwd1').value;
	var pwd_msg = document.getElementById('pwd_msg1');

	if (password.length < 4) {
		pwd_msg.innerHTML = "password should be at least 4 characters in length";
		pwd_msg.className = 'error';
		valid = false;
	}
	else {
		var password1= password;
		pwd_msg.innerHTML = "";
		pwd_msg.className = '';
	}


	var cpassword = document.getElementById('cpwd').value;
	var pwd_msg2 = document.getElementById('cpwd_msg');

	if (password != cpassword) {
		pwd_msg2.innerHTML = "Confirm Password does not matched";
		pwd_msg2.className = 'error';
		valid = false;
	}
	else {
		pwd_msg2.innerHTML = "";
		pwd_msg2.className = '';
	}

	//send the valid data in a key value pair
	userData = {
		'userName': uname1,
		'password': password1,
		'fName': fname1,
		'lName': lname1,
		'email': email1
	}

	return valid;
}


async function postData(data, url) {
	const respose = await fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: data
	});
	return respose.json();
}