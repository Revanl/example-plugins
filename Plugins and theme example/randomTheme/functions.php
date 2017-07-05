
<?php
add_action('wp_enqueue_scripts', 'add_bootstrap');
function add_bootstrap(){

$output = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';

$output .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';

$output .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
echo $output;
}
function carsPanel_hook(){
	do_action("carsPanel_hook");
}
function include_shortcode_function($attrs, $content = null) {
 
    if (isset($attrs['file'])) {
        $file = strip_tags($attrs['file']);
        if ($file[0] != '/')
            $file = ABSPATH . $file;
 
        ob_start();

        include($file);
        $buffer = ob_get_clean();
        $options = get_option('includeme', array());
        if (isset($options['shortcode'])) {
            $buffer .= do_shortcode($buffer);
        }
    }
    return $buffer;
}
 
add_shortcode('Carousel', 'include_shortcode_function');
?>
