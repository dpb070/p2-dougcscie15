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
        $wordArray = array("corect", "horse", "battery", "staple");
        echo "Password: " . $wordArray[0] . "-" . $wordArray[1] . "-" .
          $wordArray[2] . "-" . $wordArray[3];
      ?>
    </p>

</body>
</html>
