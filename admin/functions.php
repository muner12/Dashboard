<?php
function encrypt($simple_string){
    
// Storing a string into the variable which
// needs to be Encrypted


// Displaying the original string


// Storingthe cipher method
$ciphering = "AES-128-CTR";

// Using OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Storing the encryption key
$encryption_key = "W3docs";

// Using openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);

// Displaying the encrypted string
return $encryption;

}



function decrypt($encryption){
// Non-NULL Initialization Vector for decryption
$decryption_iv = '1234567891011121';
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Storing the decryption key
$decryption_key = "W3docs";

// Using openssl_decrypt() function to decrypt the data
$decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

// Displaying the decrypted string
return $decryption;

}



function validatoin(){
    
}
