<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// require 'loader/autoloader.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

try {
    $mail = new PHPMailer(true);

    // Server Settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'swiftpaygh.com';

    // Recipents
    $mail->setFrom('info@swiftpaygh.com', 'Swiftpay GH');
    $mail->addReplyTo('swiftpaygh30@gmail.com', 'Swiftpay GH Info');
    $mail->addAddress('kpin463@gmail.com');
    $mail->Subject = 'dollarsoft';

    // Message
    $mail->isHTML(true);
    $mail->Body = '
        <div style="width: 100%;height: 100%;padding: 16px; margin: 0;background: #253131">
            <table style="width: 600px; height:100%; margin: auto" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td style="text-align: center; background-color: #c7e2dd; height: 200px; padding: 12px 8px">
                            <img src="http://swiftpaygh.com/images/logo.jpg" width="200px">
                        </td>
                    </tr>
                    <tr>
                        <td style="background: #F0F0F0;padding: 24px 16px;vertical-align: top">
                            <table style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;">
                                            <h1>'.$title.'</h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="font-size: 20px;text-align: center">'.$message.'</p>
                                        </td>
                                    </tr>
                                    '.(is_null($link) ? '' : '
                                    <tr>
                                        <td style="padding: 24px 8px;text-align: center;">
                                            <a href="'.$link.'" style="padding: 12px 16px;background-color: #618988">Click Here</a>
                                        </td>
                                    </tr>
                                    ').'
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #B8B8B8;text-align: center; background-color: #040720;padding: 16px; height: 100px;">
                            All rights reserved <a style="color: white;" href="swiftpaygh.com">Swiftpay GH</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    
    
    ';

    // return $mail->send();
    var_dump($mail->send());
} catch (Throwable $e) {
    var_dump($e);
}
