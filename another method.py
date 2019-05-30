from urllib.request import Request, urlopen
import urllib.request
from unicodedata import normalize
import sys

book =  "Crime and punishment" 	#By using sys.argv[1] I can insert a variable from the PHP file to be inserted here!!! sys.argv[1]
author_name = ''	#This is the second variable on PHP!
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
    n = len(page)
    links = []
   
    initPos = 0
    while initPos != -1:
        initPos = page.find('<image_url>', initPos+11)
        finalPos = page.find('</', initPos)
        links.append(page[initPos+11:finalPos])
        
        print(initPos)
    link = links[:5]

    for z in link:
        print('<img src="'+z+'">')
    
    
    
   
    
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

