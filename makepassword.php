<?php
  
  // The plain text password to be hashed
  $plaintext_password = "jaydev123";
  
  // The hash of the password that
  // can be stored in the database
  $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
  
  // Print the generated hash
  echo "Generated hash: ".$hash;

  // username - deep
  // password - dips2486
  
  // username - jaydev
  // password - jaydev123
?>

