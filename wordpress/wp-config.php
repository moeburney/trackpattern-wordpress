<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'x`h2.CjEPRtPj3[PP?<`oS ]RqaHTKs!ZkGfl6*$8D_+q7-5F}gcU<3dRifmI*^X');
define('SECURE_AUTH_KEY',  '=UhE?jsr`;FBfYdnwp%mpC<.p? mw/l,:8OFDMe26m[U0+VQ+P]O`:`H+qqc?|6C');
define('LOGGED_IN_KEY',    '0POa5as|3ojh,tTAJbvGl-|-Y?!i9 SN *x:*-o1axU|3Ey$-`wH`Tp3m5:s||]n');
define('NONCE_KEY',        '+I`32w]+b--q]HxN%CbEH6RADruF&{<%J3+>//qbOc|/m/J~Cjecd1VW+zY?caZ-');
define('AUTH_SALT',        '$y/7aSIxv!wmXLql8t>=uaibp6ox-q,Ph_A&1T|`wc|-#_jV}}LjnjG1+B ?M?Kx');
define('SECURE_AUTH_SALT', 'k_JV_9+kjJZ11,+f)Pd?Arduu/# q:ns |(QGY5lScI.e:m50]?,Vz_]<5SME-K;');
define('LOGGED_IN_SALT',   'mNT)l(jD{1sa]G#V`QFCWO28TDdU75 W@<xi<Lx*,8(mZs&c&~1m){}D%/_i{]/u');
define('NONCE_SALT',       '&sCL6A[tI9N?ZQO6~(FC>j>h}Hn1)%a!+:HR/m;s$|])pk21Bi3}++i]?7ywDW`]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

