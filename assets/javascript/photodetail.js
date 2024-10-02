/* PHOTODETAIL JAVASCRIPT */
/* ---------------------- */

document.addEventListener('DOMContentLoaded', function () {

	(function($) {
		
		var arrowprevious = document.querySelector('.previous-arrow');
		var arrownext = document.querySelector('.next-arrow');
		
		// Afficher la miniature de la photo précédente au passage de la souris
		arrowprevious.addEventListener('mouseover', function() {
			document.querySelector('.previous-photo').style.opacity = 1;
		});
		
		// Cacher la miniature de la photo précédente au passage de la souris
		arrowprevious.addEventListener('mouseleave', function() {
			document.querySelector('.previous-photo').style.opacity = 0;
		});
		
		// Afficher la miniature de la photo suivante au passage de la souris
		arrownext.addEventListener('mouseover', function() {
			document.querySelector('.next-photo').style.opacity = 1;
		});
		
		// Cacher la miniature de la photo suivante au passage de la souris
		arrownext.addEventListener('mouseleave', function() {
			document.querySelector('.next-photo').style.opacity = 0;
		});
		
	})(jQuery);
});