<?php
require 'config.php'; // Make sure this contains the line \Stripe\Stripe::setApiKey('sk_test_YOURKEY');

header('Access-Control-Allow-Origin: *'); // This allows requests from all origins. Restrict it to your domain in production.
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit();
}

if (!isset($_POST['amount']) || !is_numeric($_POST['amount'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid amount']);
    exit();
}

$amount = $_POST['amount'] * 100; // Convert to cents

try {
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $amount,
        'currency' => 'inr', // or 'usd' depending on the user's choice
        'payment_method_types' => ['card'],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
