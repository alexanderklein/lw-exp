<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// Contact form 7
define ('WPCF7_AUTOP', false);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lw_exp');

/** MySQL database username */
define('DB_USER', 'lw_exp_user');

/** MySQL database password */
define('DB_PASSWORD', 'Ib1wBzK!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_MEMORY_LIMIT', '256M');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'N vu#osWn)slH|z|.6&4W!y26Ri./r`]6C,lz#yVKw)&~S;}p1{(r&ff9--5LnAi');
define('SECURE_AUTH_KEY',  '+QPJ4JVXMr|7_hvs<3P,+S+.|Quk0SD8*kLRDw-O!R3HwU5y] ;E2>P%)/ABl)-0');
define('LOGGED_IN_KEY',    'j$tu#!&+TMT)tYCt[(UA8[a>Fj#s{Z%_hW+neb 63(XLvqa6(2Rjq;ht+mR.4O3Z');
define('NONCE_KEY',        'T{Zdt3kGim|,_^mG7%YNik%98|~CS)>$^!9FiBdt;v^g{e!p;o[H5iA!6;-)!+sb');
define('AUTH_SALT',        'tJ?!RFy&Gm*%4]iSju5_;|*>aM4 Gzp?|s/@fIS>[c% E`9g?@It7u:Jzw5)_vj<');
define('SECURE_AUTH_SALT', '6_loh.,cnAWm,4:HimXg.XR,|af`ois,>eXqXour$x{Hc}$;j!.>p!!hY9i-4Vu|');
define('LOGGED_IN_SALT',   'QL?k=O0UK=W+wx&rP,hoEZhycAy#~W-V^2BdvG/d]dy&.?5FG+JF*Q?QzgbfQW:h');
define('NONCE_SALT',       've<l-k0f2N{zDij`(wXb9+~7KG*3v83F.b8WUMeS#QACFq-@n`r-jl^*ik9vF.lx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define( 'WP_CACHE', true );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
