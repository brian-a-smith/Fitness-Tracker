//change username function
function change_us() {
	var acc = document.getElementsByClassName("accordion");
	var i;
	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var panel = this.nextElementSibling;
	    if (panel.style.display === "block") {
	      panel.style.display = "none";
	    } 
	    else {
	      panel.style.display = "block";
	    }
  	});
	}
}
let ch_user = document.getElementById("ch_username"); //let the variable ch_user represent the button for changing the username
ch_user.addEventListener("click", change_us); //activate the function when the button is clicked
//change username function
function change_pa() {
	window.alert("change ")
}
let ch_password = document.getElementById("ch_password"); //let the variable ch_user represent the button for changing the username
ch_password.addEventListener("click", change_pa); //activate the function when the button is clicked

//delete account function
function del_account (){
	//window confirmation for deleting acount
	if (window.confirm ("Are you sure you want to delete your account?")){
		//notification window
		window.alert("Your account has been deleted");
	}	
}
let del = document.getElementById("del_username"); //let the variable bmr represent the button for deleting the account
del.addEventListener("click", del_account); //activate the bmr calculation when the button is clicked

