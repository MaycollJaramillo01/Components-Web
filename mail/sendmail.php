<?php
// ==================================================
// sendemail.php — cPanel mail() version
// ==================================================
header('Content-Type: application/json');

// --- CONFIGURACIÓN PRINCIPAL ---
$siteName = "J & L Cleaning Services LLC";
$to       = "jlcleaning@jandlcleaningservicellc.com";   // correo principal del sitio
$bcc      = "developer1@gomavenhub.com";     // copia oculta

// --- FUNCIONES DE LIMPIEZA ---
function clean($s) {
    return htmlspecialchars(trim((string)$s), ENT_QUOTES, 'UTF-8');
}

// --- CAPTURA DE DATOS ---
$name    = clean($_POST['name'] ?? '');
$email   = clean($_POST['email'] ?? '');
$phone   = clean($_POST['Phone'] ?? '');
$subject = clean($_POST['Subject'] ?? 'Website Contact Form');
$message = clean($_POST['message'] ?? '');

// --- VALIDACIONES ---
if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "status"  => "error",
        "message" => "Please provide a valid name and email address."
    ]);
    exit;
}

// --- CONSTRUCCIÓN DEL CORREO ---
$mailSubject = "📩 New Message from {$siteName} Website";
$body  = "<html><body style='font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#111'>";
$body .= "<h2>New Contact Form Submission</h2>";
$body .= "<p><strong>Name:</strong> {$name}</p>";
$body .= "<p><strong>Email:</strong> {$email}</p>";
if (!empty($phone))   $body .= "<p><strong>Phone:</strong> {$phone}</p>";
if (!empty($subject)) $body .= "<p><strong>Subject:</strong> {$subject}</p>";
if (!empty($message)) $body .= "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";
$body .= "<hr><p style='font-size:13px;color:#666'>Sent from <a href='jandlcleaningservicellc.com'>jandlcleaningservicellc.com</a></p>";
$body .= "</body></html>";

// --- CABECERAS ---
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: {$name} <{$email}>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "Bcc: {$bcc}\r\n";

// --- ENVÍO ---
if (mail($to, $mailSubject, $body, $headers)) {
    echo json_encode([
        "status"  => "success",
        "message" => "Thank you, your message has been sent successfully!"
    ]);
} else {
    echo json_encode([
        "status"  => "error",
        "message" => "There was a problem sending the email. Please try again later."
    ]);
}
exit;
?>
