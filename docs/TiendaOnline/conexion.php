<?php
function conectar(){
        
   if (!($link=mysql_connect("localhost","root","")))
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mysql_select_db("TiendaOnline3",$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   
   return $link;         
}
?>