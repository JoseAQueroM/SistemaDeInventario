<?php 

include('./db.php');
$SQL = "SELECT * FROM herramientas";
$select = $conex->prepare($SQL);
$select->execute();

$rows = $select->fetchAll(\PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    print $row["articulo"].";". $row["tipo_unidad"].";". $row["cantidad"].";".$row["fecha"]."\n";
}




?>