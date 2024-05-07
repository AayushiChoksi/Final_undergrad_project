<?php 

function encrypt_data($plain_text)
{
    //Define cipher 
    $cipher = "aes-256-cbc";

    //Generate a 256-bit encryption key 
    // $encryption_key = openssl_random_pseudo_bytes(32); 
    $encryption_key = 'QeThWmZq4t7w!z%C*F-JaNdRfUjXn2r5';
    // echo $encryption_key;
    // Generate an initialization vector 
    $iv_size = openssl_cipher_iv_length($cipher);
    // $iv = openssl_random_pseudo_bytes($iv_size); 
    $iv = hex2bin('adb752c7dcff6acb2d78d1273f318f1c');
    $data = $plain_text;
    //Data to encrypt 
   
    $encrypted_data = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv);

    // echo "Encrypted Text: " . $encrypted_data;

    return $encrypted_data;

}

?>