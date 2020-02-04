from urllib.request import Request, urlopen
import urllib.request
from unicodedata import normalize
import sys

def remover_acentos(txt):
    return normalize('NFKD', txt).encode('ASCII', 'ignore').decode('ASCII') #This function removes all the special characteres from a string(acentos)

book =  sys.argv[1]    	#By using sys.argv[1] I can insert a variable from the PHP file to be inserted here!!! 
author_name = sys.argv[2]	#This is the second variable on PHP!
data = book +" "+ author_name  	#This is the the name of the book and the name of the author.
book_title = remover_acentos(data)  #This will remove any special character (acentos) from the data variable.
search_book = book_title.replace(" ", "+")


def get_img_url (search_book): #This function gets the url of image of the books's cover.
    url_google = "https://www.google.com/search?q="+search_book+"+goodreads&sourceid=chrome&ie=UTF-8"
    #insert the desired book to search into google's search url

    req = Request(url_google, headers={'User-Agent': 'Mozilla/5.0'}) #makes connection with the website (secure way using the headers)
    webpage = urlopen(req).read() #takes the google search html files and reads it
    page = str(webpage, 'utf-8') #transforms the file from byte type to string.

    link_init = page.find('https://www.goodreads.com/book/show/') #find the first position of the url of the book on goodreads (where I want to get the image from)
    link_final = page.find('&', link_init+10) #get the final position

    url_book = page[link_init:link_final] #gets the url of the books link on goodreads.

    req = Request(url_book, headers={'User-Agent': 'Mozilla/5.0'}) #Do it again to get the image url
    book_page = urlopen(req).read()
    page_book = str(book_page, 'utf-8')

    link_book_init = page_book.find('<img src=')
    link_book_final = page_book.find('"', link_book_init + 10)

    book_url_img = page_book[link_book_init + 10 : link_book_final] #this is the url of the image!!
    return(book_url_img)


url = get_img_url(search_book) 
print(url)
#location = '/var/www/html/booked/bookcovers/bookcover'+sys.argv[3]+'.jpg' #argument three is the id of the book - bookId!
#urllib.request.urlretrieve(url, location) 
#THIS IS HOW YOU DOWNLOAD IMAGE USING PYTHON!

