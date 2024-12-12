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

define( 'DB_NAME', "vitaadmin_wp" );


/** Database username */

define( 'DB_USER', "vitaadmin_wp" );


/** Database password */

define( 'DB_PASSWORD', "EQuW3eJ&" );


/** Database hostname */

define( 'DB_HOST', "localhost" );


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

define('AUTH_KEY',         'Np-^lDn58xOAok)G<0!<mSJY{2?)49w+?jw26@9-3{M§/j[4}xH§Em=D@,0m)3G`');

define('SECURE_AUTH_KEY',  'U_ntV/$]OKXu8uoou~x2aS 8§}twH.2%3!ZA+?Q.IXufM}6,(59OiqU!d5r^|$t,');

define('LOGGED_IN_KEY',    'l/Tm6h@b6.Jyq3~%[p<ol`zkbcpaa$$% -&:@$d8YpfF?Y,BfHeus4-A7A@9zon7');

define('NONCE_KEY',        '?U>6]xM<B77p5BoQ^El<@tr9m)AL]Y,6xJXAhUbB=+)+maa?rn4p:lyvgn$rnR@g');

define('AUTH_SALT',        'y]Piih].>J^=>o0?p9|aiA7`wc3)l0dFVH:.8|Lkw9$`d(6!xp2uOE)dndC949? ');

define('SECURE_AUTH_SALT', '?+uCYTG~vUTrE|3VN7@$x@P>g}b:JF2yA+ppl3^{8o25>.ZJVLBT~rOk6`{jR%Wl');

define('LOGGED_IN_SALT',   '~/§4M+{Ho.I_t>OI/M! ?5M%}y(!nqYkAo72a!zd,!RziZMMo0_uXDAcG8:|8NKt');

define('NONCE_SALT',       '-4,f[qD%`o18(d:}7uAeO2&mL^JypD5YQhF=bhE=0QRzt(%Rd;^-y!p[?~mNSTDt');


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

define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */




define( 'WP_CACHE', true );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

