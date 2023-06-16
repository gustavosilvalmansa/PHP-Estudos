<?php
function getCharType($char) {
    if (ctype_alpha($char)) {
      return 'L'; // Letter
    } elseif (ctype_digit($char)) {
      return 'N'; // Number
    } else {
      return ''; // Other characters
    }
  }
  
  function getTypePattern($input) {
    $pattern = '';
    $length = strlen($input);
  
    for ($i = 0; $i < $length; $i++) {
      $char = $input[$i];
      $charType = getCharType($char);
      $pattern .= $charType;
    }
  
    return $pattern;
  }
  
  $PLACA = "ABC123"; // Replace with the variable you want to extract the character types from
  
  $charPattern = getTypePattern($PLACA);
  if (!empty($charPattern)) {
    echo "The character type pattern of the variable is: $charPattern";
  } else {
    echo "No valid character types found in the variable.";
  }
  ?>