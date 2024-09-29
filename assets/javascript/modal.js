/* MODAL JAVASCRIPT */
/* ---------------- */

// Ouvrir et fermer la modale contact
document.addEventListener('DOMContentLoaded', function () {

	(function($) {
		
		var modal = document.getElementById("modalcontact");
		var contactbuttons = document.querySelectorAll(".contact-button");

		var menuburgericonopen = document.querySelector(".menu-burger-icon-open");
		var menuburgericonclose = document.querySelector(".menu-burger-icon-close");
		var menulinks = document.getElementById("menu-links");
		
		contactbuttons.forEach((btn) => {
			btn.addEventListener("click", function() {
				
				menuburgericonclose.style.display = "none";
				menuburgericonopen.style.display = "block"; 
				menulinks.classList.remove("open");			
				menulinks.style.display = "block";
			
				modal.classList.add("open");
			});
		});
		
		window.addEventListener("click", function(event) {
			if (event.target == modal) {
				modal.classList.remove("open");
			}
		});
		
	})(jQuery);
});
