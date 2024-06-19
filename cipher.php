<?php
$string_to_decode = "Gur puvpxra pebff gur ebnq";
$string_lower = strtolower($string_to_decode);
$alphabet = [
    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", 
    "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"
];
$common_words = ["ante","bajo","contra","desde","entre","hacia","para","por",
    "segun","sobre","tras"," for ","with","from"," a "," con "," in "," on ", 
    " los ", " el ", " de ", " un ", " set ", " win ", " get ", " man ",
    " the "
];
$array_string_to_decode = str_split($string_lower);

$adding_one = 1;
$found = false;
$array_formed = [];
$string_formed = "";
$strings_saved = [];
while($adding_one != 26){
    foreach($array_string_to_decode as $string_element){
        $value_changed = " ";
        if(in_array($string_element,$alphabet)){
            $offset = array_search($string_element,$alphabet) + $adding_one;
            $value_changed = $alphabet[$offset % count($alphabet)];        
        }
        array_push($array_formed,$value_changed);
    }
    $adding_one++;
    $string_formed = implode($array_formed);
    $array_formed = [];
    foreach($common_words as $common_word){
        $found = strpos($string_formed,$common_word);
        if($found !== false){
            $string_formed .= ' '.$adding_one;
            array_push($strings_saved,$string_formed);
        };
    }
    
}
foreach($strings_saved as $string_found)
echo($string_found);
?>