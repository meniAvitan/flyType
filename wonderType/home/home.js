const menu = document.querySelector(".toggle");
const navigation = document.querySelector(".navigation");

menu.addEventListener("click", function toogleMenu(){
    menu.classList.toggle("active");
    navigation.classList.toggle("active");
})

const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", () => {

    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }
    
  });
});

var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function success() {


  swal({
    title: "מעולה",
    text: "!הפניה נשלחה בהצלחה",
    icon: "success",
    button: "אישור",
  })


}

function faild() {
  swal({
    title: "נכשל",
    text: "!שליחת הפניה נכשלה, נסו שוב",
    icon: "error",
    button: "אישור",
  })

}


