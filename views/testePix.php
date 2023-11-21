<?php  

require '../vendor/autoload.php';

use \App\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

$obPayload = (new Payload)->setPixKey('52021829880')
                          ->setDesc('cuzinho so 10 reais')
                          ->setMerchantName('Alexandre Grota')
                          ->setMerchantCity('Pau linia')
                          ->setAmount(10.00)
                          ->setTxid('NicPinto1234');

$payloadQrCode = $obPayload->getPayload();

$obQrCode = new QrCode($payloadQrCode);


$image = (new Output\Png)->output($obQrCode,400);
header("Content-Type: image/png");
echo $image;
?>
<img src="<?=$image?>" alt="" srcset=""> </img>



