#!/usr/bin/php-cgi

<?php include'top.html'; ?>
<?php
try {
   $pdo = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
} catch (PDOException $e){
   die($e->getMessage());
}
$statement = $pdo->query("SELECT name, year FROM movies where year=2006 order by name desc limit 30;");
echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
echo "<caption>Using <em><strong>PDO</strong></em> library</caption>";
foreach ($statement as $row) {
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['year']."</td>";
    echo "</tr>";
}
echo "</table>";

echo "<hr />";
?>
<?php include("bottom.html"); ?>