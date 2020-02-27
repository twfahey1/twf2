<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all environments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to ensure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * Place the config directory outside of the Drupal root.
 */
$config_directories = array(
  CONFIG_SYNC_DIRECTORY => dirname(DRUPAL_ROOT) . '/config',
);

/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}

/**
 * Always install the 'standard' profile to stop the installer from
 * modifying settings.php.
 */
$settings['install_profile'] = 'standard';

$settings['hash_salt'] = 'T3hQMWuGXx3FP60mgjCffNEKi9hhXLToRH0XgFQ-sypAoxbLLu3zZorurX4Pj3RnbK9nWTy5gg';

// Configure Redis

// if (defined('PANTHEON_ENVIRONMENT')) {
//   // Include the Redis services.yml file. Adjust the path if you installed to a contrib or other subdirectory.
//   $settings['container_yamls'][] = 'modules/redis/example.services.yml';

//   //phpredis is built into the Pantheon application container.
//   $settings['redis.connection']['interface'] = 'PhpRedis';
//   // These are dynamic variables handled by Pantheon.
//   $settings['redis.connection']['host']      = $_ENV['CACHE_HOST'];
//   $settings['redis.connection']['port']      = $_ENV['CACHE_PORT'];
//   $settings['redis.connection']['password']  = $_ENV['CACHE_PASSWORD'];

//   $settings['cache']['default'] = 'cache.backend.redis'; // Use Redis as the default cache.
//   $settings['cache_prefix']['default'] = 'pantheon-redis';

//   // Set Redis to not get the cache_form (no performance difference).
//   $settings['cache']['bins']['form']      = 'cache.backend.database';
// }