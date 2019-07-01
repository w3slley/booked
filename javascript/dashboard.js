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