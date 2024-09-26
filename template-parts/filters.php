<!-- Affiche les filtres -->
<div class="filters">
    <div>
	
		<!-- affiche le filtre de la taxonomie catégorie -->
        <select name="categories" class="filter" aria-label="Catégories">
            <option value="">Catégories</option>
            <option disabled></option>
			
            <?php returnTaxonomies('categorie'); ?>            
        </select>
		
		<!-- affiche le filtre de la taxonomie format -->
        <select name="formats" class="filter" aria-label="Formats">
            <option value="">Formats</option>
			<option disabled></option>
			
            <?php returnTaxonomies('format'); ?>  
        </select>
    </div>
    <div>
		<!-- affiche le filtre de tri -->
        <select name="tri" class="filter" aria-label="Tri">
            <option value="">Trier par</option>
			<option disabled></option>
            <option value="desc">A partir des plus récentes</option>
            <option value="asc">A partir des plus anciennes</option>
        </select>
    </div>
</div>