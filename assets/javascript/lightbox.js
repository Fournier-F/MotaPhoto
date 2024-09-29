/* LIGHTBOX JAVASCRIPT */
/* ------------------- */

document.addEventListener('DOMContentLoaded', function () {

	(function($) {
			
		var currentPage = 1;
		var arrayPhotos;

		// Renseigner les informations de chaque photo pour la visionneuse
		function LightboxPhotosClick(){
			var allPhotos = document.querySelectorAll(".photos .photo");
			arrayPhotos = Array.from(allPhotos);
			
			allPhotos.forEach((photo) => {
				photo.querySelector(".square").addEventListener("click", (event) => {     
					document.querySelector(".lightbox").style.visibility = "visible";
					document.querySelector(".lightbox").style.transition = "all 1s";
					document.querySelector(".lightbox").style.opacity = "1";
					document.querySelector(".photo-url").style.opacity = "1";
					DisplayInformations(photo);
				});
			});  
		};		
		LightboxPhotosClick();


		// Renseigner les informations de la photo précédente
        document.querySelector(".lightbox .photo-previous").addEventListener("click", function(){
			curIndex--;
			if (curIndex < 0) {
				curIndex = arrayPhotos.length - 1;
			}
			DisplayInformations(arrayPhotos[curIndex]);
		});
		
		// Renseigner les informations de la photo suivante
        document.querySelector(".lightbox .photo-next").addEventListener("click", function(){
			curIndex++;
			if (curIndex >= arrayPhotos.length) {
				curIndex = 0;
			}
			DisplayInformations(arrayPhotos[curIndex]);
		});
		
		// Renseigner les informations d'une photo
		function DisplayInformations(element) {
			document.querySelector(".photo-url").src = element.querySelector(".squarephoto").getAttribute("data-image");
			document.querySelector(".photo-reference").textContent = element.querySelector(".squarephoto").getAttribute("data-reference").toUpperCase();
			document.querySelector(".photo-category").textContent = element.querySelector(".squarephoto").getAttribute("data-category").toUpperCase();
			curIndex = arrayPhotos.indexOf(element);
		};
		
		// Fermer la visionneuse en cliquant sur la croix
		var closeBtn = document.querySelector(".lightbox-close");
		
		closeBtn.addEventListener("click",function(){
			document.querySelector(".lightbox").style.transition = "all 1s";
			document.querySelector(".photo-url").style.opacity = "0";
			document.querySelector(".lightbox").style.opacity = "0";
			document.querySelector(".lightbox").style.visibility = "hidden";                   
		});
		
		// Afficher ou actualiser les photos en cliquant sur le bouton "Charger Plus" ou en fonction de la sélection des filtres 
		function RefreshPhotosAjax() {
			current_category = document.querySelector("select[name='categories']").value;
			current_format = document.querySelector("select[name='formats']").value;
			current_sort = document.querySelector("select[name='tris']").value;          

			$.ajax({
				type: "POST",
				dataType: "json",
				url: ajax_call.ajaxurl,
				data: {
					action: "refresh_photos_ajax",
					function: "refresh_photos_ajax",
					data: "category=" + current_category + "&format=" + current_format + "&sort=" + current_sort + "&page=" + currentPage,
				},
				beforeSend : function ( xhr ) {               
				},
				success: function (retour_json) {       
					if(currentPage == 1) {
						$('#photoscontainer').html(retour_json.html_content);
					}
					else
					{
						$('#photoscontainer').append(retour_json.html_content); 
					}
					if(retour_json.has_more_pictures == 1) {
						$('#loadmore').show();
					}
					else
					{
						$('#loadmore').hide();
					}     
				},
				error: function (xhr, status, error) {
					let retour_json = JSON.parse(xhr.responseText);
					console.log("error");
				},
				complete: function (retour_json) {                
					setTimeout((e) => {
						LightboxPhotosClick();
					}, 200);
				}
			});	
		}
		
		// Afficher plus de photos en cliquant sur le bouton "Charger Plus"
		var MorePhotosBtn = document.getElementById("loadmore");
		
		MorePhotosBtn.addEventListener('click', function() {       
			currentPage ++;
			RefreshPhotosAjax();
		});


		// Actualiser les photos en fonction de la sélection des filtres 
		var filtersDropdown = document.querySelectorAll(".filter");
		
		filtersDropdown.forEach((select) => {
			select.addEventListener("change", (event) => {
				currentPage = 1;
				RefreshPhotosAjax();
			});
		});
		
	})(jQuery);
});