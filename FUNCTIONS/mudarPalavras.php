<?php
function modifyWords($inputString) {
    $replacements = array(
        'síntomas' => 'sin tomas',
        'termómetro' => 'termo metro',
        'sensación' => 'sensa cion',
        'alteración' => 'altera cion',
        'disminución' => 'disminu cion',
        'visión' => 'vi sion',
        'secreción' => 'secre cion',
        'pezón' => 'pe zon',
        'extraño' => 'extranio',
        'audición' => 'audi cion',
        'relación' => 'rela cion',
        'pélvico' => 'pel vico',
        'Párpado' => 'parpado',
        'hinchazón' => 'hincha zon'
    );

    $words = explode(' ', $inputString);
    $modifiedWords = array();

    foreach ($words as $word) {
        $modifiedWord = isset($replacements[$word]) ? $replacements[$word] : $word;
        $modifiedWords[] = strtolower($modifiedWord);
    }

    $outputString = implode(' ', $modifiedWords);
    return $outputString;
}

// Example usage
$input = 'Tengo síntomas de hinchazón y disminución de visión';
$output = modifyWords($input);
echo $output;