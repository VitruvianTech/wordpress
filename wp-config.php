<?php
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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '172.28.128.3');

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
define('AUTH_KEY',         'dGsHMR(0MdGXan0>vVg=/=rv+Rm#-Gb7Se=/eEQl<A9 inOZn#gKs]QSQU>w73vM');
define('SECURE_AUTH_KEY',  'k,.0HMqy( x]m|6?iCwoCawcc~p/8z!X8/gV6d&33(SJgI*e6]4k{lnNm8WMaTF@');
define('LOGGED_IN_KEY',    'u&.*aZk53uc&{P$opx.>foGWWd5<,8EL8:4J0Nb7ackdOTsa7]#<uO%#h.@zEy#j');
define('NONCE_KEY',        'xMXo6$3OqH/6}N>|6x@xf+eR1DlUzvO%MQ 4xw h9:-&ZzX->n56*!5zYI-;JQ^p');
define('AUTH_SALT',        '>4%KrAmPfbxaPNp|[cSl-3;dCENpRlsYwfMz()GKd-~Dp<1kD#xvr%)WQ&ML}D#-');
define('SECURE_AUTH_SALT', ')&IC*Jld-TKuaDm9B1ZAB>dZ}}P?Sn&sM$3/;umDO|T|^!-oh(+Ey]L0CwK-F==0');
define('LOGGED_IN_SALT',   'Q9;2@:GLk8sU3ofB]w#ILc(4Oj@UnA|.>zV0Uo3s &/?J#Mhd5 ~OHb6#1mV@g9V');
define('NONCE_SALT',       'q=+=D~e hARNvnZx_;|t}d.O[pCXh:VBt^go@QLd{AqbF?7S9k)M`u>mxq}mb-,q');

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
