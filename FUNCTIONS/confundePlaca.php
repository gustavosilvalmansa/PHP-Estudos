<?php
function hasMOrN($str) {
    return (strpos($str, 'M') !== false || strpos($str, 'N') !== false);
}
function hasAOrK($str) {
    return (strpos($str, 'A') !== false || strpos($str, 'K') !== false);
}
function hasFOrS($str) {
    return (strpos($str, 'F') !== false || strpos($str, 'S') !== false);
}
function hasPOrT($str) {
    return (strpos($str, 'P') !== false || strpos($str, 'T') !== false || strpos($str, 'C') !== false)|| strpos($str, 'D') !== false;
}
function convertPatente($chassi, $letter,$position) {
    $VA = $GLOBALS['VA'];
    $array = str_split($chassi);
    $positions = array();
    if($letter == "M" or $letter == "N"){
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$position] === 'M') {
                $array[$position] = $letter;
                $positions[] = $i;
            } elseif ($array[$position] === 'N') {
                $array[$position] = $letter;
                $positions[] = $i;
            }
        
        }
    }
    if($letter == "F" or $letter == "S"){
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$position] === 'F') {
                $array[$position] = $letter;
                $positions[] = $i;
            } elseif ($array[$position] === 'S') {
                $array[$position] = $letter;
                $positions[] = $i;
            }
        
        }
    }
    if($letter == "A" or $letter == "K"){
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$position] === 'A') {
                $array[$position] = $letter;
                $positions[] = $i;
            } elseif ($array[$position] === 'K') {
                $array[$position] = $letter;
                $positions[] = $i;
            }
        
        }
    }
       if($letter == "P" or $letter == "T" or $letter == "C" or $letter == "D"){
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$position] === 'P') {
                $array[$position] = $letter;
                $positions[] = $i;
            } elseif ($array[$position] === 'T') {
                $array[$position] = $letter;
                $positions[] = $i;
            }
            elseif ($array[$position] === 'C') {
                        $array[$position] = $letter;
                        $positions[] = $i;
            }
            elseif ($array[$position] === 'D') {
                        $array[$position] = $letter;
                        $positions[] = $i;
            }
        }
    }
    $newChassi = implode("", $array);

   $VA->setDialogVariables("PATENTE", $newChassi);
    $VA->setDialogVariables('BKPPATENTE', $newChassi);
    return $newChassi;


}
function checkLetters($str, $position, $type) {
  $VA = $GLOBALS['VA'];
  $VA->setDialogVariables("checkLetters", 1);
  $firstLetter = "";
  $secondLetter ="";
  $thirdLetter = "";
  $fourthLetter = "";
  if($type == "LLLNNN"){
  switch($position){
    case 1:
        $firstLetter = substr($str, 0, 1);
        break;
    case 2:
        $secondLetter = substr($str, 1, 1);
        break;
    case 3:
        $thirdLetter = substr($str, 2, 1);
        break;
    case 4:
        $fourthLetter = substr($str, 3, 1);
        break;
    default:
    $firstLetter = substr($str, 0, 1);
    $secondLetter = substr($str, 1, 1);
    $thirdLetter = substr($str, 2, 1);
    $fourthLetter = substr($str, 3, 1);
        break;
       }
}
 if($type == "LLNNNLL"){
  switch($position){
    case 1:
        $firstLetter = substr($str, 0, 1);
        break;
    case 2:
        $secondLetter = substr($str, 1, 1);
        break;
    case 3:
        $thirdLetter = substr($str, 5, 1);
        break;
    case 4:
        $fourthLetter = substr($str, 6, 1);
        break;
    default:
    $firstLetter = substr($str, 0, 1);
    $secondLetter = substr($str, 1, 1);
    $thirdLetter = substr($str, 5, 1);
    $fourthLetter = substr($str, 6, 1);
        break;
       }
}
    if(hasMOrN($firstLetter)) {
        return "LBL_18543";
        exit;
    }
    if(hasAOrK($firstLetter)) {
        return "LBL_20404";
        exit;
    }
    if(hasFOrS($firstLetter)) {
        return "LBL_18537";
        exit;
    }
     if(hasPOrT($firstLetter)) {
        return "LBL_18739";
        exit;
    }
    if(hasAOrK($secondLetter)) {
        return "LBL_20405";
        exit;
    }
    if(hasMOrN($secondLetter)) {
        return "LBL_18544";
        exit;
    }
    if(hasFOrS($secondLetter)) {
        return "LBL_18538";
        exit;
    }
     if(hasPOrT($secondLetter)) {
        return "LBL_18740";
        exit;
    }
    if(hasAOrK($thirdLetter)) {
        return "LBL_20406";
        exit;
    }
    if(hasMOrN($thirdLetter)) {
        return "LBL_18545";
        exit;
    }
    if(hasFOrS($thirdLetter)) {
        return "LBL_18539";
        exit;
    }
     if(hasPOrT($thirdLetter)) {
        return "LBL_18741";
        exit;
    }
    if(hasAOrK($fourthLetter)) {
        return "LBL_20407";
        exit;
    }
    if(hasMOrN($fourthLetter)) {
        return "LBL_18546";
        exit;
    }
    if(hasFOrS($fourthLetter)) {
        return "LBL_18540";
        exit;
    }
    if(hasPOrT($fourthLetter)) {
        return "LBL_18742";
        exit;
    }
}