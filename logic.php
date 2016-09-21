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

  $pwWordCount = $_POST["wordcount"];
  $validInput = (is_numeric($pwWordCount) &&
                  $pwWordCount >= 3 &&
                  $pwWordCount <= 9);
  /* build the password string in pwArray by selecting a random
    word and addiing it to the array.  Check for and remove duplicate words
  */
    $pwArray = [];
    $pwArrayCount = 0;
    while(count($pwArray) < $pwWordCount) {
      $pwArray[$pwArrayCount] = $dictArray[rand(0,$dictUpperIndex)];
      $pwArray = array_unique($pwArray);
      $pwArrayCount = count($pwArray);
    }
    /* if number flag is set, substitute a number into a random position in
     the array
    */
    if (isset($_POST["number_flag"])) {
    $pwNum = rand(0,1000);
    $replaceArrayPos = rand(0,$pwArrayCount -1);
    $pwArray[$replaceArrayPos] = $pwNum;
  }
