/* MENU BURGER JAVASCRIPT */
/* ---------------------- */

// Ouvrir et fermer le menu burger
document.addEventListener('DOMContentLoaded', function () {
	
    (function($) {
		
		var menuburgericonopen = document.querySelector(".menu-burger-icon-open");
		var menuburgericonclose = document.querySelector(".menu-burger-icon-close");
		var menulinks = document.getElementById("menu-links");
		$(".menu-burger-icon-open").click(function () {
			menuburgericonopen.style.display = "none";
			menuburgericonclose.style.display = "block";
			menulinks.classList.add("open");
			menulinks.style.display = "block";
			setTimeout(() => {
                menulinks.style.opacity = '1';
            }, 500);
		});
		
		$(".menu-burger-icon-close").click(function () {
			menuburgericonclose.style.display = "none";
			menuburgericonopen.style.display = "block"; 
			menulinks.classList.remove("open");			
			menulinks.style.display = "block";
			menulinks.style.opacity = '0';	
		});
	
		$(".header.a").click(function () {
			menuburgericonclose.style.display = "none";
			menuburgericonopen.style.display = "block"; 
			menulinks.classList.remove("open");			
			menulinks.style.display = "block";
			
			menulinks.style.opacity = '0';
			
			
		});  
		
	})(jQuery);
});
