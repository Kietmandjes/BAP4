//details

function goBack(){
  window.history.back();
}

//filter
let allcards = document.getElementsByClassName("heren")
console.log(allcards)

let filters = document.getElementsByClassName("filter")
console.log(filters)

for(let i = 0; i < filters.length; i++){
  filters[i].checked = true
}


let shirtsfilter = document.getElementById("shirts")
shirtsfilter.onchange = function () {
  if (shirtsfilter.checked === true) {
    for (let i = 0; i < allcards.length; i++) {
      if (allcards[i].dataset.category === "shirts") {
        allcards[i].style.display = "block";
      };
    }
  }
  else {
    for (let i = 0; i < allcards.length; i++) {
      if (allcards[i].dataset.category === "shirts") {
        allcards[i].style.display = "none";
      };
    }
  }
}

let jassenfilter = document.getElementById("jassen")
jassenfilter.onchange = function () {
  if (jassenfilter.checked === true) {
    for (let i = 0; i < allcards.length; i++) {
      if (allcards[i].dataset.category === "jassen") {
        allcards[i].style.display = "block";
      };
    }
  }
  else {
    for (let i = 0; i < allcards.length; i++) {
      if (allcards[i].dataset.category === "jassen") {
        allcards[i].style.display = "none";
      };
    }
  }
}

let broekenfilter = document.getElementById("broeken")
broekenfilter.onchange = function () {
  if (broekenfilter.checked === true) {
    for (let i = 0; i < allcards.length; i++) {
      if (allcards[i].dataset.category === "broeken") {
        allcards[i].style.display = "block";
      };
    }
  }
  else {
    for (let i = 0; i < allcards.length; i++) {
      if (allcards[i].dataset.category === "broeken") {
        allcards[i].style.display = "none";
      };
    }
  }
}

//slider

var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) { myIndex = 1 }
  x[myIndex - 1].style.display = "block";
  setTimeout(carousel, 4000);
}

//reviews

let arrowButtons = document.getElementsByClassName("arrow");
let reviews = document.getElementsByClassName("review");
let modus = "one-two-three"

for (let i = 0; i < arrowButtons.length; i++) {
  arrowButtons[i].onclick = function () {
    if (modus === "one-two-three") {
      reviews[0].style.display = "none";
      reviews[1].style.display = "none";
      reviews[2].style.display = "none";
      reviews[3].style.display = "block";
      reviews[4].style.display = "block";
      reviews[5].style.display = "block";
      modus = "four-five-six";
    }
    else {
      reviews[0].style.display = "block";
      reviews[1].style.display = "block";
      reviews[2].style.display = "block";
      reviews[3].style.display = "none";
      reviews[4].style.display = "none";
      reviews[5].style.display = "none";
      modus = "one-two-three";
    }
  }
}


