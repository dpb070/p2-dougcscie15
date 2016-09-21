<!-- Doug Bradley  -->
<!-- CSCIE-15 -->
<!-- Fall 2016 -->
<!-- Assignment P2 - due 9/22-->
<!-- XKCD-style password generator (see http://xkcd.com/936/) -->
<!-- Main entry page-->
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
    <?php require 'logic.php'; ?>
</head>

<body>
  <h1>Project 2:  xkcd-style password generator</h1>
    <p>
      <form method='POST', action="index.php"
        <label> Number of Words in Password: </label>
        <input type='text' name='wordcount'>
        <input type="checkbox" name="number_flag" value="1"> <label>Number</label>
        <input type='submit'>
      </form>
    </p>
    <?php
    if ($validInput) {
      echo "Password: ";
      for ($i = 0; $i < count($pwArray); $i++) {
        echo " $pwArray[$i]";
      }
    } else {
       echo "Please enter an integer between 3 and 9";
    }
    ?>
</body>
</html>
