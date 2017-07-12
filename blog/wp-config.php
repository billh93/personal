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
define('DB_NAME', 'billlcrn_bh1293');

/** MySQL database username */
define('DB_USER', 'billlcrn_bh1293');

/** MySQL database password */
define('DB_PASSWORD', 'P56I.S[DE3');

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
define('AUTH_KEY',         'ck3loprnh6oouigignrmjd684tqthctlfs1ttb8yupshft6ijn6btsqhfszz6ggl');
define('SECURE_AUTH_KEY',  '55ibx9gc6jraz9kf8yiseh8tpldmfpgoklpm2dwaxldcugyhlsnrc9cae9zfiupe');
define('LOGGED_IN_KEY',    'b6gxuusvpxxa96to2cf1mfytbyntmhsfiybvwswstg0e8utvynbeg1khf7ofbhrd');
define('NONCE_KEY',        'ksiqtdrjhfoyasgdg0dzsxcubit2q1ggtnfcmrthi68wfxpxhjxmvhobg3lrqrpq');
define('AUTH_SALT',        'cyq1mkt81njmvsesmgq1ksvokryqotmtzyvzzlrobbv4v96slet8qxvrwlltmr81');
define('SECURE_AUTH_SALT', 'p0jdwpzvzxcjg5ji8siagnmwu7lxpknpuege8xqhbjjbcfzfgktzolldhqzvxts7');
define('LOGGED_IN_SALT',   '2yhuv40v4lrfmvz6prhdiqcvutzzt7dsefd4kiadqhdkzzmueyf7pem4toot5ppg');
define('NONCE_SALT',       '0ke21ulzziqxgsaiqal9ucuvqtbzxt2tjzo92huthlil1oqccuu6fdap8pschgdx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bh_';

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
