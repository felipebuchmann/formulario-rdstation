=== Description ====

This integration is very simple, consists on declare three constants in 'wp-config.php'.
Which are: RD_STATION_IDENTIFICACAO, RD_STATION_TOKEN and RD_STATION_API
These constants correspond to the  identifier, token, and API URL on the RDstation plataform.

The process of sending by POST occurs due to the wp_remote_post function, which sends a POST request to the API, using the native functions of WordPress HTTP API for this.

The form plugin defaults inputs are: "Name, Email and Phone" there is also a shortcode function to insert the form on the desired pages/posts.

Default shortcode: [formulario_rd_station]


=== Installing ===

Download the plugin into the wp-content folder via Git:

Command line:
git clone https://github.com/felipebuchmann/formulario-rdstation wp-content / plugins / plugin-form

In "wp-config.php" file declare the following constants after "WP_DEBUG":

define("RD_STATION_IDENTIFICACAO", "identificação"); 
define("RD_STATION_TOKEN", "token"); 
define("RD_STATION_API", "https://www.rdstation.com.br/api/1.2/conversions");

That's it!