//calculator BMI function
function BMI_calc () {
	const height = document.querySelector ("#height").value; //retrieves the height input
	const weight = document.querySelector ("#weight").value; //retrieves the weight input
	const new_height = Math.pow (height, 2); //squares the height
	const total = 703 * (weight/new_height); //equation for BMI
	let output = document.getElementById("calc_BMI"); //retrieves output square
	//if BMI is under 18.5
	if (total < 18.5) {
		output.innerHTML = "Your BMI is: " + total.toFixed(1) + "<br>" + "Your BMI shows that you are underweight";
	}
	//if BMI is equal or over 18.5 but under or equal to 24.9
	if (total >= 18.5 && total <= 24.9) {
		output.innerHTML = "Your BMI is: " + total.toFixed(1) + "<br>" + "Your BMI shows that you are at a healthy weight";
	}
	//if BMI is equal or over 25.0 but under or equal to 29.9
	if (total >= 25.0 && total <= 29.9) {
		output.innerHTML = "Your BMI is: " + total.toFixed(1) + "<br>" + "Your BMI shows that you are overweight";
	}
	//if BMI is over or equal to 30.0
	if (total >= 30.0) {
		output.innerHTML = "Your BMI is: " + total.toFixed(1) + "<br>" + "Your BMI shows that you are obese";
	}
	//if height value has not been entered, display error message
	if (!height){
		document.querySelector("#height").classList.add("error");
        document.getElementById("height").style.borderColor = "red"; //turns error box red
        //error message
        document.getElementById("height").insertAdjacentHTML("afterend", "<font color = red>Please insert a value.");
        error = true;
	}
	//if weight value has not been entered, display error message
	if (!weight){
		document.querySelector("#weight").classList.add("error");
        document.getElementById("weight").style.borderColor = "red"; //turns error box red
        //error message
        document.getElementById("weight").insertAdjacentHTML("afterend", "<font color = red>Please insert a value.");
        error = true;
	}
	if (error) {
        return false;
    }
}
let bmi = document.getElementById("bmi_btn"); //let the variable bmi represent the button for bmi calculations
bmi.addEventListener("click", BMI_calc); //activate the bmi calculation when the button is clicked

//calculate BMR function
function BMR_calc () {
	const height2 = document.querySelector ("#height2").value; //retrieves the height input
	const weight2 = document.querySelector ("#weight2").value; //retrieves the weight input
	const age = document.querySelector ("#age").value; //retrieves the age input
	const male = document.getElementById("Male"); //retrieves the male radio button
	const female = document.getElementById("Female"); //retrieves the female radio button
	let output2 = document.getElementById("calc_BMR"); //retrieves output square
	//if male button has been clicked
	if (male.checked) {
		//formula for male bmr
		const men_total = 66 + ( 6.2 * weight2) + ( 12.7 * height2) - ( 6.76 * age);
		output2.innerHTML = "Your BMR is: " + men_total.toFixed(2) + " Calories/day";
	}
	//if female button has been clicked
	else if (female.checked) {
		//formula for female bmr
		const female_total = 655.1 + ( 4.35 * weight2) + ( 4.7 * height2) - ( 4.7 * age);
		output2.innerHTML = "Your BMR is: " + female_total.toFixed(2) + " Calories/day";
	}
	
	//if age value has not been entered, display error message
	if (!age){
		document.querySelector("#age").classList.add("error");
        document.getElementById("age").style.borderColor = "red"; //turns error box red
        //error message
        document.getElementById("age").insertAdjacentHTML("afterend", "<font color = red>Please insert a value.");
        error = true;
	}
	//if height value has not been entered, display error message
	if (!height2){
		document.querySelector("#height2").classList.add("error");
        document.getElementById("height2").style.borderColor = "red"; //turns error box red
        //error message
        document.getElementById("height2").insertAdjacentHTML("afterend", "<font color = red>Please insert a value.");
        error = true;
	}
	//if weight value has not been entered, display error message
	if (!weight2){
		document.querySelector("#weight2").classList.add("error");
        document.getElementById("weight2").style.borderColor = "red"; //turns error box red
        //error message
        document.getElementById("weight2").insertAdjacentHTML("afterend", "<font color = red>Please insert a value.");
        error = true;
	}
	//if either male or female button has not been selected, display error message
	if (!female.checked && !male.checked){
		document.querySelector("#gender").classList.add("error");
        document.getElementById("gender").style.borderColor = "red"; //turns error box red
        //error message
        document.getElementById("gender").insertAdjacentHTML("afterend", "<font color = red>Please select a gender.");
        error = true;
	}
	if (error) {
        return false;
    }
}
let bmr = document.getElementById("bmr_btn"); //let the variable bmr represent the button for bmr calculations
bmr.addEventListener("click", BMR_calc); //activate the bmr calculation when the button is clicked