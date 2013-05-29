<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="demo.css">

</head>
<body>
Transform!
<div>
    <?php
    /**
     * Created by JetBrains PhpStorm.
     * User: david
     * Date: 5/29/13
     * Time: 11:10 AM
     * To change this template use File | Settings | File Templates.
     */
    if (isset($_GET['theWord'])) {
        camelCase($_GET['theWord']);
    }
    echo "<form method='get'><input type='text' name='theWord'><input type='submit' value='press'></form> ";



    function camelCase($word)
    {
        $word = trim($word);
        $words = explode('_', $word);
        foreach ($words as $thisWord) {
            echo ucfirst(strtolower($thisWord));
        }
    }
    ?></div>
<div id="otherDemos">
    Other demos here<br>
    <a href="findVowels.php">Find the Vowels</a>
    <a href="aPlusBPlusC.php">A + B + C</a>
</div>
</body>
</html>