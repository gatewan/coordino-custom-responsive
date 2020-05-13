<?php App::uses('CakeTime', 'Utility'); ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo $this->Html->url('/',true); ?></loc>
        <changefreq>weekly</changefreq>
    </url>
  
    <?php foreach ($listNews as $list): ?>
    <url>
        <loc><?php echo $this->Html->url(array('controller' => 'news', 'action' => 'detail',$list['News']['id']),true); ?></loc>
        <lastmod><?php echo $this->Time->toAtom($list['News']['modified']); ?></lastmod>
        <changefreq>weekly</changefreq>
    </url>
    <?php endforeach; ?>

</urlset>