<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'funground_wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

// Server host
define( 'SERVER_URI', 'http://localhost:8080/ach-web/' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')n(Ojb0:$hH?(S!/gufz/xS:>i3u`VD3rsLoG!4.4D$NxN]S.4+6)0*clY9(m|@Q' );
define( 'SECURE_AUTH_KEY',  'SPr:61$B5w=m?!B8#V4d ]OE{{5psTE%ZMlnNM`@[}_4j8<svbS_lBM76~`y.c;Y' );
define( 'LOGGED_IN_KEY',    ':YM>I~$5}mizg2M|b Vt`>}:hr?CEyH{Hswf6K =zBcPS.4!)8.m5xfm,)B#=9o%' );
define( 'NONCE_KEY',        '{sD<< n}uM>X l&[pChqg-#;C+SdcTVohm&|q)Nid{$-JA[u?6C&~PG~CBgD61nj' );
define( 'AUTH_SALT',        'z]fvPG:!@UzWh.8Hr)fH_$uq@^vP_rHn aX7FVt+ES6YGG:[5!%hT+?!yt]J0|aH' );
define( 'SECURE_AUTH_SALT', '3aaP/#p7}b%;mP`hg@jdSNE:MCZ/yr#3KLJYtD)HPE.n[>zW(ME4zPxrjR(-5r*G' );
define( 'LOGGED_IN_SALT',   '3#umK<tt3A@Xt}4~!0 #Bn.#o>{+OYE(WGt3u[Jnt<>Y7n@s|!T4ry/o5c4uALiQ' );
define( 'NONCE_SALT',       'n/Q::rd8h+>019AVff`OLjl;H;X,64n_yR?Y357]:#3Zp-H>{X(?8zRS!vwH+N@x' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
