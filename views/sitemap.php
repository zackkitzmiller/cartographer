<?php echo "<?xml version='1.0' encoding='UTF-8'?>"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
			    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
			    
    <?php foreach($pages as $page): ?>
	<url>
		<loc><?php echo site_url() . '/' . $page->url_title; ?></loc>
		<lastmod><?php echo date('Y-m-d', $page->last_modified); ?></lastmod>
		<changefreq>daily</changefreq>
		<priority><?php echo ($page->include_in_page_list == 'y') ? '0.8' : '0.5'; ?></priority>
	</url>
	<?php endforeach; ?>
</urlset>