<?php


function quizbook_frontend_styles(){
    wp_enqueue_style('quizbook_css',plugins_url('../assets/css/quizbook.css',__FILE__));
    wp_enqueue_script('quizbookjs',plugins_url('../assets/js/quizbook.js',__FILE__),array('jquery'), 1.0 , true);
    wp_localize_script( 'quizbookjs', 'admin_url', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ) );
    
}

add_action('wp_enqueue_scripts','quizbook_frontend_styles');



function quizbook_admin_styles($hook){

    global $post;
    if($hook == 'post-new.php' || $hook == 'post.php'){ //tomamos como parametros la url

        if($post->post_type === 'quizes'){  //si en mi hook aparece el post_type quizes ejecuta el archivo
            //estas condiciones estan dadas para que el archivo no se ejecute en todas la web y no 
            //tenga que cargar archivos innecesarios
            wp_enqueue_style('quizbookcss',plugins_url('../assets/css/admin-quizbook.css',__FILE__));


        }

    }

    
}

add_action('admin_enqueue_scripts','quizbook_admin_styles');