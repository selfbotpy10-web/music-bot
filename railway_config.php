<?php
// Railway database configuration.
// Credentials are read from environment variables only.

function railway_env($name, $default = null) {
    $value = getenv($name);

    if ($value === false || $value === '') {
        return $default;
    }

    return $value;
}

function railway_db_connect($prefix = 'DB') {
    $host = railway_env($prefix . '_HOST', railway_env('MYSQLHOST', ''));
    $port = (int) railway_env($prefix . '_PORT', railway_env('MYSQLPORT', '3306'));
    $user = railway_env($prefix . '_USER', railway_env('MYSQLUSER', ''));
    $password = railway_env($prefix . '_PASSWORD', railway_env('MYSQLPASSWORD', ''));
    $database = railway_env($prefix . '_NAME', railway_env('MYSQLDATABASE', ''));

    // Read public MySQL URL when database is in another Railway project.
    $public_url = railway_env('MYSQL_PUBLIC_URL', '');

    if ($public_url !== '') {
        $url = parse_url($public_url);

        if (is_array($url)) {
            $host = $url['host'] ?? $host;
            $port = (int)($url['port'] ?? $port);
            $user = urldecode($url['user'] ?? $user);
            $password = urldecode($url['pass'] ?? $password);
            $database = ltrim($url['path'] ?? '', '/') ?: $database;
        }
    }

    if ($host === '' || $user === '' || $database === '' || $port < 1 || $port > 65535) {
        error_log('Railway DB configuration is incomplete or invalid.');
        return false;
    }

    mysqli_report(MYSQLI_REPORT_OFF);

    $con = mysqli_init();

    if (!$con) {
        error_log('Could not initialize mysqli.');
        return false;
    }

    if (!mysqli_real_connect($con, $host, $user, $password, $database, $port)) {
        error_log('Database connection failed: ' . mysqli_connect_error());
        return false;
    }

    if (!mysqli_set_charset($con, 'utf8mb4')) {
        error_log('Could not set database charset.');
    }

    return $con;
}
