var options = {
    strings: [ "This month I read <i>The Great Gatsby</i>^2000", "This month I read <i>Frankenstein</i>^2000", "This month I read <i>I, robot</i>^2000", "This month I read <i>Cosmos</i>^2000", "This month I read <i>1984</i>^2000", "This month I read <i>Harry Potter and the Philosopher's Stone</i>^2000", "How about you?^1000 You can use <i>Booked</i> to keep track of the books you are reading!" ],
    typeSpeed: 30,
    backSpeed: 15,
    smartBackspace: true,
    cursorChar: "<span class='cursor'>|</span>"

  }

  var typed = new Typed(".text", options);