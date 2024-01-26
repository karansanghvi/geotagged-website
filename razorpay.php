<?php
$razorpay_payment_id = $_POST['razorpay_payment_id'];
$razorpay_order_id = $_POST['razorpay_order_id'];
$razorpay_signature = $_POST['razorpay_signature'];

// Verify the signature
$signature_verified = verifySignature($razorpay_payment_id, $razorpay_order_id, $razorpay_signature);

if ($signature_verified) {
  // Payment successful, update your database
  echo "Payment Successful. Transaction ID: " . $razorpay_payment_id;
} else {
  // Payment failed, handle the error
  echo "Payment Failed";
}

function verifySignature($razorpay_payment_id, $razorpay_order_id, $razorpay_signature) {
  $api_key_secret = "B7GwC5v7lvOEp8JnXyQzcOR7";
  $signature = hash_hmac('sha256', $razorpay_payment_id . '|' . $razorpay_order_id, $api_key_secret);

  return ($signature === $razorpay_signature);
}
?>

