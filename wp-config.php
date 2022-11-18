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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress-pass' );

/** Database hostname */
define( 'DB_HOST', 'wordpress.cmn39h2kmclp.ap-southeast-3.rds.amazonaws.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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

define('AUTH_KEY',         'PHp;(V:-t`g&wvxg^ugY|TbuAbHtO:LqbDN/4?#ZtfUl7hV<pTr5VBp7z.luT5!c');
define('SECURE_AUTH_KEY',  'tJHhm%aX.4Dix5c9 s54$m^e/2yW2)b3,=&pG9jYSA   +aMqGXor_t[~,|T&F/=');
define('LOGGED_IN_KEY',    '6~@1_AY HK(K kej-V0bFKCONh,$kTgmXavUdi3yB6xY[2KXH*b#Mv/$^Jcf_&|Y');
define('NONCE_KEY',        'Er+*R?P1Iea`me!gQc`gx>Z-4?Xd(291,1q`it>$29P=vBpxZU!-l=RN2(]+NRD+');
define('AUTH_SALT',        'CpC:-j=eRr_ZNWEz=ehCHqz|~+A1)q*6)!%J@0(kZO)HX!&|ET!r+Pz*DG8}Kf6Y');
define('SECURE_AUTH_SALT', 'gMip. TE2`bK3VlU%yqsY,mr^6+]NGpD56GD?gW//c/TNzK0_e,a)B)w>-A+PSWV');
define('LOGGED_IN_SALT',   'I0_WrPEYGifDAwhJbO>7^-,irSEyUzMi.;h9d-#04/@DKTRC*+oeV[}T-GC{#jD^');
define('NONCE_SALT',       'l~ntj_&b:e)wG+11Tj@,C&Nf9;8H-d8#YuIk+m9K4]:5nn+-bO6ej#Kh+TfO_Jz)');

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
