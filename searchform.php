<form id="searchBar" method="get" action="<?php bloginfo('url'); ?>">
	<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
</form>