<!DOCTYPE html>
<html>
<body>

<h1>INSERT DATA TO DATABASE</h1>

<?php
ini_set('display_errors', 1);
echo "Update database!";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-34-200-72-77.compute-1.amazonaws.com;port=5432;user=ljwiqvshrklzyz;password=4fe7219c2ec85739a9ee21bc8360861261284e2f869fb8042f8ff1a51caa29b4;dbname=dfadj44em4jmgt",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

//$sql = 'UPDATE student '
//                . 'SET name = :name, '
//                . 'WHERE ID = :id';
// 
//      $stmt = $pdo->prepare($sql);
//      //bind values to the statement
//        $stmt->bindValue(':name', 'Lee');
//        $stmt->bindValue(':id', 'SV02');
        // update data in the database
//        $stmt->execute();

        // return the number of row affected
        //return $stmt->rowCount();
$sql = "UPDATE student SET fname = 'Lee Chan Do' WHERE stuid = 'SV02'";
      $stmt = $pdo->prepare($sql);
if($stmt->execute() == TRUE){
    echo "Record updated successfully.";
} else {
    echo "Error updating record. ";
}
    
?>
</body>
</html>
