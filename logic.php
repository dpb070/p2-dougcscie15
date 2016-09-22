<!-- Doug Bradley  -->
<!-- CSCIE-15 -->
<!-- Fall 2016 -->
<!-- Assignment P2 - due 9/22-->
<!-- XKCD-style password generator (see http://xkcd.com/936/) -->
<!-- logic processing -->
<!--  -->
<?php
$dictArray = array("corect",
    "horse",
    "battery",
    "staple",
    "now",
    "is",
    "the",
    "time",
    "for",
    "all",
    "good",
    "men");
    $dictUpperIndex = count($dictArray) - 1;
    $specialSymbolList = "~ ! @ # $ % ^ & * ( ) _ + = [ ] { } < > ?";
    $specialSymbolArray = explode(' ',$specialSymbolList);
    $specialSymbolArrayCount = count($specialSymbolArray);

    $pwMinWords = 3; # minimum words in phrase
    $pwMaxWords = 10; # maximum words in phrase
    $validationErrMsg = "Please enter a number of words between "
    .$pwMinWords." and ".$pwMaxWords;
    $wordSep = ' ';

    /* boolean for posting method so initial GET is ignored */
    $posting = ($_SERVER['REQUEST_METHOD'] == 'POST');

    /* build the password string in pwArray by selecting a random
    word and addiing it to the array.  Check for and remove duplicate words
    */
    $errDisplay = " ";
    $pwDisplay = " ";

    if ($posting) {
        $pwWordCount = $_POST["wordcount"];
        $validInput =   (is_numeric($pwWordCount) &&
                        $pwWordCount >= $pwMinWords &&
                        $pwWordCount <= $pwMaxWords);
        if ($validInput) {
            $pwArray = [];
            $pwArrayCount = 0;
            while(count($pwArray) < $pwWordCount) {
                $pwArray[$pwArrayCount] = $dictArray[rand(0,$dictUpperIndex)];  #add
                $pwArray = array_unique($pwArray); #remove if duplicate
                $pwArrayCount = count($pwArray);
            }
            /* If number flag is set, substitute a number into a random position in
            the array.  If symbol flag is set, add a random symbol at the end of a
            word.
            */
            if (isset($_POST["number_flag"])) {
                $pwNum = rand(0,1000);
                $replaceArrayPos = rand(0,$pwArrayCount -1);
                $pwArray[$replaceArrayPos] = $pwNum;
            }
            if (isset($_POST["symbol_flag"])) {
                $pwSymArrayPos = rand(0,$specialSymbolArrayCount-1);
                $replaceArrayPos = rand(0,$pwArrayCount -1);
                $pwArray[$replaceArrayPos] = $pwArray[$replaceArrayPos].$specialSymbolArray[$pwSymArrayPos];
            }
            /* Set word delimiter from radio button selection */
            if ($_POST["word_separator"]=="hyphen") {
                $wordSep = "-";
            } else {
                $wordSep = " ";
            }
            $pwDisplay = "Password: ".implode($wordSep, $pwArray);
        } else {
            $errDisplay = "Error: ".$validationErrMsg;
        }
    }
