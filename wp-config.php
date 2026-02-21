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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_learning' );

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
define( 'AUTH_KEY',         '/4,jSb:Tx]5-Y(cw$W~CNfb$i5xs^4zti@_|^4!xb0WoiN$v9mL/9>4srW%;p{xy' );
define( 'SECURE_AUTH_KEY',  'H;Z/6I_:Nw0kpi$Ip56, xC}hsk#Kg;=wOT?`70*hGKo*vSpC{G<WNAIlRp]bsPz' );
define( 'LOGGED_IN_KEY',    ';NW&mbb288e{RptuxQql>d!-SmPo]_$,x3RI6v.MVa,1Nm,o7UAa`:551yOdN#rg' );
define( 'NONCE_KEY',        'x_m_Y]8}S|~l~+>-@g8<S#fPQ<Gi@ZaEJXDO/L-};{;G~WEgc2ANpJ-,JG&I$e4v' );
define( 'AUTH_SALT',        'THNDP9?&QI?T(Kh/]J1wN|FIuD})S6y+25Ek0w{!|mQB{d:[fFPlA,9)BV^|$yj5' );
define( 'SECURE_AUTH_SALT', 'U8;wUr29(6!qVfA>W0p]|Vh.`b)7?nLf8s).YO*u_4zhQ2#|!i?DrftJAQ5l99dY' );
define( 'LOGGED_IN_SALT',   '0iIJV={e[V#{=s/F:&W1A8rzTi%~l>`P~u#pV#b>~Ry{or{WFTu[-LH/CqExrw7q' );
define( 'NONCE_SALT',       '::N_JocWs`7 0EjY0#@xknZAu2c`24pozR`OF~`7~Nd9QgO1kj[rjMiEz>S-;oNP' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD', 'direct');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
