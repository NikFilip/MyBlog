#!/usr/local/bin/php 
<!DOCTYPE html>
<html>
  <head>
    <title>My First PHP Page</title>
  </head>

  <body>
    <p>
    <?php
      $f = glob("wordfiles/*.txt");
      foreach ($f as $somefile) {
         $text = file_get_contents($somefile);
         print "<h3>I just read ".$somefile."==" . 
             basename($somefile) . "</h3>";
         print $text."<br />";
      }      
    ?>
    </p>
    <?php
      $folder = "wordfiles";
      foreach (scandir($folder) as $filename) {
        if ($filename<>"." && $filename<>"..")
          print "<li>$filename</li>\n";
      }
    ?>
    </p>
  </body>
</html>