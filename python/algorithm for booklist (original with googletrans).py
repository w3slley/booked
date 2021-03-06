from urllib.request import Request, urlopen
from googletrans import Translator
import urllib.request
from unicodedata import normalize
import sys

def remover_acentos(txt):
    return normalize('NFKD', txt).encode('ASCII', 'ignore').decode('ASCII') #This function removes all the special characteres from a string(acentos)

book =  sys.argv[1]+"+"    	#By using sys.argv[1] I can insert a variable from the PHP file to be inserted here!!! 
author_name = sys.argv[2]	#This is the second variable on PHP!
data = book +" "+ author_name  	#This is the the name of the book and the name of the author.
book_title = remover_acentos(data)  #This will remove any special character (acentos) from the data variable.
translator = Translator()
language = translator.detect(author_name) #This will detect the language of the book by analyzing the name of the author.
if language.lang == 'pt': #If the author is detected as a portuguese writer, then:
    search_book = book_title.replace(" ", "+") #the search term will be in portuguese.
 
elif language.lang == 'en':
    book_translated = translator.translate(book, dest='en') #the book title will be translated into english!
    book_english = book_translated.text+author_name #and then bind togheter with the author's name
    search_book = book_english.replace(" ", "+") #all the spaces are replaced with + for google search.
else: 
	search_book = book_title.replace(" ", "+")


def get_img_url (search_book): #This function gets the url of image of the books's cover.
    url_google = "https://www.google.pt/search?q="+ search_book+"+goodreads&oq=grit+g&aqs=chrome.0.69i59j0j69i57j69i60l3.1902j0j4&sourceid=chrome&ie=UTF-8"
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
location = '/var/www/html/booked/images/bookcover'+sys.argv[3]+'.jpg' #argument three is the id of the book - bookId!
urllib.request.urlretrieve(url, location) 
#THIS IS HOW YOU DOWNLOAD IMAGE USING PYTHON!



########


from urllib.request import Request, urlopen
import urllib.request
from unicodedata import normalize
import sys

book =  "Leonardo Da Vinci" 	#By using sys.argv[1] I can insert a variable from the PHP file to be inserted here!!! sys.argv[1]
author_name = 'Walter Isaacson'	#This is the second variable on PHP!
data = book +" "+ author_name  	#This is the the name of the book and the name of the author.

def remove(text): #Function that removes non-ASCII caracters (é, á, ã, ç)...
    x = ''
    for i in normalize('NFD', text):
        if i>='A' and i<='Z' or i>='a' and i<='z' or i == ' ' or i=='-':
            x+=i
    return x
    
book = remove(book)
author_name = remove(author_name)

search_book = book.replace(" ", "+") + "+" + author_name.replace(" ", "+") #the search term will be in portuguese.


def get_img_url (search_book): #This function gets the url of image of the books's cover.
    url_google = "https://www.goodreads.com/search/index.xml?key=g8QqxfZPjUuFwitJQsp7Q&q="+search_book
    #insert the desired book to search into google's search url

    req = Request(url_google, headers={'User-Agent': 'Mozilla/5.0'}) #makes connection with the website (secure way using the headers)
    webpage = urlopen(req).read() #takes the xml text and reads it
    page = str(webpage, 'utf-8') #transforms the file from byte type to string.
    
    initPos = page.find('<best_book type="Book">')
    finalPos = page.find('</', initPos)
    book_id = page[initPos+47:finalPos]
    
    
    url = "https://www.goodreads.com/book/show/"+book_id
    #insert the desired book to search into google's search url

    req2 = Request(url, headers={'User-Agent': 'Mozilla/5.0'}) #makes connection with the website (secure way using the headers)
    webpage2 = urlopen(req2).read() #takes the xml text and reads it
    page2 = str(webpage2, 'utf-8') #transforms the file from byte type to string.
    
    initPos2 = page2.find('<img src="')
    finalPos2 = page2.find('"', initPos2+11)
    link = page2[initPos2+10:finalPos2]
    return link
    
    
    #pos = link.find('/books')
    #f = link.find('m', pos)
    #finalLink = link[:f]+'l'+link[f+1:] #gets the larger image from the api!
    
    
    #nophoto = link.find('/nophoto')
    #if nophoto != -1: #fixed the problem of bookcovers different from the book wanted
     #   initPos = page.find('<image_url>', finalPos+20)
      #  finalPos = page.find('</', initPos)
       # link = page[initPos+11:finalPos]
        #nophoto = link.find('/nophoto')
    
    
    
    



url = get_img_url(search_book)

print(url)
#location = '/xampp/htdocs/booked/images/bookcover'+sys.argv[3]+'.jpg' #argument three is the id of the book - bookId!
#urllib.request.urlretrieve(url, location) 
#THIS IS HOW YOU DOWNLOAD IMAGE USING PYTHON!



