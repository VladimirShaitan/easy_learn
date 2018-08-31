<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach ($orders as $orders): ?>
  <url>
    <loc><?php echo site_url($orders['alias']); ?></loc>
    <lastmod><?php echo  date("Y-m-d"); ?>T23:55:42+01:00</lastmod>
    <changefreq>daily</changefreq>
    <priority>1</priority>
  </url>
 <?php endforeach; ?>
  <?php echo $links; ?>
</urlset>