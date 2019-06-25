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

//Animation of buttons inside box.
let editButton = document.querySelectorAll('#button_books_box');
let deleteButton = document.querySelectorAll('.delete_book_button');
let box = document.querySelectorAll('.box');



//Function that deletes reading event from DB
function deleteBook(id, year){
	let q = confirm("If you really want to delete this book from your list, press OK.");//User is asked if really want to exclude the book
	if(q == true){ //If positive,
		$.post('includes/delete_book.php', {add_book_id: id, year: year}, function(data){ //sends data via Ajax to file delete_book.php where the "reading event" (still need to find a way to call this) will be deleted
		
			window.location = 'initial_page.php?year='+data+'&del=success'; //Gets one data from the php file and it's the last year the user has. Then, the user will be redirected for the page of the books read in the last year.
			
		});
	}
}


//ADD AND DELETE BOOKCOVER USING JQUERY
let addBookId = $('.add_book_id_input').val();
let bookId = $('.book_id_input').val();
//DELETE
$('.delete_cover').click(function(e){
	e.preventDefault();
	$.post('includes/delete_bookcover.php', {add_book_id: addBookId, book_id: bookId}, function(data){
		alert('The bookcover was deleted!');
		window.location = 'initial_page.php?edit=true&add_book='+addBookId+'&book_id='+bookId;
	});
	
});
//ADD
$('#add_cover').click(function(e){
	e.preventDefault();
	$.post('includes/add_bookcover.php', {add_book_id: addBookId, book_id: bookId}, function(data){
		alert('The bookcover was downloaded!');
		window.location = 'initial_page.php?edit=true&add_book='+addBookId+'&book_id='+bookId;
	});
});
