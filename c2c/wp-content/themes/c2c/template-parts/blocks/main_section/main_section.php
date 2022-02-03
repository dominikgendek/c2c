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
$id = 'main-section-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'main-section';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.

$title = get_field('tytul');
$text = get_field('tekst');
$img = get_field('grafika');
$bg_color = get_field('kolor_tla');
$button1_text = get_field('przycisk_1');
$button1_link = get_field('przycisk_1_-_link');
$button2_text = get_field('przycisk_2');
$button2_link = get_field('przycisk_2_-_link');
?>

<div id="main-section" class="<?php echo esc_attr($className); ?>" style="background-color: <?php echo $bg_color; ?>">
    <div class="container">
        <div class="row">
            <div class="col1">
                <h1><?php echo $title; ?></h1>
                <?php echo $text; ?>
                <div>
                    <a href="<?php echo $button1_link; ?>">
                        <?php echo $button1_text; ?>
                    </a>
                    <a href="<?php echo $button1_link; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.127" height="18.907" viewBox="0 0 15.127 18.907">
                            <path id="Icon_ionic-ios-play" data-name="Icon ionic-ios-play" d="M9,7.241V25.167a.462.462,0,0,0,.691.425L23.9,16.629a.508.508,0,0,0,0-.845L9.691,6.821A.457.457,0,0,0,9,7.241Z" transform="translate(-9 -6.751)" fill="#fff" />
                        </svg>
                        <?php echo $button2_text; ?>
                    </a>
                </div>
            </div>
            <div class="col2">
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
            </div>
        </div>
    </div>
    <img class="img-waves" src="<?php echo get_template_directory_uri(); ?>/images/hero-waves.png" alt="">
</div>