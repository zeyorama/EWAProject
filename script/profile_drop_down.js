
function switch_img(id) {
	var el = document.getElementById(id);
	var elimg = document.getElementById("image_"+id);
	if(el.style.display == "block") {
		elimg.src = "images/plus_hover.png";
		el.style.display = "none";
	} else {
		elimg.src = "images/minus_hover.png";
		el.style.display = "block";
	}
};

function switch_hover(test, id) {
	var elimg = document.getElementById(id);
	if(elimg.src.match(/images\/plus.png/) && test) {
		elimg.src = "images/plus_hover.png";
	} else if(elimg.src.match(/images\/minus.png/) && test) {
		elimg.src = "images/minus_hover.png";
	} else if(elimg.src.match(/images\/plus_hover.png/)) {
		elimg.src = "images/plus.png";
	} else {
		elimg.src = "images/minus.png";
	}
}





