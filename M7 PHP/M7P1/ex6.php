<html>  
<head>
   <title></title>  
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
</head>  
   <body>  
      <form method='POST'>
         <h2>Please input your name:</h2>  
         <input type="text" name="name">
         <h2>Please input your e-mail:</h2>  
         <input type="text" name="email">  
         <input type="submit" value="Submit">  
      </form>  
<?php  
   if (isset($_POST['email']))
   {
      $email = $_POST['email'];
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
         echo '"' . $email . '" = Valid'."\n";    
      } 
      else
      {
         echo '"' . $email . '" = Invalid'."\n";
      }
   }
?>  
   </body>  
</html>  