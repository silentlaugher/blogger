var formBtn = document.querySelector("#saveProfileBtn");

formBtn.addEventListener("click", function(event){
    var email = document.querySelector("#editEmail");
	var name = document.querySelector("#editDisplayName");
    var file = document.querySelector("#editProfile").files[0];
    
	if(email.value === ""){
		document.querySelector("#editEmailError").innerHTML = "Requried fields  must not be blank!";
    }
    
    if(name.value === ""){
		document.querySelector("#displayNameError").innerHTML = "Requried fields must not be blank!";
    }
    
    if(name.value && email.value !== ""){
		var blogID = this.dataset.blog;
		var formData = new FormData();
		formData.append("blogID", blogID);
		formData.append("email", email.value);
		formData.append("name", name.value);
		formData.append("file", file);

		var httpRequest = new XMLHttpRequest();

		if(httpRequest){
			httpRequest.open('POST', 'http://localhost/blogger/backend/ajax/editProfile.php', true);
			httpRequest.onreadystatechange = function(){
				if(this.readyState === 4 && this.status === 200){
					if(this.responseText.length != 0){
						alert(this.responseText);
					}
					location.reload(true);
				}
			}

			httpRequest.send(formData);
		}	
	}
});