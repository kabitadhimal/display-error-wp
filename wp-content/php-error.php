<?php
/**
 * display_error_template from WP_Fatal_Error_Handler
 *
 */

function dF_FriendlyErrorType($type)
{
    switch($type)
    {
        case E_ERROR: // 1 //
            return 'E_ERROR';
        case E_WARNING: // 2 //
            return 'E_WARNING';
        case E_PARSE: // 4 //
            return 'E_PARSE';
        case E_NOTICE: // 8 //
            return 'E_NOTICE';
        case E_CORE_ERROR: // 16 //
            return 'E_CORE_ERROR';
        case E_CORE_WARNING: // 32 //
            return 'E_CORE_WARNING';
        case E_COMPILE_ERROR: // 64 //
            return 'E_COMPILE_ERROR';
        case E_COMPILE_WARNING: // 128 //
            return 'E_COMPILE_WARNING';
        case E_USER_ERROR: // 256 //
            return 'E_USER_ERROR';
        case E_USER_WARNING: // 512 //
            return 'E_USER_WARNING';
        case E_USER_NOTICE: // 1024 //
            return 'E_USER_NOTICE';
        case E_STRICT: // 2048 //
            return 'E_STRICT';
        case E_RECOVERABLE_ERROR: // 4096 //
            return 'E_RECOVERABLE_ERROR';
        case E_DEPRECATED: // 8192 //
            return 'E_DEPRECATED';
        case E_USER_DEPRECATED: // 16384 //
            return 'E_USER_DEPRECATED';
    }
    return "";
}

$showError = (isset($error) && WP_DEBUG);
$message = "An unexpected condition was encountered. Our service team has been dispatched to bring it back online";
$showError = true;
if(isset($error)) {
    if (true === $handled && wp_is_recovery_mode()) {
        //$message = "An unexpected condition was encountered. Our service team has been dispatched to bring it back online";
        //$message = __('There has been a critical error on your website, putting it in recovery mode. Please check the Themes and Plugins screens for more details. If you just installed or updated a theme or plugin, check the relevant page for that first.' );
    } elseif (is_protected_endpoint()) {
        //$message = __( 'There has been a critical error on your website. Please check your site admin email inbox for instructions.' );
        $message = "An unexpected condition was encountered. Our service team & admin has been dispatched to bring it back online";
    } else {
        //$message = __( 'There has been a critical error on your website.' );
    }
}



?>
<!doctype html>
<title>We've got some trouble | Webservice currently unavailable</title>
<style>
    body {  padding: 150px; }
    article{
        text-align: center;
    }
    h1 { font-size: 50px; }
    body { font: 20px Helvetica, sans-serif; color: #333; }
    article { display: block; text-align: left; width: 650px; margin: 0 auto; }
    a { color: #dc8100; text-decoration: none; }
    a:hover { color: #333; text-decoration: none; }
</style>

<?php
var_dump($error);
if($showError):?>
    <div style="font-family: monospace; font-size: 13px;">
        <?=dF_FriendlyErrorType($error['type'])?>
        in <?=$error['file']?>
        on line <?=$error['line']?>
        <br />
        message:<br />
        <?=nl2br($error['message'])?>
    </div>
<?php endif;?>

<article>
    <h1>Webservice currently unavailable!</h1>
    <div>
        <p><?=$message?></p>
        <p>&mdash; The Team</p>
    </div>
</article>