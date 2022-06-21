$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('#back-to-top').fadeIn();
    } else {
      $('#back-to-top').fadeOut();
    }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 400);
    return false;
  });
});
var downloadButton = document.getElementById("at-downloadx");
var counter = 9;
var newElement = document.createElement("span");
newElement.innerHTML = "Please Wait 9 sec";
var id;
downloadButton.parentNode.replaceChild(newElement, downloadButton);
function startDownload() {
  // downloadButton.style.display='none';
    id = setInterval(function () {
        counter--;
        if (counter < 0) {
            newElement.parentNode.replaceChild(downloadButton, newElement);
            clearInterval(id);
        } else {
            newElement.innerHTML = "Please Wait" + " " + counter.toString() + " " + " sec... ";
        }
    }, 1000);
};
var clickbtn = document.getElementById("btn-at");
clickbtn.onclick = startDownload;