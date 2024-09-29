<!-- Afficher les filtres -->
<div class="filters">
    <div>
	
		<!-- afficher le filtre de la taxonomie catégorie -->
        <select name="categories" class="filter" aria-label="Catégories">
            <option value="">Catégories</option>
            <option disabled></option>
			
            <?php returnTaxonomies('categorie'); ?>            
        </select>
		
		<!-- afficher le filtre de la taxonomie format -->
        <select name="formats" class="filter" aria-label="Formats">
            <option value="">Formats</option>
			<option disabled></option>
			
            <?php returnTaxonomies('format'); ?>  
        </select>
    </div>
    <div>
		<!-- afficher le filtre de tri -->
        <select name="tris" class="filter" aria-label="Tris">
            <option value="">Trier par</option>
			<option disabled></option>
            <option value="desc">A partir des plus récentes</option>
            <option value="asc">A partir des plus anciennes</option>
        </select>
    </div>
</div>