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
define( 'DB_NAME', 'timoteo' );

/** Database username */
define( 'DB_USER', 'TimoteoAdmin' );

/** Database password */
define( 'DB_PASSWORD', 'Contñon2123%' );

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
define( 'AUTH_KEY',         'QJq9OO@Jx8 LJvS1A?_:8W+?=;@d,<0A9s}{Q@#YtoCxX<r$sk.Khy%RWNRU#i9S' );
define( 'SECURE_AUTH_KEY',  'DLKr>29(j7>6Z[S~4sEP8A9`%Cq={<x]s{kd.3_?-ksqw_OSi9.tNEr=wD$R)Rxp' );
define( 'LOGGED_IN_KEY',    '6J.%XiFV^42qT<mD[<u83m$u;v3Dym/(8^`7Sj6!<gk6J<oqUuxmiU<p+H5:P_R,' );
define( 'NONCE_KEY',        '>L4hx:~|A-uHUtGQ36U&]EZAtZ}efU@a6A~4ISK=EG82fHPG>Wq:[4:=zr#dkWj;' );
define( 'AUTH_SALT',        'kD`3SZu([EJd>Q`J6=P37@R0|lSdmqVl4a6dv,[>CL&pU+!}:VOVWb#-y<M`/ht=' );
define( 'SECURE_AUTH_SALT', 'mwTQ0;_IipHO]ybG7a)F5?8z!3:#-[LKH@,(:sj2tk]1;`_@8k6FC*-x.V@~1kES' );
define( 'LOGGED_IN_SALT',   'kIN7)(u ~2mF.=/8:h>BiIaCloVJ6Yr2Ctp):JKbj-eqp:]_~))Exac79Yw1dJ5h' );
define( 'NONCE_SALT',       'y>[%<1k}7u-M`3epBzh5s*j}d=.K~+o,!yj)aB2,2HV|npWPk;8PSg94#*=b5k+r' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
