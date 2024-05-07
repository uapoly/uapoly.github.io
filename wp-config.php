<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'uapoly' );

/** Database username */
define( 'DB_USER', 'uapoly' );

/** Database password */
define( 'DB_PASSWORD', 'LaMacarenaSeBailaAsi' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'b=8@U#@V0)0Uw*!^m[WXz]D?LiO|-AdrQ[I> @bNh:1bQrJN:9SqOys86`o)EN6|' );
define( 'SECURE_AUTH_KEY',  'b%k{ gK}ic`|ky$KRa;/quCUZ?nm}|m/~{Lne6#nz,I*V!J3v2` P0Il6U+K_pr;' );
define( 'LOGGED_IN_KEY',    'aT71k^,dCS>8&mu%hU<^bVm&RTVC)oCk+jA+4G0Je[ve7&0~U!RX#sPmnH;x<SS~' );
define( 'NONCE_KEY',        '2h:8M}ZA_f*h^Cv j::v:.y@_0T0:]x9.L;ok+SlZyy:qN25SXoK**Z[8 ,j#|0>' );
define( 'AUTH_SALT',        'y$+RjmY%}M}L?LFZt>;MOS@a/9:J!=+ ,{4N|}AwS*_t|iC(f}KG,P<iBd|29-M4' );
define( 'SECURE_AUTH_SALT', '{d54f(LCK:<mw$Pw#ik5@m-^[(i &`[`]ZlJV>/+jq)@@2g<&=I@tcpj$UiluNav' );
define( 'LOGGED_IN_SALT',   ')2RLnlU#+C[a~-zpoLv8oCn`G1 z3QQq&[Qn$t|w9lQg: SmTP)DZP@?n]}N8>?/' );
define( 'NONCE_SALT',       'L?o!b8Cy+$>(9*vP,;ngfb!0XNRsH/.Thbh~nm;T+Ggrwp PU@I)GU^U q.KHk$2' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
