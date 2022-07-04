
<h1>Notifications</h1>

<?php
session_start();

    define('DBINFO', 'mysql:host=localhost;dbname=freight');
    define('DBUSER','root');
    define('DBPASS','');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    $id = $_GET['id'];

    $query ="UPDATE `payment` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `payment` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='payment'){
               $file=$_GET[$i['bankslip']];
                $dir="C:/xampp/htdocs/freight/paymentslips/term paper6.docx";
                
                $naa=glob($dir.$file );
            
                     $handle= fopen($dir, "r");
                     echo $handle;
                    
                      
                }

                
                
            }
        }
    
    
?><br/>
<a href="payment.php">Back</a>