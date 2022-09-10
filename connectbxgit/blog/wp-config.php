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
define('DB_NAME', 'connectbzcblog');

/** MySQL database username */
define('DB_USER', 'connectbzcblog');

/** MySQL database password */
define('DB_PASSWORD', 'Connect152');

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
define('AUTH_KEY',         'v &w1/G]w-@u.b V/oov]nJ8v_lC_VYoFi,A-1S]j[/]Q1a(I!<h3Jw7Ec+.(:$}');
define('SECURE_AUTH_KEY',  '@J5f#hQoKmK8O2T1b63=<p._sB)FTs(CTGX/*H{N+KSjl%m.Il;93>AGb|6j:a|m');
define('LOGGED_IN_KEY',    'Eottz@xo@D%Hz~CE`~MDM^DQ.7H{aqO]fY?s_Q5 y-sE.uMS2]Q|Du884ZNgOFF.');
define('NONCE_KEY',        'ab^[  #2YEG^T*6}>Q^0c`Jcz<|=T_Z}n[b/7Xx?S7TL zeb2BQWM?x9x9Fm*gI8');
define('AUTH_SALT',        '}2$5u5.6<~6ri@j9OU%L,dP_%faB<k8i9h.nFJ)M$$b{7&1&cvGU|Z;hP9bn`w(_');
define('SECURE_AUTH_SALT', '|KvQ3UfEcrm>>]OXf&uAQTK,HNJ<Xg1bDtW2KF)E9CWr_B{Y20e wfS6:[kz;oNt');
define('LOGGED_IN_SALT',   'kY.DGh88~;SiN:x]M[F2YEnpi~OnuZUrp9FuR3IpP/BVI a$N+u]]R/kyQ}E5_Ta');
define('NONCE_SALT',       '&23laAj1fMv[R{3??)X`GgQ?:F]Y0@l->;qI~:J%n]P[Z%|zG9-vKw/ +g?Vwl=R');

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
