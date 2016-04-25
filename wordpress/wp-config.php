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
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'student');

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
define('AUTH_KEY',         '3?_xcaWm6@v-}iC(Y;C8RKF7yGrLc^)XMs^+=.zq+X[Np$|ud&]f$!~`M!?f_o77');
define('SECURE_AUTH_KEY',  '{a`%dcsT_|r3Z[$~7PY3p%[lpW+*={4k$(=).-r5}NT/VZu+AxA9hMFE< *|V=eK');
define('LOGGED_IN_KEY',    '4i{8L~wxmZS2:`gu80azdIUh5jw}u7I:4Gfn_b[+`#hIFS 2h9_o.+H4ZQ~S;2,L');
define('NONCE_KEY',        'ro>Sl`]zmErz)[+Z`U#qD[q)xF1r~4B+?)wgQ[8BXw,OED(du>;m*CGVR)3~N/?2');
define('AUTH_SALT',        'TI[?H&hxd,D]YRGdGdMm`XK.ZDiS>A{@[^{HohWV#[@)iE$&&;w+hYpm:K_!<(&Z');
define('SECURE_AUTH_SALT', 'pt<&d:e`nF^2qam:Jy@eWTMg8;.[nJ2b]|Uvfh[-pIDt:|RKIF^h1:z}X:/OPJc?');
define('LOGGED_IN_SALT',   '2ICiO?VJLY}z%AVL?u4D-1R9*ICEut&GAsP`QS:.HMBxidT&)GwNBtLTPW}q.B_L');
define('NONCE_SALT',       ':K/.5&MV2Km>3]/e[e$CAtyPY){~+@rt]l|Xs/]M9#Nv/e)&RLO8S~BS=4ofo8mP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpphpkursus2016_';

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
