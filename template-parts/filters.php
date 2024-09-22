<div class="filters">
    <div>
        <select name="categories" class="filter" aria-label="Catégories">
            <option value="">Catégories</option>
            <option disabled></option>
			
            <?php returnTaxonomies('categorie'); ?>            
        </select>
    
        <select name="formats" class="filter" aria-label="Formats">
            <option value="">Formats</option>
			<option disabled></option>
			
            <?php returnTaxonomies('format'); ?>  
        </select>
    </div>
    <div>
        <select name="tri" class="filter" aria-label="Tri">
            <option value="">Trier par</option>
			<option disabled></option>
            <option value="desc">A partir des plus récentes</option>
            <option value="asc">A partir des plus anciennes</option>
        </select>
    </div>
</div>