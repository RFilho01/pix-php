<?php 

require __DIR__.'/vendor/autoload.php';


use \App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

// Instancia Principal do Payload Pix
$obPayload = (new Payload)->setPixKey('11111111')
                          ->setDescription('Teste-Payload-Pix')
                          ->setMerchantName('Nome')
                          ->setMerchantCity('JOAO PESSOA')
                          ->setAmount(1.00)
                          ->setTxid('PDV123');


// Codigo de Pagamento Pix
$payloadQrCode = $obPayload->getPayload();

// Qr Code
$obQrCode = new QrCode($payloadQrCode);

// Imagem (Qr Code)
$image = (new Output\Png)->output($obQrCode, 400);

?>

<h1>QR CODE</h1>
<br>
<img src="data:image/png;base64, <?=base64_encode($image)?>">

Codigo Pix: <br>

<strong><?=$payloadQrCode?></strong>
