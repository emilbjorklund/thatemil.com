<?php include('../perch/runtime.php'); ?>
<?php 
    header('Content-Type: application/rss+xml');

    echo '<'.'?xml version="1.0"?'.'>'; 
?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>Perch Blog Example</title>
        <link>http://example.com/blog/</link>
        <description>My awesome website.</description>
        <atom:link href="http://example.com/blog/rss.php" rel="self" type="application/rss+xml" />
        <?php
            perch_blog_custom(array(
                'template'=>'blog/rss_post.html',
                'count'=>10,
                'sort'=>'postDateTime',
                'sort-order'=>'DESC'
                ));
        ?>
    </channel>
</rss>