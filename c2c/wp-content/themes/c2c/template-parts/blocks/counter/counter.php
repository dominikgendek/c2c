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
$id = 'counter-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'counter';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
$numbers = get_field('dodaj_liczbe_z_opisem');
?>

<div id="counter" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <?php if ($numbers) : ?>
                <?php foreach ($numbers as $content) : ?>
                    <div>
                        <p><span class="value" data-value="<?php echo $content['liczba']; ?>">0</span><span><?php echo $content['parametr']; ?></span></p>
                        <p><?php echo $content['opis']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>