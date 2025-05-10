<?php
// Database connection details
$serverName = "RAVEEN_LENOVO";
$connectionOptions = [
    "Database" => "webEditorData",
    "Uid" => "saliyaAdmin001",
    "PWD" => 'saliya007#'
];

// Establish database connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    error_log(print_r(sqlsrv_errors(), true));
    die("Database connection failed.");
}
?>