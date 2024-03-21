<?php
require 'vendor/autoload.php'; // Assicurati di includere il file autoload.php di Braintree

use Braintree\Gateway;

// Inizializza la tua chiave API di Braintree
$gateway = new Gateway([
    'environment' => 'sandbox',
    'merchantId' => '7txby8fhqzdjpvtw',
    'publicKey' => 'n55dv4wrshd4mwgz',
    'privateKey' => '003e0df425571ff3393dad1ff69a029e'
]);

// Ottieni il nonce di pagamento inviato dal client
$nonceFromTheClient = $_POST['payment_method_nonce'];

// Crea una transazione utilizzando il nonce del pagamento
$result = $gateway->transaction()->sale([
    'amount' => '10.00', // Importo della transazione
    'paymentMethodNonce' => $nonceFromTheClient,
    'options' => [
        'submitForSettlement' => true // Invia la transazione per l'elaborazione immediata
    ]
]);

if ($result->success) {
    // Transazione completata con successo
    $transactionId = $result->transaction->id;
    echo json_encode(['success' => true, 'message' => 'Pagamento completato con successo', 'transaction_id' => $transactionId]);
} else {
    // Pagamento non riuscito
    $errorMessage = $result->message;
    echo json_encode(['success' => false, 'message' => 'Pagamento non riuscito', 'error_message' => $errorMessage]);
}
?>