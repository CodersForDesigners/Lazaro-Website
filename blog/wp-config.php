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
define('DB_NAME', 'lazaro_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'RPJe_t1VpE-:h@V>zm;V8~wA.&/oVK`[+|;.r!Hw&^^c_Jku)iy4`OJGS,3}P(a0');
define('SECURE_AUTH_KEY',  'dT,(l`fE{4@dn5pbe_,;az`+#@!4*jjFlGA[U/ol=VFYCMX$L^P==+o?mJy12>Pu');
define('LOGGED_IN_KEY',    'f& !O/LNcV,;~ibn(9f^!!}fs0|E]/-r-o}A7uq7zH(,/&$);fGuxt8szK_@D/[k');
define('NONCE_KEY',        'Nk8K{_q+h]r1dwvYS?xka8I1a?+9E%U4HC;|pY }clH86(6)8[En>~k65c9_`|UW');
define('AUTH_SALT',        '2@{v{6ws,]q3 7tRgk!1`)9.w,ts4%CG+h^40:nn#d9/&jvg>!G^noO]eH{HkE-1');
define('SECURE_AUTH_SALT', 'A9=|bLp} S[9oN7YlEX_K|/aSw0[}4d5^]G09f/0$^!@D}u)saT |H-Yl`!lWqhC');
define('LOGGED_IN_SALT',   '%{n~3[>sHMqwjf^^L,9u#eU0X9 t#m}p@4*Vh35*:0Fh@-$=Nou64yGkz$vOOSwx');
define('NONCE_SALT',       '`),JH_eA>#0WK<ST;9dy}6ts}@~rC67t?Po6BA0+2}Vc0l-~umTt/RoSud=n;Mk%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'z_';

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
