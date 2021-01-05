var formBtn = document.querySelector("#authorBtn");

formBtn.addEventListener("click", function(event){
	document.querySelector(".au-main").style.display = "block";
	var formSaveBtn = document.querySelector("#formSave");

	formSaveBtn.addEventListener("click", function(event){
		var blogID = this.dataset.blog;
 		var email = document.querySelector("#emailInput");
		var name = document.querySelector("#nameInput");
		var pass = document.querySelector("#passInput");
		var passRe = document.querySelector("#passReInput");
		var file = document.querySelector("#file").files[0];

		if(email.value === ''){
			document.querySelector("#emailError").innerHTML = "required field must not be blank!";
		}
		if(name.value === ''){
			document.querySelector("#nameError").innerHTML = "required field must not be blank!";
		}
		if(pass.value === ''){
			document.querySelector("#passError").innerHTML = "required field must not be blank!";
		}

		if(passRe.value === ''){
			document.querySelector("#passReError").innerHTML = "required field must not be blank!";
		}

		if(email.value && name.value && pass.value && passRe.value !==''){
			if(pass.value === passRe.value){
				if(pass.value.length > 4){
					//send ajax request
                
				}else{
					document.querySelector("#passReError").innerHTML = "Password is too short!";
				}
			}else{
				document.querySelector("#passReError").innerHTML = "Passsword does not match!";
            }
        }
	});
});
