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
    <link rel="stylesheet" href="lib/HTML-KickStart-master/css/kickstart.css" media="all">
    <link rel="stylesheet" href="css/p2.css"
    <?php require 'logic.php'; ?>
</head>

<body>
  <h3>Project 2:  xkcd-Style Password Generator</h3>
  <div class="col_7" id="form_info">
      <form method='POST', action="index.php">
          <div class="form_section">
              <label> Number of Words in Password: </label>
              <input type='text' name='wordcount'>
          </div>
          <div class="form_section">
              <label>Replace one word with number</label>
              <input type="checkbox" name="number_flag" value="1">
              <label>Add a special symbol</label>
              <input type="checkbox" name="symbol_flag" value="1">
          </div>
          <div class="form_section">
                <label>Word separator</label>
                <input type="radio" name="word_separator" value="space" checked>Space
                <input type="radio" name="word_separator" value="hyphen">Hyphen
          </div>
          <div class="form_section">
              <input type='submit'>
          </div>
      </form>
  </div>

    <div class="col_7" id="error_display">
    <?php
       echo $errDisplay
    ?>
  </div>
    <div class="col_7" id="password_display">
      <?php
         echo $pwDisplay;
      ?>
    </div>
</body>
</html>
