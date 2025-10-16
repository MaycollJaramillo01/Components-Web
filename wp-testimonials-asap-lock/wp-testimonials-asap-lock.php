<?php
/*
Plugin Name: ASAP Lock & Key Testimonials
Description: Sistema de testimonios + Captcha para ASAP LOCK & KEY INC con variables permanentes.
Version: 1.0
Author: Maycoll
*/

if (!defined('ABSPATH')) exit;

/* =============================
   CS BRIEF (Variables permanentes)
   ============================= */
define('ASAP_COMPANY', 'ASAP LOCK & KEY INC');
define('ASAP_CUSTOMER', 'Roberto Hay');
define('ASAP_PHONE', ''); // pendiente
define('ASAP_EMAIL', 'djjdhay@yahoo.com');
define('ASAP_DOMAIN', 'https://www.asaplockandkeyinc.com');
define('ASAP_ADDRESS', '8635 Truxton Ave Los Angeles, CA 90045');
define('ASAP_ESTIMATES', 'Free Estimates');
define('ASAP_SCHEDULE', '24/7');
define('ASAP_COVERAGE', '15 Miles, covering Santa Monica, Pacific Palisades, Brentwood, Venice, Marina del Rey, Playa del Rey, Inglewood, Manhattan Beach, Redondo Beach, Torrance, Rancho Palos Verdes, Carson, and the Hollywood neighborhood.');
define('ASAP_EXPERIENCE', '1970 to 2025');
define('ASAP_PAYMENT', 'Cash, Credit and Debit Card');
define('ASAP_BILINGUAL', 'Yes');
define('ASAP_LICENSE', 'Fully Insured & Licensed');
define('ASAP_MAP', 'https://maps.app.goo.gl/PeEb5f8J9NrFc9aW8');
define('ASAP_FACEBOOK', 'https://www.facebook.com/ASAPLockAndKeyLA');

/* =============================
   Shortcode para mostrar testimonios
   ============================= */
function asap_testimonials_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'views/testimonials-form.php';
    return ob_get_clean();
}
add_shortcode('asap_testimonials', 'asap_testimonials_shortcode');

/* =============================
   Endpoint Captcha
   ============================= */
add_action('init', function(){
    add_rewrite_rule('captcha.svg$', 'index.php?asap_captcha=1', 'top');
});
add_filter('query_vars', function($vars){
    $vars[] = 'asap_captcha';
    return $vars;
});
add_action('template_redirect', function(){
    if (get_query_var('asap_captcha') == 1) {
        include plugin_dir_path(__FILE__) . 'captcha.php';
        exit;
    }
});

/* =============================
   Manejo envío de reseñas
   ============================= */
add_action('admin_post_nopriv_asap_insert_testimonial', 'asap_insert_testimonial');
add_action('admin_post_asap_insert_testimonial', 'asap_insert_testimonial');

function asap_insert_testimonial() {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $errors = [];

    $name    = sanitize_text_field($_POST['name'] ?? '');
    $text    = sanitize_textarea_field($_POST['reviews'] ?? '');
    $captcha = sanitize_text_field($_POST['captcha'] ?? '');
    $stars   = intval($_POST['estrellas'] ?? 0);
    $date    = sanitize_text_field($_POST['fecha'] ?? date('Y-m-d'));

    if ($stars < 1 || $stars > 5) $errors['stars'] = 'Please select a rating.';
    if (!$name) $errors['name'] = 'Name is required.';
    if (!$text) $errors['reviews'] = 'Comments are required.';
    if (!isset($_SESSION['captcha']) || strcasecmp($captcha, $_SESSION['captcha']) !== 0) {
        $errors['captcha'] = 'Invalid CAPTCHA.';
    }

    if ($errors) {
        $_SESSION['errors'] = $errors;
        wp_safe_redirect(wp_get_referer());
        exit;
    }

    unset($_SESSION['captcha']);

    $dir  = plugin_dir_path(__FILE__) . 'data/';
    $file = $dir . 'testimonials.json';
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    $reviews = [];
    if (file_exists($file)) {
        $raw = file_get_contents($file);
        $decoded = json_decode($raw, true);
        if (is_array($decoded)) $reviews = $decoded;
    }

    $new = [
        'name'   => $name,
        'rating' => $stars,
        'text'   => $text,
        'date'   => $date,
    ];

    array_unshift($reviews, $new);

    file_put_contents($file, json_encode($reviews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    $_SESSION['flash_success'] = 'Thanks! Your review has been submitted.';
    wp_safe_redirect(wp_get_referer());
    exit;
}
// === Enqueue CSS ===
add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style(
        'wp-testimonials-style',
        plugins_url('assets/testimonials.css', __FILE__),
        [],
        '1.0'
    );
});
