<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/railway_config.php';

echo "Starting database test...\n";

$con = railway_db_connect();

if ($con) {
    echo "DATABASE CONNECTED SUCCESSFULLY\n";
    echo "Server: " . $con->server_info . "\n";
} else {
    echo "DATABASE CONNECTION FAILED\n";
}
