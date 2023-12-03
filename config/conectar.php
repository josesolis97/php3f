<?php //ini_set( 'display_errors', '1' ); ?>

<?php
/*
Conecta y realiza los querys de la base de datos
*/
function MySQLSESSION_ExecuteSQL($Query)
{
   $mysqlSESSION_database = mysqli_connect ("149.50.129.209", "martes19", "ZhP6aH4E1f2pQwqSX672","martes19") ;

	//echo $Query;

   $Recorset='';
   if ($mysqlSESSION_database) {
      mysqli_set_charset( $mysqlSESSION_database, 'utf8');
      mysqli_query($mysqlSESSION_database, "SET SESSION sql_mode = ' ' ");
      
      $Recordset = mysqli_query($mysqlSESSION_database, $Query);
   }
   return $Recordset;
}

?>