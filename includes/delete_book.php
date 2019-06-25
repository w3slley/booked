<?php
include "../classes/BookEvent.php";
//Procedure to delete the book from list:
if(isset($_POST['add_book_id'])){
    $add_book_id= $_POST['add_book_id'];
    $year = $_POST['year'];
    $event = new BookEvent();
    $last_year = $event->delete_book($add_book_id);

    $check_year = $event->find_year($year);
    if($check_year == True){
        echo $year;
    }
    else{
        echo $last_year;
    }
    //Right now, if the user deletes a book read in a particular year in which the user only read that one, then the page will redirect to the last year the user added books (the highest). If the user (which added books till the year 2020 for instance) read only one book in 2009 and deletes it, then it will go to the page of the year 2020.

   
    //display a message saying that the book was deleted!
}