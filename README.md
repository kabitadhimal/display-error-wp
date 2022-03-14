Display Error in the Front-end
1.	Place the php-error.php file inside “wp-content” folder
2.	Edit the wp-config.php file in your WP root directory. Near the bottom of the file you'll see the following:
define('WP_DEBUG', false);
3.	Turn the Debug Mode :
define( 'WP_DEBUG', true );
When an error is thrown in WordPress, it will be displayed in the front-end. Turn off the debug mode, after handling the displayed error.
