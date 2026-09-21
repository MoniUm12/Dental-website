<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
    exit;
}

function form_value(string $key): string
{
    return isset($_POST[$key]) && is_string($_POST[$key]) ? trim($_POST[$key]) : '';
}

$name = form_value('name');
$email = form_value('email');
$message = form_value('message');
$dentist = form_value('dentist');
$appointmentDate = form_value('appointment_date');

if ($email === '') {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Please complete all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
    exit;
}

$isContactRequest = $name !== '' || $message !== '';

if ($isContactRequest && ($name === '' || $message === '')) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Please complete all required fields.']);
    exit;
}

if (!$isContactRequest && ($dentist === '' || $appointmentDate === '')) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Please select a dentist and appointment date.']);
    exit;
}

$recipient = 'monika.umredkar@gmail.com';
$subject = $isContactRequest ? 'New SmileCare contact request' : 'New SmileCare appointment request';
$body = $isContactRequest
    ? "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}\n"
    : "Email: {$email}\nDentist preference: {$dentist}\nAppointment date: {$appointmentDate}\n";
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

echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);
