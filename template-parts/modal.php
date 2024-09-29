<!-- Afficher la modale de contact -->
<div id="modalcontact" class="modal">
	<div class="modal-content">
		<!-- Afficher le titre de la modale sur deux lignes -->
        <div class="modal-header">
            <div class="modal-title"><span class="titleOne">CONTACTCONTACTCONTACT</span><br><span class="titleTwo">CONTACTCONTACTCONTACT</span></div>
        </div>
        <div class="modal-body">
            <?php
			
				// Afficher le shortcode du formulaire de contact
                echo do_shortcode('[wpforms id="38" title="false"]');
				
            ?>            
        </div>
    </div>
</div>