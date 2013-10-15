
<form action="/" method="get">
    <label>
        <span class="screen-reader-text">Recherche pour </span>
        <input class="search-field" type="search" title="Recherche pour :" name="s" value="<?php the_search_query(); ?>" placeholder="Entrer votre recherche">
    </label>
    <input class="search-submit" type="submit" value="Rechercher">
</form>
