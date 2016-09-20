<!-- Doug Bradley  -->
<!-- CSCIE-15 -->
<!-- Fall 2016 -->
<!-- Assignment P2 - due 9/22-->
<!-- XKCD-style password generator (see http://xkcd.com/936/) -->
<!--  -->
<!--  -->
<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <title>P2</title>

</head>
<body>
    <p>
      <?php
        $pwWordCount = 6;
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
        $i = 0;
        /* build the password string in pwArray by selecting a random
        word and addiing it to the array.  Check for and remove duplicate words
        */
        $pwArray = [];
        while(count($pwArray) < $pwWordCount) {
          $pwArray[$i] = $dictArray[rand(0,$dictUpperIndex)];
          $pwArray = array_unique($pwArray);
          $i = count($pwArray);
          }

        for ($i = 0; $i < count($pwArray); $i++) {
          echo " $pwArray[$i]";
        }
        
      ?>
    </p>
</body>
</html>
