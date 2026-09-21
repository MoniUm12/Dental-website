<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
    exit;
}

function contact_value(string $key): string
{
    return isset($_POST[$key]) && is_string($_POST[$key]) ? trim($_POST[$key]) : '';
}

$firstName = contact_value('first_name');
$lastName = contact_value('last_name');
$email = contact_value('email');
$dentist = contact_value('dentist');
$message = contact_value('message');
$acceptedTerms = isset($_POST['checkbox']);

if ($firstName === '' || $lastName === '' || $email === '' || $dentist === '' || $message === '' || !$acceptedTerms) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Please complete all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
    exit;
}

$recipient = 'monika.umredkar@gmail.com';
$subject = 'New SmileCare contact form submission';
$body = "First name: {$firstName}\n"
    . "Last name: {$lastName}\n"
    . "Email: {$email}\n"
    . "Dentist preference: {$dentist}\n\n"
    . "Message:\n{$message}\n";
$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'From: SmileCare Website <monika.umredkar@gmail.com>',
    'Reply-To: ' . $email,
];

if (!@mail($recipient, $subject, $body, implode("\r\n", $headers))) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Unable to send your message. Please try again later.']);
    exit;
}

echo json_encode([
    'status' => 'success',
    'message' => 'Message sent successfully!'
]);
