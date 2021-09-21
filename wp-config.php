<?php

//Begin Really Simple SSL Load balancing fix
if ((isset($_ENV["HTTPS"]) && ("on" == $_ENV["HTTPS"]))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "1") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "on") !== false))
|| (isset($_SERVER["HTTP_CF_VISITOR"]) && (strpos($_SERVER["HTTP_CF_VISITOR"], "https") !== false))
|| (isset($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_X_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_PROTO"]) && (strpos($_SERVER["HTTP_X_PROTO"], "SSL") !== false))
) {
$_SERVER["HTTPS"] = "on";
}
//END Really Simple SSL
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'workflowtrends_d');


/** MySQL database username */
define('DB_USER', 'workflowtrends_u');


/** MySQL database password */
define('DB_PASSWORD', "fOy75ArFaW");


/** MySQL hostname */
define('DB_HOST', 'localhost');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');


/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*5;A>VzVb=az%ruJZ;&~(pn*f4?<lr325cfDH@I7#RJ +pUC?%-arm?PouA)I1{b');

define('SECURE_AUTH_KEY',  'wrdK(Ks}TjkZmia>i411c 90`9Rtf![VVp;=.kTD{=:*=fJxi|kp],r|z]@sEO3y');

define('LOGGED_IN_KEY',    '3X$qr:<j@r2w`m}GV7QsUf2HX7rd~y?`,vHI)-)an>4SCx1OPLlF_6W.69AT:xf^');

define('NONCE_KEY',        'YN3<0uy|WzR5,~edP/M8OX=8]Fq1osR,)Nica!y>SmORt|<@cL+[MJ4%VPX>W%tz');

define('AUTH_SALT',        'z#VU;.dKfD%0n}rV}.iW`9SWXhD+gMvxZ]bYH<cD4c}pq)HM;V35qKBa@`e7$qGA');

define('SECURE_AUTH_SALT', 'P}Mjo#FV h5d8_oG;4`ROqzvlpjb8?k;;IdTY:h,&u#Kk:Y9(U6ba-,Jt0S_t5iJ');

define('LOGGED_IN_SALT',   '.&S/TmU<]3cedkWd?>/sK=}tuuSPQCr-.JG^Uxpc+(nozk1K#(pniT,W][rsOmtN');

define('NONCE_SALT',       'jx}~LHzvD!*=(+3w+P5(}AG*?zs^B&q)]o4qU:|Ru1K<%{Q^j%@,yIV<FGED#S^r');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
