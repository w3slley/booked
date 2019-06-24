//Displaying months when scrolled
window.onscroll = function(){
	//console.log(window.scrollY);//This is how you get the number of pixels scrolled!! I spend a lot of time trying to find this shit...
	var scroll = window.scrollY;
	var month = document.querySelector('.months');
	var ul = document.getElementById('month_names');
	var nav = document.querySelector('.nav');
	
	if(scroll > 100){//when the scrolling position is higher than 100 pixels:
		ul.style.display = 'block';
		month.style.height = "450px";
		nav.style.boxShadow = "0px 2px 5px -2px rgb(85, 82, 82)";
		
		
	}
	else {//When is lesser than 100 pixels:
		ul.style.display = 'none';
		month.style.height = "50px";
		nav.style.boxShadow = 'none';

		
	}
}



//set animation year number
var yearUnit = document.querySelectorAll("#year-unit");

yearUnit[0].onclick = function yearDisplay(){
	setAttribute('id', 'year-display');
}
