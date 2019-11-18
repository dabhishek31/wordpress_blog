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
define( 'DB_NAME', 'wp_blog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'F|r~P(RwmU:4Vw`:]a[Jbe:S&@]DPngRn((W5.01PQ&!rlmNqn3<(Fljq|k:,bZ(' );
define( 'SECURE_AUTH_KEY',  ',Oq/f^&#L[[^H(yw062?#3s^-Kp7?}77h/6EU8[<bQcqc<v-7;l]}|W(Q+:sw4:A' );
define( 'LOGGED_IN_KEY',    '+U%I}]dGpD9ka=!$q_ dBjm &eX0sWEqxN%Te/T8tZTFiGS,g6lZq60lyefT6</,' );
define( 'NONCE_KEY',        '0+`Yrn#gS9[{ r}m<;uv;$QsO,In=iL0Du~;nYFM8+Zybn5e8:WP?;j.V%|1On;G' );
define( 'AUTH_SALT',        'kZ]VJ^~M{F.$BpwWIvkqZVBD=8eDy~Y73}v1+A;)T-xg|q}2{A% ]y1BD!c@1_w7' );
define( 'SECURE_AUTH_SALT', '@Tt:&Z%0MQA@UM%ybsB3z?[wNRCmHBF4_jqij4L3:T&ebF3c.^cVqP9u0@eS/CLD' );
define( 'LOGGED_IN_SALT',   '[Y374lOa>lJ1)hL7J#wt:EL>i;n@mf/Jec{hp~5ZBF!)jaNKeadv,|2Icc)W}fkm' );
define( 'NONCE_SALT',       'T.&T<?RF].$5Dc)~d ,c&*x},1ieaF)P}GEent31:lhw~N_M=N$Hs(@)iA`ph>P}' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
