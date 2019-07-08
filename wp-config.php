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
// define('DB_NAME', 'newzeal7_paint');
define('DB_NAME', 'wordpress');

/** MySQL database username */
// define('DB_USER', 'newzeal7_paint');
define('DB_USER', 'root');

/** MySQL database password */
// define('DB_PASSWORD', 'paint2018');
define('DB_PASSWORD', 'MC2.mysql2019');

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
define('AUTH_KEY',         'zC,onv1U!n^K3(@4E 907-P,Pq9mxL^A5<,L9{a)%6 x+G|h9wo4aCXLg%f+JUB[');
define('SECURE_AUTH_KEY',  'NPpJ`+^9T;$KDha?1/+`<!.).XS=S2q07<@m0F814O3:M$}M-n7PAz2+-Vw|45}2');
define('LOGGED_IN_KEY',    '?54+P)1L,0&PuOo$7DquTMOtb]/%H|H:%F_<u#_VR5 |/,kVy9Psu W,drn1 ndP');
define('NONCE_KEY',        '=0!cKuO[[=FT-Fg;E2lyHocL$ORN=CN ]SqL2W]Rpjr{KC2cJa~;s;eRN?>1Y`Ze');
define('AUTH_SALT',        'sS><22p!,oss78tZe#=f]`NiZ_[J%QB3cvl8POQY5#/#cI@w`k}D+)DLlu5Q^fYV');
define('SECURE_AUTH_SALT', 'ohp:joCg+ovjL9?F`d0+pQDF.@D^-xn^:qbX`8q3l#t;9`hC[et3D<U*dN|I0qKC');
define('LOGGED_IN_SALT',   '?2Ks6`@.4xVWbcvXW@JO6FT`fv{?6e`Jy ,>>&Jkom!3dvIwCl.<>E!2&J1T_;sM');
define('NONCE_SALT',       '3gTVIX85ih;3OzJ]7/CVYW<h?z)&R<oVLsGK & 80SLi`I:5Hh0m>N<SWFsuT/]Y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pt_';

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
