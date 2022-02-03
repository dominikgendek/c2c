<?php
$links = get_field('linki', 'options');
$logo = get_field('logo', 'options');
$copyright = get_field('copyright', 'options');
?>

<footer>
    <div class="container">
        <div class="row">
            <?php if ($links) : ?>
                <div class="socials">
                    <?php foreach ($links as $link) : ?>
                        <a href="<?php echo $link['link']['url']; ?>"><?php echo $link['link']['title']; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
            <p><?php echo $copyright; ?></p>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>

</body>

</html>