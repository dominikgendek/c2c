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
$id = 'block_list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block_list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$template = [
    ['core/list'],
    ['core/button']
];
$allowed_blocks = ['core/image', 'core/heading', 'core/paragraph'];

$img = get_field('zdjecie');
$icon = get_field('ikona');
$title = get_field('tytul');
$text = get_field('tekst');
?>

<div id="block_list" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col1"> <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"> </div>
            <div class="col2">
                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                    <h2><?php echo $title; ?></h2>
                    <?php echo $text; ?>
                    <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" templateLock="all" />
            </div>
        </div>
    </div>
</div>