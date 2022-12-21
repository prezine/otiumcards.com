<?php

	include_once 'vendor/autoload.php';

    /*
    |--------------------------------------------------------------------------
    | System Const
    |--------------------------------------------------------------------------
    |
    | This Const would be used by the Pandascrow controllers and modules servives to interract 
    | and serve functions and as variables where deemed fit
    |
    */

    $dotenv = Dotenv\Dotenv::createMutable(__DIR__);
	$dotenv->safeLoad();

    // Set IP Array for Localhost
    $whitelist = array(
        '127.0.0.1',
        '::1'
    );
    
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */
   
    defined('APP_NAME')         OR define('APP_NAME', $_ENV['APP_NAME']);

    /*
    |--------------------------------------------------------------------------
    | Application Environment & Version
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    defined('APP_ENV')          OR define('APP_ENV', $_ENV['APP_ENV']);

    defined('API_VERSION')      OR define('API_VERSION', $_ENV['API_VERSION']);
    
    // local, development, staging, production, and live

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    /*
        => Development Mood
    */
    defined('APP_DEBUG')        OR define('APP_DEBUG', $_ENV['APP_DEBUG']); // true or false

    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);
    
    error_reporting(E_ALL);
    
    error_reporting(E_WARNING);
    
    error_reporting(E_NOTICE);
    
    error_reporting(E_ALL & ~E_NOTICE);
    
    error_reporting(-1);

    // defined('APP_DEBUG')        OR define('APP_DEBUG', false);

    // ini_set('display_errors', 0);
    
    // error_reporting(0);

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Pandascrow command line tool. You should set this to the root of
    | your application so that it is used when running Pandascrow tasks.
    |
    */

    defined('APP_URL')          OR define('APP_URL', $_ENV['APP_URL']);

    defined('IMG_URL')          OR define('IMG_URL', $_ENV['IMG_URL']);

    defined('DOC_URL')          OR define('DOC_URL', $_ENV['DOC_URL']);

    /*
    |--------------------------------------------------------------------------
    | Application Storage
    |--------------------------------------------------------------------------
    |
    | This URL is used by the software to properly store files from uploads
    | configure the path to accept uploads of photos, files and etc...
    |
    */

    defined('APP_STORAGE')      OR define('APP_STORAGE', APP_URL.'app/storage/');
    
    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    defined('TIMEZONE')         OR define('TIMEZONE', 'UTC');

    defined('GLOBAL_DATE')      OR define('GLOBAL_DATE', date(DATE_RFC2822));
    
    defined('DEVICE_DATE')      OR define('DEVICE_DATE', date("Y-m-d"));

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    defined('LOCALE')           OR define('LOCALE', 'en');

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    defined('KEY')              OR define('KEY', $_ENV['APP_KEY']);
    
    defined('CIPHER')           OR define('CIPHER', $_ENV['CIPHER']);

    defined('RAND_TIMESTAMP')   OR define('RAND_TIMESTAMP', round(microtime(true)));

    /*
    |--------------------------------------------------------------------------
    | System Configurations and Settings
    |--------------------------------------------------------------------------
    |
    | This sections contains short quick, and magic constant defined by PHP
    | to get system value
    |
    */
    defined('SERVER_PORT')      OR define('SERVER_PORT', $_SERVER['SERVER_PORT']);
    
    defined('SERVER_PROTOCOL')  OR define('SERVER_PROTOCOL', $_SERVER['SERVER_PROTOCOL']);
    
    defined('DOCUMENT_ROOT')    OR define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
    
    defined('REQUEST_METHOD')   OR define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);    
    
    defined('APPPATH')          OR define('APP_PATH', dirname( __FILE__ ));
 
    defined('DEVICE_IP')        OR define('DEVICE_IP', $_SERVER['REMOTE_ADDR']);
 
    defined('USER_AGENT')       OR define('USER_AGENT', getenv("HTTP_USER_AGENT"));

    defined('HTTP_REFERER')     OR @define('HTTP_REFERER', $_SERVER['HTTP_REFERER']);

    /*
    |--------------------------------------------------------------------------
    | Database Config
    |--------------------------------------------------------------------------
    |
    | This value contains the database connection that helps this application
    | Which includes host, name, user, port and code for connection with preferred 
    | database client.
    |
    */

    defined('DATABASE_HOST')    OR define('DATABASE_HOST', $_ENV['DB_HOST']);

    defined('DATABASE_NAME')    OR define('DATABASE_NAME', $_ENV['DB_DATABASE']);

    defined('DATABASE_USER')    OR define('DATABASE_USER', $_ENV['DB_USERNAME']);
    
    defined('DATABASE_CODE')    OR define('DATABASE_CODE', $_ENV['DB_PASSWORD']);
    
    defined('DATABASE_PORT')    OR define('DATABASE_PORT', $_ENV['DB_PORT']);

    /*
    |--------------------------------------------------------------------------
    | API Key & Tokens
    |--------------------------------------------------------------------------
    |
    | This key is used by the Pandascrow external interraction servives to interract 
    | and cURL up remote services from third parties.
    |
    */
    
    # ===> https://github.com/PHPMailer/PHPMailer
    
    defined('MAIL_HOST')        OR define('MAIL_HOST', $_ENV['MAIL_HOST']);
    
    defined('MAIL_USERNAME')    OR define('MAIL_USERNAME', $_ENV['MAIL_USERNAME']);

    defined('MAIL_PASSWORD')    OR define('MAIL_PASSWORD', $_ENV['MAIL_PASSWORD']);

    defined('MAIL_PORT')        OR define('MAIL_PORT', $_ENV['MAIL_PORT']);
    
    defined('MAIL_FROM')        OR define('MAIL_FROM', $_ENV['MAIL_FROM_ADDRESS']);
    
    defined('MAIL_NAME')        OR define('MAIL_NAME', $_ENV['MAIL_FROM_NAME']);

    # ===> Sendgrid

    defined('SENDGRID_API_KEY') OR define('SENDGRID_API_KEY', $_ENV['SENDGRID_API_KEY']);

    # ===> Pandascrow

    defined('PANDASCROW_PK')        OR define('PANDASCROW_PK', $_ENV['PANDASCROW_PK']);

    defined('PANDASCROW_SK')        OR define('PANDASCROW_SK', $_ENV['PANDASCROW_SK']);

    defined('PANDASCROW_KEY')        OR define('PANDASCROW_KEY', $_ENV['PANDASCROW_KEY']);

    defined('PANDASCROW_BASEURL')   OR define('PANDASCROW_BASEURL', $_ENV['PANDASCROW_BASEURL']);