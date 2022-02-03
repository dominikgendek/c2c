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
$id = 'faq-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'faq';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$img = get_field('zdjecie');
$icon = get_field('ikona');
$title = get_field('tytul');
$text = get_field('tekst');
$faq = get_field('faq');
?>

<div id="faq" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col2">
                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                <h2><?php echo $title; ?></h2>
                <?php echo $text; ?>
                <?php if ($faq) : ?>
                    <div class="faq-container">
                        <?php foreach ($faq as $content) : ?>
                            <div class="faq-box">
                                <h3 class="question"><?php echo $content['pytanie']; ?></h3>
                                <div class="answer"><?php echo $content['odpowiedz']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col1"> <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"> </div>
        </div>
    </div>
</div>