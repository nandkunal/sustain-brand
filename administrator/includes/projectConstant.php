<?php

/*
 * Database Constants
 *
 */
define('DB_HOSTNAME','localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_DIR', '');
define('DB_DATABASE', DB_DIR.'sustain_brand');
define('DB_DSN','mysql:dbname='.DB_DATABASE.';host='.DB_HOSTNAME.'');


/*
 * Stored Procs Constatnt Def
 */
define('SP_LOGIN','SP_ADMIN_LOGIN');
define('SP_BRANDS','SP_ADD_BRANDS');
define('SPGET_BRAND_NAME','SPGET_BRAND_NAME_BY_ID');
define('SPGET_UPD_PWD','SP_UPDATE_PASSWORD');
define('SP_CREATE_ACC','SP_USER_REGISTRATION');
define('SP_USER_LOGIN','SP_USER_LOGIN');
define('SP_PROD_EXISTS','SP_IS_SUBPRODUCTS_EXIST');
/*
*
*/

define('HOME_ADMIN', 'home.php');
define('HOME_USERS', 'index.php');


