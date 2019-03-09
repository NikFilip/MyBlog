  var maxZ = 1000;   // z-index of rectangle that gets clicked

 window.onload = function() {
   var add = document.getElementById("add");
   add.onclick = addSquare;
   var colours = document.getElementById("colours");
   colours.onclick = changeColours;
   var inpx = document.getElementById("inpx");
   inpx.onclick = Increase;
   var depx = document.getElementById("depx");
   depx.onclick = Decrease;
   var lett = document.getElementById("letter");
   lett.onclick = getRandomLetter;
   var squareCount = parseInt(Math.random() * 21) + 30;
   for (var i = 0; i < squareCount; i++) {  // create random squares
    	addSquare();
   }
 }

  // Gives a new randomly chosen color to every square on the page.
  function changeColours() {
    var squares = document.querySelectorAll("#squarearea div");
    for (var i = 0; i < squares.length; i++) {
      squares[i].style.backgroundColor = getRandomColour();
    }
  }

  // Creates and adds a new square div to the page.
  function addSquare() {
    var square = document.createElement("div");
    square.className = "square";
    square.style.left = parseInt(Math.random() * 650) + "px";
    square.style.top = parseInt(Math.random() * 250) + "px";
    square.style.width = Math.floor(Math.random()*(50-20+1)+20) +"px";
    square.style.height = Math.floor(Math.random()*(50-20+1)+20) + "px";
    square.style.backgroundColor = getRandomColour();
    square.onclick = squareClick;
    var squareArea = document.getElementById("squarearea");
    squareArea.appendChild(square);
  }
  
  //Increases size of each square from 5 to 15 pixels
  function Increase(){
	var squares = document.querySelectorAll("#squarearea div");
	var square = document.getElementById("squarearea");
	//maxWidth and maxHeight allow for different sizes of boxed area
	var maxWidth = parseInt(window.getComputedStyle(square,null).getPropertyValue("width"));
	var maxHeight = parseInt(window.getComputedStyle(square,null).getPropertyValue("height"));
	for (var i = 0; i < squares.length; i++){
		var width = squares[i].style.width;
		var height = squares[i].style.height;
		var newWidth = parseInt(width) + Math.floor(Math.random() * (15-5+1) +5);
		var newheigth = parseInt(height) + Math.floor(Math.random()* (15-5+1) +5);
		if ((newWidth + parseInt(squares[i].style.left)) < maxWidth){
			squares[i].style.width = newWidth+"px";
		}
		if ((newheigth + parseInt(squares[i].style.top)) < maxHeight){
			squares[i].style.height = newheigth+"px";
		}
	}
	  
  }
  
  //Decrease size of each square from 5 to 15 pixels
  function Decrease(){
	var squares = document.querySelectorAll("#squarearea div");
	for (var i = 0; i < squares.length; i++){
		var width = squares[i].style.width;
		var height = squares[i].style.height;
		var newWidth = parseInt(width) - Math.floor(Math.random()* (15-5+1)+5);
		var newheigth = parseInt(height) - Math.floor(Math.random()*(15-5+1)+5);
		if (parseInt(newWidth) > 2 ){
			squares[i].style.width = newWidth+"px";
		}
		if (parseInt(newheigth) > 2){
			squares[i].style.height = newheigth+"px";
		}
	}
	  
  }

  //Generates random letter for squares and puts them on the squares
  function getRandomLetter(){
	var letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var squares = document.querySelectorAll("#squarearea div");
	for (var i = 0; i < squares.length; i++) { 
		var rand = letters.charAt(parseInt(Math.random() * letters.length));
		var txt = document.createTextNode(rand);
		squares[i].appendChild(txt);  
	}
	  
  }
  
  // Generates and returns a random color string such as "#f08a7c".
  function getRandomColour() {
    var letters = "0123456789abcdef";
    var result = "#";
    for (var i = 0; i < 6; i++) {
      result += letters.charAt(parseInt(Math.random() * letters.length));
    }
    return result;
  }

  // Called when a square is clicked; moves it to the top or removes it.
  function squareClick() {
    var oldZ = parseInt(this.style.zIndex);
    if (oldZ == maxZ) {
      this.parentNode.removeChild(this);   // square is on top; remove it
    } else {
      maxZ++;
      this.style.zIndex = maxZ;
    }
  }