<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db593127895');

/** MySQL database username */
define('DB_USER', 'dbo593127895');

/** MySQL database password */
define('DB_PASSWORD', 'GBiugh7m_sg');

/** MySQL hostname */
define('DB_HOST', 'db593127895.db.1and1.com');

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
define('AUTH_KEY',         'RMl4m(%r$,8 HfD+5hIXut5HW711b1gOX[hfAGj 9&C[iDh1Zj/IfZ2]Q*Tc=Q|:');
define('SECURE_AUTH_KEY',  'hq !hr|N!#^J)7aF_jTK&X{WN|NO%AfQUShx/gjbf~i*.-6b>KK5IU`oJd>8Ocb-');
define('LOGGED_IN_KEY',    '~fcBrS3}h~`EpfO|mR&8^~|PIN *kI0-]?kB$[sHaa[=9-bDU/82*Aed/(Qvspag');
define('NONCE_KEY',        '+-+G/r-#!Ak[~oy4TYxKIe}%(b2e!3k9FcTwK45tY5>5,1`PqqFV:`]>-%p@G-O-');
define('AUTH_SALT',        'Y9In>mi.DDuAmK=U7}s9o2oufY-Y14ayxC`L,Fq+^hkC:&4-|/+(o35 n|qNn_1W');
define('SECURE_AUTH_SALT', 'eswdBX;kD;{gl(=[xQa0@>OZM;E^! o}7a3JF>#L|X5.XfJ?+k%-|VvIv)pdu{VT');
define('LOGGED_IN_SALT',   'q?+Itc0`|s+y|><Y6_d#b?5Iz-m.z!+nWzQ|o&AZE-6!v)|eM&?ld(X-^gX+:|$h');
define('NONCE_SALT',       'q>9$aRBZ|A;}fG =+zS&v:!:$=nxg`RlX~~1P7f+1Pd0nxB6bO:-Rw86Yb7E;V7p');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_HOME','http://skinnygirlcoffeeandteas.com');
define('WP_SITEURL','http://skinnygirlcoffeeandteas.com');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
