<?php
/*

se configuration for WordPress
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
define('AUTH_KEY',         '=wP6ObyX7.l|Db]@^`K|-D2)$=,OVQti|]G(2[=5Td}Yox?RJJbIsz#2`iQdVB/L');
define('SECURE_AUTH_KEY',  'hsA3ghApV+#!-kg,Q+-DK/dhgB]KDkYo=Mg#-BoydO?=jC-H1B)Xu~F1/M.PWl55');
define('LOGGED_IN_KEY',    'iRcw-I*m7]b>]-T&?(dD5-j|=rj`p;g_TA=e5o+B54 #jEE*{8H+buA1bS9kQ^eO');
define('NONCE_KEY',        '(()yuvXQk}<rBYW1Bsd@n$6jbbJtT {MW-j,0;+k^@Wqb&h[g_?[&jm,}esZ6!aP');
define('AUTH_SALT',        '4^fTh1U2J3H|+NjW!r N3=]T@D}gaAxuHv`C?XO]->A}86X<iw18K.e,gkm2#~H!');
define('SECURE_AUTH_SALT', 'g!ec^M<BqMxUEyIC3;|;g7gPsTV_g@+-vxCkV#N$.&+W1Oo]=dp1Ci4T/HqjnPm ');
define('LOGGED_IN_SALT',   '-bS G0q9qtM=e=Qhm>JE-bsHXgI^hGDL70H=)f0N&tI&63DE]@?VeI53;W/8(A]n');
define('NONCE_SALT',       '$wF6<s5Bi%@]v6V<1+QO:2qx9Z=a@3-bEQ~+/%wj@D-:e,u3k`p!KY@+B/ObDvMz');

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



?>
