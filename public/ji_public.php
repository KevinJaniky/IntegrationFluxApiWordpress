<?php


function ji_intercept_list_page(){
    $pageToIntercept = get_option('json_integration_page');
    global $post;

    if($post->ID == $pageToIntercept){

        wp_enqueue_style('bootstrap-cdn-css','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
        wp_enqueue_script('bootstrap-cdn-js','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',['jquery']);

        $urlFlux = get_option('json_integration_url');
        if(!empty($urlFlux)){
            $data = wp_remote_get($urlFlux);
            if(!$data instanceof WP_Error){
                $json = $data['body'];
                $content = json_decode($json,true);
                include dirname(__FILE__).'/templates/ji_listing.php';
                exit();
            }
        }
    }
}

add_action('template_redirect', 'ji_intercept_list_page');



function ji_add_rules_redirect(){
    add_rewrite_rule('^event/?([^/]*)/?','index.php?pagename=page-custom-event&slug=$matches[1]','top');
    flush_rewrite_rules();
}


add_action('init', 'ji_add_rules_redirect', 10, 0);

function ji_set_query_var( $query_vars )
{
    $query_vars[] = 'slug';
    return $query_vars;
}

add_filter( 'query_vars', 'ji_set_query_var' );


function ji_intercept_event_rules(){
    $pageToIntercept = get_option('json_integration_page_event');
    global $post;
    if($post->ID == $pageToIntercept) {
        $slug = get_query_var('slug');
        if(!empty($slug)){

            $urlFlux = get_option('json_integration_url');
            if(!empty($urlFlux)) {
                $data = wp_remote_get($urlFlux);
                if (!$data instanceof WP_Error) {
                    $json = $data['body'];
                    $content = json_decode($json, true);
                    foreach ($content as $c){
                        if($c['slug'] == $slug){
                            wp_enqueue_style('bootstrap-cdn-css','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
                            wp_enqueue_script('bootstrap-cdn-js','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',['jquery']);
                            $article = $c;
                            include dirname(__FILE__) . '/templates/ji_event.php';
                            exit();
                        }
                    }
                }
            }
        }

    }
}

add_action('template_redirect', 'ji_intercept_event_rules');
