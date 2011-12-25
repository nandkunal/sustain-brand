<?php

/*
 * Database Constants
 *
 */
define('DB_HOSTNAME','sustainbrand.db.6735487.hostedresource.com');
define('DB_LOGIN', 'sustainbrand');
define('DB_PASSWORD', 'Ew9Jmcix');
define('DB_DIR', '');
define('DB_DATABASE', DB_DIR.'sustainbrand');
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
define('SP_GET_COST','SP_GET_ITEM_COST_BY_CASE');
/*
*
*/

define('HOME_ADMIN', 'home.php');
define('HOME_USERS', 'index.php');


