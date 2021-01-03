// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
	document.getElementById("navbar").style.padding = "3px 14px 3px 14px";
	document.getElementById("logo").style.height = "26px";
} else {
	document.getElementById("navbar").style.padding = "14px 14px";
	document.getElementById("logo").style.height = "28px";
}
}



