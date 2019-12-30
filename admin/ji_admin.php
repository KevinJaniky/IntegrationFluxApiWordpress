<?php
function ji_menu_admin()
{
    add_menu_page('Json Integration', 'Json Integration', 'manage_options', 'json-integration', 'ji_render_admin_callback');
}

function ji_render_admin_callback()
{
    // Le traitement lorsque la page est appelé en post, donc à la sauvegarde de notre formulaire
    if (!empty($_POST)) {
        if (!empty($_POST['url'])) {
            update_option('json_integration_url', $_POST['url']);
        }
        if (!empty($_POST['page'])) {
            update_option('json_integration_page', $_POST['page']);
        }
        if (!empty($_POST['page_event'])) {
            update_option('json_integration_page_event', $_POST['page_event']);
        }
    }

    // Je récupère les valeurs dont j'ai besoin quand la page s'affiche
    $pages = get_pages();
    $p = get_option('json_integration_page');
    $pe = get_option('json_integration_page_event');
    $url = get_option('json_integration_url');

    // Je récupère le template
    include dirname(__FILE__) . '/templates/admin_form.php';
}


add_action('admin_menu', 'ji_menu_admin');
