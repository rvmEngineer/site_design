<?php
     

include(__DIR__."/../views_to_user_php/010_003/000_Settings/000_Initial_settings/start.php");   
// static class
Dotenv::load(__DIR__."/../");
include(__DIR__."/../views_to_user_php/010_003/000_Settings/001_database_env_settings/db.php");   
include(__DIR__."/../views_to_user_php/010_003/000_Settings/002_router_settings/router.php");  
 
    //It is an array pointer as per note link     
    $match =$router->match(); 
 //   list($controller,$method)=array(0,1);
        //explode("@",$match['target']);

  if($match)
  {
      echo "<br> #####Match Found#####<br>";
       
       list($controller,$method)=explode("@",$match['target']);
      
      echo "<br> Controller Class :: ".$controller;
      echo "<br> Controller Class function :: ".$method;
      $callable_falg =is_callable(array($controller,$method));
      echo "<br> Callbale  :: ".$callable_falg;
       
       if(is_callable(array($controller,$method)))
       {
           $object = new $controller();
           call_user_func_array(array($object,$method),array($match['params']));
           echo "<br> #####Inside Callable#####<br>";
       }
       


   }
   else
   {
       echo " <br> #####No Match Found#####<br>";
       include(__DIR__."/../views_to_user_php/010_003/001_pages/001_Error_Pages/error.php");  
   }
 
?>