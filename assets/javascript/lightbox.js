/* LIGHTBOX JAVASCRIPT */
/* ------------------- */

document.addEventListener('DOMContentLoaded', function () {

	(function($) {
	
		var allPhotos = document.querySelectorAll(".photos .photo");
		var arrayPhotos = Array.from(allPhotos);
		var closeBtn = document.querySelector(".lightbox-close");
		var curIndex = null;
		
		// Lire les informations de chaque photo à l'ouverture de la visionneuse
		allPhotos.forEach((photo) => {
			photo.querySelector(".square").addEventListener("click", (event) => {     
				document.querySelector(".lightbox").style.visibility = "visible";
				document.querySelector(".lightbox").style.transition = "all 1s";
				document.querySelector(".lightbox").style.opacity = "1";
				document.querySelector(".photo-url").style.opacity = "1";
				DisplayInformations(photo);
			});
		});        

		// récuppérer les informations de la photo précédente
        document.querySelector(".lightbox .photo-previous").addEventListener("click", function(){
			curIndex--;
			if (curIndex < 0) {
				curIndex = arrayPhotos.length - 1;
			}
			DisplayInformations(arrayPhotos[curIndex]);
		});
		
		// récuppérer les informations de la photo suivante
        document.querySelector(".lightbox .photo-next").addEventListener("click", function(){
			curIndex++;
			if (curIndex >= arrayPhotos.length) {
				curIndex = 0;
			}
			DisplayInformations(arrayPhotos[curIndex]);
		});
		
		// Fermer la visionneuse
		closeBtn.addEventListener("click",function(){
			document.querySelector(".lightbox").style.transition = "all 1s";
			document.querySelector(".photo-url").style.opacity = "0";
			document.querySelector(".lightbox").style.opacity = "0";
			document.querySelector(".lightbox").style.visibility = "hidden";                   
		});

		// Affichage des informations de la photo selectionnée
		function DisplayInformations(element) {
			document.querySelector(".photo-url").src = element.querySelector(".squarephoto").getAttribute("data-image");
			document.querySelector(".photo-reference").textContent = element.querySelector(".squarephoto").getAttribute("data-reference").toUpperCase();
			document.querySelector(".photo-category").textContent = element.querySelector(".squarephoto").getAttribute("data-category").toUpperCase();
			curIndex = arrayPhotos.indexOf(element);
		};
		
	})(jQuery);
});

