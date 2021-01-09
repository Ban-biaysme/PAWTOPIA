
const submitBtn = document.getElementById('submitbtn2');
let userData;
var valid=true;

submitBtn.addEventListener('click', function () {
	if (checkForm()) {
		//Call PHP
		let jsonString = JSON.stringify(userData);
		//postData method called if there is any data then it will perform the below functions
		postData(jsonString, 'login-info.php').then(function(data){

			//data send from server and check the status. for successdful login user can see the feedbaxck details file.
			if(data['status'] === 'success') {		

				//If status successful then it redirect the user to the feedback details page
				window.open("booking.php");
			} else {
				alert("Please enter valid Username / password");
			}
		});
	}
});


function checkForm() {
	// test the fields in the form

	// User name: Required, at least two letter long
	var firstname = document.getElementById('username2').value;
	var name_msg = document.getElementById('name_msg2');
	var valid = true;

	if (firstname.length < 3) {
		name_msg.innerHTML = "Name should be at least 2 letter in length";
		name_msg.className = 'error';
		valid = false;
	}
	else {
		var firstname1 =firstname ;
		name_msg.innerHTML = "";
		name_msg.className = '';
	}


   // Password: Required, at least4 charecter long
	var password = document.getElementById('pwd2').value;
	var pwd_msg = document.getElementById('pwd_msg2');

	if (password.length < 4) {
		pwd_msg.innerHTML = "Password should be at least 4 character in length";
		pwd_msg.className = 'error';
		valid = false;
	}
	else {
		var password1= password;
		pwd_msg.innerHTML = "";
		pwd_msg.className = '';
	}
	
	//store the validated data in a key value format and then send then as a Json format to the server
	userData = {
		'userName': firstname1,
		'password': password1
	}

	return valid;
}

//send request to php with json data and url
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