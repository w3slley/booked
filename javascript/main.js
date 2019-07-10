//Displaying months when scrolled
window.onscroll = function(){
	//console.log(window.scrollY);//This is how you get the number of pixels scrolled!! I spend a lot of time trying to find this shit...
	var scroll = window.scrollY;
	var month = document.querySelector('.months');
	var ul = document.getElementById('month_names');
	var nav = document.querySelector('.nav');
	
	if(scroll > 100){//when the scrolling position is higher than 100 pixels:
		ul.style.display = 'block';
		month.style.height = "500px";
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

function displayGrade(){
	//CLASSIFICATION SYSTEM
	let grade = document.querySelectorAll('.grade');
	let rating = document.querySelectorAll('.rating');


	for (let i=0; i<rating.length;i++){//loop that goes through the books
		if(grade[i].innerHTML >=0 & grade[i].innerHTML <= 50){//if the grade is between 0 and 50
			rating[i].style.backgroundColor = 'red';//background red
			rating[i].style.display = 'block';//it's displayed. In the css file the class .rating has the atribute display:none;
			
		}
		else if(grade[i].innerHTML > 50 & grade[i].innerHTML < 80){//if the grade is between 51 and 79
			rating[i].style.backgroundColor = 'orange';//orange background
			rating[i].style.display = 'block';//it's displayed
		}
		else if(grade[i].innerHTML >= 80 & grade[i].innerHTML <=100){//if grade is between 80 and 100
			rating[i].style.backgroundColor = 'green';//green background
			rating[i].style.display = 'block'; //it's displayed
		}

		if(grade[i].innerHTML == ''){//if doesn't have classification yet
			rating[i].style.display = 'none';//it's not displayed
		}
		
	}
}

//When page loads:
displayGrade();

//ADD BOOK MODAL
modal = document.querySelector('.modal');
modalContent = document.querySelector('.modal-content');
addBook = document.querySelector('.add-book');
addBook.onclick = function(){
	modal.style.display = 'block';
}


//EDIT MODAL USING AJAX
editModal = document.querySelector('.edit-modal');
editModalContent = document.querySelector('.edit-modal-content');

window.onclick = function(event){
	if(event.target == editModal){//if clicked outside the edit book modal content
		editModal.style.display = 'none';
		editModalContent.innerHTML = '';
	}
	else if(event.target == modal){//If clicked outside the add book modal content
		modal.style.display = 'none';
	}
}

window.onkeyup = function(event){
	if(event.keyCode == 27){
		editModal.style.display = 'none';
		editModalContent.innerHTML = '';
	}
}

function editReadingEvent($add_book_id){
	editModal.style.display = 'block';
	$.post('includes/edit_modal.php', {add_book_id: $add_book_id}, function(data){
		editModalContent.innerHTML = data;

		//AJAX in EDIT SECTION

		let title = document.querySelector('.edit_title_name');
		let author = document.querySelector('.edit_authors_name');
		let category = document.querySelector('.edit_category_name');
		let month = document.querySelector('.month_edit');
		let year = document.querySelector('.edit_year_number');
		let classificationEdit = document.querySelector('.classification_input');
		let addBookIdEdit = document.querySelector('.add_book_id_input'); 

		//let url = window.location.search;
		
		//update info
		title.onkeyup = function(){
			$.post('includes/edit_book.php', {addBookId: addBookIdEdit.value, title: title.value}, function(){
				$.post('includes/refresh_page.php', {year: year.innerHTML}, function(data){
					$('.books').html(data);
					displayGrade();
				});
				
				
			});
		}
		author.onkeyup = function(){
			$.post('includes/edit_book.php', {addBookId: addBookIdEdit.value, author: author.value}, function(){
				$.post('includes/refresh_page.php', {year: year.innerHTML}, function(data){
					$('.books').html(data);
					displayGrade();
				});
				
			});
		}
		

		month.onchange = function(){

			$.post('includes/edit_book.php', {addBookId: addBookIdEdit.value, month: month.value}, function(){
				$.post('includes/refresh_page.php', {year: year.innerHTML}, function(data){
					$('.books').html(data);
					displayGrade();
				});
				
			});
		}

		classificationEdit.onkeyup = function(){
			$.post('includes/edit_book.php', {addBookId: addBookIdEdit.value, classification: classificationEdit.value}, function(){
				$.post('includes/refresh_page.php', {year: year.innerHTML}, function(data){
					$('.books').html(data);
					displayGrade();
				});
				
			});
		}

		//refresh initial page
		
	
	});

	
}