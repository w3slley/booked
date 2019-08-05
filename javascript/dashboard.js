//Add book into DB
$('.nav-add').on('submit', function(event){
	event.preventDefault();
	$('.message').html('');
	let bookTitle = $('.book-title').val();
	let authorName = $('.author-name').val();
	let category = $('.category').val();
	let month = $('.month_nav').val();
	let year = $('.year').val();
	let classification = parseInt($('.classification').val());

	let loadingModal = $('.loading-modal');
	loadingModal[0].style.display = "flex";


	$.post('includes/add_book.inc.php', {book:bookTitle, author:authorName, category:category, month:month, year:year, classification: classification}, function(data){
		$('.message').html(data);
		loadingModal[0].style.display = "none";
		window.location = "initial_page.php?year="+data;
	});

});

//ADD BOOK MODAL
modal = document.querySelector('.modal');
modalContent = document.querySelector('.modal-content');
addBook = document.querySelector('.add-book');
addBook.onclick = function(){
	modal.style.display = 'block';
}
window.onclick = function(event){
	if(event.target == modal){
		modal.style.display = 'none';
	}
}

let close = $('.close');
close.on('click', function(){
	modal.style.display = 'none';
	
});