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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'ailab' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


define('AUTH_KEY',         '@R?{Wd6- 7A#H-YgXfb|xf1[ qR %9CL%@ayHGeFW[1Vl!u|JAQad+2p_ASU&XqA');
define('SECURE_AUTH_KEY',  'lrAt08?(Xv/8|7W1RwvGHuU-m{uzS7pTz$EMR5^Nt6j=a<_|{Y-Ko)o=FA;Fbypl');
define('LOGGED_IN_KEY',    '2wQPYnV1>NO8752:-r6;B#%cR^`g@!UdjU@(aU=Ip#{2-bxED~&&ks>g%u$E6ZY+');
define('NONCE_KEY',        'c{`AKVFe7@z,A7^?<{pPE9;<{fK,srVf/mwfd>U]sH)JrEY$[Uyi$T(2/uP+rY4S');
define('AUTH_SALT',        ']7-|[VM9ZS+kRUOT*EoZmhIm2(]f6Uy+h4/q&*--NXe<6-7|.Pp1+(*,a-TQW5w$');
define('SECURE_AUTH_SALT', 'an_A7_,-%~+E*r5(+#1nNKe$ :vBx?]0%usgT}0M_ob[p}0VXR:Vjw[o9gdGq6dR');
define('LOGGED_IN_SALT',   'MiSfE#NBI9uAyorm=a^L#1lkW #B8M{pf}NEKHCAAz3*98}fN8gK0`y/Gt?kZH`V');
define('NONCE_SALT',       '%T(8Y/hB[vHzY-4j{aj>muUrY1jkYHZTaQh=i}%5wuY`|:n}N/qE&OC$tHa4-&Xe');



define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
