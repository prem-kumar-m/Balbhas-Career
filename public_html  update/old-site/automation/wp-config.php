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
define('DB_NAME', 'balbhas_wp728');

/** MySQL database username */
define('DB_USER', 'balbhas_wp728');

/** MySQL database password */
define('DB_PASSWORD', ')L]5p3SnN4');

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
define('AUTH_KEY',         'wtdrhus2gl6mgsosxgwjwmrweiaspt0ltezbl4qur55r3r2z091nwdnokecyfgj1');
define('SECURE_AUTH_KEY',  'r4dzqluly8tfnln0q5cytezgezlveebg03fcftu6dy6ew4shx1idkougoxwezcuw');
define('LOGGED_IN_KEY',    'svoso2xlqqbugthvrhy4fescn0vxoktzjrg8mezhnflnxapyks55c8satl9igkqj');
define('NONCE_KEY',        'm1v53v1jj6bkhar02syrv7gopawll0rqre0tnnscorz9sbdxqpmvlcfc3xfl7vfi');
define('AUTH_SALT',        'gtnqz7ofvfvzoycxixxpvmtskfyzk3jxwqke0vazvzblbs8jhq5u278nryoag5tr');
define('SECURE_AUTH_SALT', 'hskln3oih4tnaksdhwabqjtoudav7iwmmtuiykipoj62dwuss5ccicz1dxwl3gef');
define('LOGGED_IN_SALT',   'kbvnv4hsn6o6lfqpf9mqzp1acoxzclicfhmqbzfdyxupwjncp7b2qknhxnfblrds');
define('NONCE_SALT',       'ltfjvfktrtocxeynrvudddtbost57abjhfyruwffgld05a0ggb9fnaytnzz6q1qo');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpyq_';

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
