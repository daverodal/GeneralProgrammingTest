<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="demo.css">

</head>
<body>
Behold!
<div>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: david
 * Date: 5/29/13
 * Time: 10:53 AM
 * To change this template use File | Settings | File Templates.
 */
aPlusBPlusC();

function aPlusBPlusC(){
    $a = 1; $b = 2; $c = 3;
    /* Max of 1000 can probably be less */
    for(; $a < 1000;$a++){
        for($b = $a+1;$b< 1000;$b++){
            /* this line made a big O n**3 turn into a big O n**2 */
            $c = 1000 - ($a + $b);
            if($a*$a + $b * $b == $c * $c){
                echo "A $a B $b C $c";
                return;
            }
        }
    }
}?>
</div>
<div id="otherDemos">
    Other demos here<br>
    <a href="CamelCase.php">CamelCaseWordsDemo</a>
    <a href="findVowels.php">Find the Vowels</a>
</div>
</body>
</html>