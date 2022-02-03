<?php

/**
 * Main Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'tiles-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'tiles';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$tiles = get_field('dodaj_kafelek');
?>

<div id="tiles" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <?php if ($tiles) : ?>
                <?php foreach ($tiles as $tile) : ?>
                    <div class="tile">
                        <div style="background-color: <?php echo $tile['tlo_ikony']; ?>">
                            <img src="<?php echo $tile['ikona']['url']; ?>" alt="<?php echo $tile['ikona']['alt']; ?>">
                        </div>
                        <h3><?php echo $tile['tytul']; ?></h3>
                        <?php echo $tile['tresc']; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>