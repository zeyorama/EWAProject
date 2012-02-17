
function switch_cEvents() {
	var el = document.getElementById("cEvents_content");
	var elimg = document.getElementById("image_cEvents_content");
	if(el.style.display == "block") {
		elimg.src = "images/plus.png";
		el.style.display = "none";
	} else {
		elimg.src = "images/minus.png";
		el.style.display = "block";
	}
};

function switch_videos() {
  	var el = document.getElementById("videos_content");
	var elimg = document.getElementById("image_videos_content");
	if(el.style.display == "block") {
		elimg.src = "images/plus.png";
		el.style.display = "none";
	} else {
		elimg.src = "images/minus.png";
		el.style.display = "block";
	}
}