<?php
@session_start();

// ========== INPUT ==========
$name    = trim($_POST['name']    ?? '');
$text    = trim($_POST['reviews'] ?? '');
$captcha = trim($_POST['captcha'] ?? '');
$stars   = (int)($_POST['estrellas'] ?? 0);
$date    = ($_POST['fecha'] ?? date('Y-m-d'));

// ========== VALIDACIÓN ==========
$errors = [];

if ($stars < 1 || $stars > 5) { $errors['stars']   = 'Please select a rating.'; }
if ($name === '')              { $errors['name']    = 'Name is required.'; }
if ($text === '')              { $errors['reviews'] = 'Comments are required.'; }

if ($captcha === '' || !isset($_SESSION['captcha']) || strcasecmp($captcha, $_SESSION['captcha']) !== 0) {
  $errors['captcha'] = 'Invalid CAPTCHA.';
}

// Si hay errores → volver con errores
if ($errors) {
  $_SESSION['errors'] = $errors;
  header('Location: testimonials.php');
  exit;
}

// Limpia el captcha para evitar reuso
unset($_SESSION['captcha']);

// ========== SANITIZACIÓN ==========
$name = mb_substr($name, 0, 80, 'UTF-8');
$text = mb_substr($text, 0, 2000, 'UTF-8');

// Remueve HTML peligroso (dejamos texto plano)
$name = strip_tags($name);
$text = strip_tags($text);

// ========== PATH DEL JSON ==========
$dir  = __DIR__ . '/data';
$file = $dir . '/testimonials.json';

// Asegura carpeta
if (!is_dir($dir)) {
  @mkdir($dir, 0755, true);
}

// Carga actual (si existe), o array vacío
$reviews = [];
if (is_file($file)) {
  $raw = file_get_contents($file);
  $decoded = json_decode($raw, true);
  if (is_array($decoded)) { $reviews = $decoded; }
}

// ========== NUEVO REGISTRO ==========
$new = [
  'name'   => $name,
  'rating' => $stars,
  'text'   => $text,
  'date'   => $date, // YYYY-mm-dd
];

// ========== ESCRITURA SEGURA ==========
// 1) Prepara JSON bonito (UTF-8 sin escapar)
$json = json_encode(array_values(array_merge([$new], $reviews)), JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

// 2) Escribe atómicamente con archivo temporal + rename
$tmp = $file . '.tmp';
$ok  = false;

if (($fp = @fopen($tmp, 'wb')) !== false) {
  if (flock($fp, LOCK_EX)) {
    $bytes = fwrite($fp, $json);
    fflush($fp);
    flock($fp, LOCK_UN);
    $ok = ($bytes !== false);
  }
  fclose($fp);

  if ($ok) {
    // Sustituye el archivo final
    @rename($tmp, $file);
    // Ajusta permisos si es la primera vez
    @chmod($file, 0644);
  } else {
    @unlink($tmp);
  }
}

// Si falló la escritura
if (!$ok) {
  $_SESSION['errors'] = ['general' => 'Could not save your review. Please try again later.'];
  header('Location: testimonials.php');
  exit;
}

// Éxito → flash y vuelve
$_SESSION['flash_success'] = 'Thanks! Your review has been submitted.';
header('Location: testimonials.php');
exit;
