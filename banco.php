<?php
ini_set('max_execution_time',0);
/*
    define("SERVIDOR",'V00319SQL-GCPRD.intracorp.local,60002');
    define("USER","usr_electroneek");
    define("PASSWORD","e84ut7f0$5@{=");
    define("BANCO","RPA_Electroneek");
*/
$conexao = new PDO("sqlsrv:Database=RPA_Electroneek;server=V00319SQL-GCPRD.intracorp.local,60002;ConnectionPooling=0","usr_electroneek","e84ut7f0$5@{=");
?>