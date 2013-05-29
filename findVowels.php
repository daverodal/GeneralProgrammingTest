<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="demo.css">

</head>
<body>
Discover!
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: david
 * Date: 5/29/13
 * Time: 11:27 AM
 * To change this template use File | Settings | File Templates.
 */

$file = file_get_contents("en_US.DIC");
$lines = explode("\r\n",$file);
$i = 0;
$longestLine = "";
foreach($lines as $line){
    $match = array();
    $line = strtolower($line);
    if(!preg_match("/^[a-z]+/",$line,$match)){
        continue;
    }
    $line = $match[0];
    if(!strlen($line)){
        continue;
    }

    findLongest($line);
    $ret = allInOrder($line);
    if($ret !== false){
        $inOrderWords[] = $ret;
    }
}

function allInOrder($line){

    $origLine = $line;
    $vowels = "aeiou";
    while(strlen($vowels)){
        $vowel = $vowels[0];
        $vowels = substr($vowels,1);
        $ret = strrpos($line,$vowel);
        if($ret === false){
            return false;
        }
        /* if we get here we can assume there are no other vowels left */
        if($vowel == 'u'){
            return $origLine;
        }
        $before = substr($line,0,$ret + 1);

        if(strlen($vowels) ==  0  || preg_match('/['.$vowels.']/',$before)){
            return false;
        }
        $line = substr($line,$ret + 1);
    }
    return $origLine;
}
function findLongest($line){
    global $longestLine;
    $isGood = true;
    foreach(array('a','e','i','o','u') as $vowel){
        if(strstr($line, $vowel) === false){
            $isGood = false;
            break;
        }
    }
    if($isGood){
        if(strlen($line) > strlen($longestLine)){
            $longestLine = $line;
        }
    }
}
?>
<div>
    <span class="label">words with all vowels in order:<br></span>
    <?php foreach($inOrderWords as $word){
            echo "$word<br>";
}?>
</div>
<div><span class="label">longest word with all vowels:<br></span>
    <?php echo "$longestLine";?>
</div>
<div id="otherDemos">
    Other demos here<br>
    <a href="aPlusBPlusC.php">A + B + C</a>
    <a href="CamelCase.php">CamelCaseWordsDemo</a>
</div>
</body>
</html>