<?php

    define('PERCH_LICENSE_KEY', 'XXXXXX-XXXXXX-XXXXXX-XXXXXX-XXXXXX');

    define("PERCH_DB_USERNAME", 'root');
    define("PERCH_DB_PASSWORD", 'root');
    define("PERCH_DB_SERVER", "thatemil.dev");
    define("PERCH_DB_DATABASE", "thatemil_perch");
    define("PERCH_DB_PREFIX", "perch2_");
    
    define('PERCH_TZ', 'Europe/Stockholm');

    define('PERCH_EMAIL_FROM', 'mail@example.com');
    define('PERCH_EMAIL_FROM_NAME', 'Emil Björklund');

    define('PERCH_LOGINPATH', '/system');
    define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', dirname(__FILE__)));
    define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');

    define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
    define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');
    
    define('PERCH_HTML5', true);

    //define('PERCH_DEBUG', true);
  
?>