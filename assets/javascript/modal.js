/* MODAL JAVASCRIPT */
/* ---------------- */

// Ouvrir et fermer la modale contact
document.addEventListener('DOMContentLoaded', function () {

	(function($) {
		
		var modalcontact = document.getElementById("modalcontact");
		var contactbuttons = document.querySelectorAll(".contact-button");
		var photoreference = document.querySelector(".photoreference");
		
		var menuburgericonopen = document.querySelector(".menu-burger-icon-open");
		var menuburgericonclose = document.querySelector(".menu-burger-icon-close");
		var menulinks = document.getElementById("menu-links");
		
		contactbuttons.forEach((btn) => {
			btn.addEventListener("click", function() {
				
				menuburgericonclose.style.display = "none";
				menuburgericonopen.style.display = "block"; 
				menulinks.classList.remove("open");			
				menulinks.style.display = "block";

				if (photoreference) {
					const photo_ref = photoreference.getAttribute("data-photoreference").toUpperCase();                
					document.getElementById("wpforms-38-field_3").setAttribute('value', photo_ref);
					document.getElementById("wpforms-38-field_3").innerHTML = "value = " + "'" + document.getElementById("wpforms-38-field_3").value + "'";
				}
				
				modalcontact.classList.add("open");	
			});
		});
		
		window.addEventListener("click", function(event) {
			if (event.target == modalcontact) {
				modalcontact.classList.remove("open");
			}
		});
		
	})(jQuery);
});
