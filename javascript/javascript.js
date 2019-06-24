//Displaying months when scrolled
window.onscroll = function(){
	//console.log(window.scrollY);//This is how you get the number of pixels scrolled!! I spend a lot of time trying to find this shit...
	var scroll = window.scrollY;
	var month = document.querySelector('.months');
	var ul = document.getElementById('month_names');
	if(scroll > 100){//when the scrolling position is higher than 100 pixels:
		ul.style.display = 'block';
		month.style.height = "450px";
		
		
	}
	else {//When is lesser than 100 pixels:
		ul.style.display = 'none';
		month.style.height = "50px";

		
	}
}

//Displaying months when clicked
var monthText = document.querySelector(".books_year");
var ul = document.getElementById('month_names');
var scroll = window.scrollY;

monthText.onclick = function(){
	ul.style.display = 'block';
	
}
var url = window.location.href;
console.log(url);

//set animation year number
var yearUnit = document.querySelectorAll("#year-unit");

yearUnit[0].onclick = function yearDisplay(){
	setAttribute('id', 'year-display');
}
console.log(yearUnit);