<?php 
function decrypt_data($data) {
    //Define cipher 
    $cipher = "aes-256-cbc";
    $encrypted_data = $data;
    $encryption_key = 'QeThWmZq4t7w!z%C*F-JaNdRfUjXn2r5';
    $iv_size = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($iv_size);
    $iv = hex2bin('adb752c7dcff6acb2d78d1273f318f1c');
    //Decrypt data 
    $decrypted_data = openssl_decrypt($encrypted_data, $cipher, $encryption_key, 0, $iv);

    // echo "Decrypted Text: " . $decrypted_data;
    return $decrypted_data;
}
 
?>