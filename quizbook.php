<?php
/*
Plugin Name:  Preguntas y respuestas
Plugin URI:
Description:  Plugin para añadir Quizes o Cuestionarios con opción múltiple
Version:      1.0
Author:       Ezequiel Gallardo
Author URI:
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  quizbook
*/



require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';

   
register_activation_hook(__FILE__, 'quizbook_rewrite_flush');


require_once plugin_dir_path(__FILE__) . 'includes/metaboxes.php';

//agrego roles

require_once plugin_dir_path(__FILE__) . 'includes/roles.php';

register_activation_hook(__FILE__, 'quizbook_crear_role');

register_deactivation_hook(__FILE__, 'quizbook_remover_role');



//agrego capabilities
register_activation_hook( __FILE__, 'quizbook_agregar_capabilities' );
register_deactivation_hook( __FILE__, 'quizbook_remover_capabilities' );


require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

require_once plugin_dir_path(__FILE__) . 'includes/funciones.php';

//agregamos stylos a php

require_once plugin_dir_path(__FILE__) . 'includes/scripts.php';


require_once plugin_dir_path(__FILE__) . 'includes/resultados.php';
