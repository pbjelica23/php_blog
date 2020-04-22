<?php

   
   $db['db_host'] = "localhost";//array is db and in this code line has key db_host which has a string value localhost
   $db['db_user'] = "root"; 
   $db['db_pass'] = ""; 
   $db['db_name'] = "cms2"; 

   foreach($db as $key => $value){//going through whole array with foreach loop
      define(strtoupper($key), $value);//convert it to constant(each value of array)
   }

  
   $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);//constants are created with loop and are ready to be used in this line of code
    //da li smo povezani
    if($connection){
        /*echo "konektovani";*/
    }else{
        die("QUERY FAILED ." . mysqli_error($connection));
    }
   
  

?>