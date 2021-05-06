<?php

hooks()->add_action('admin_init', 'worksuitemenu_collapsible');

function worksuitemenu_collapsible()
{
    $CI = &get_instance();
    // Operations
    $CI->app_menu->add_sidebar_menu_item('ws-ops', [
        'name'     => 'Operations', 
        'collapse' => true, 
        'position' => 10, 
        'icon'     => 'fa fa-question-circle', 
    ]);
    // Finance
    $CI->app_menu->add_sidebar_menu_item('ws-finance', [
        'name'     => 'Finance', 
        'collapse' => true, 
        'position' => 16, 
        'icon'     => 'fa fa-book', 
    ]);

    // Support
    $CI->app_menu->add_sidebar_menu_item('ws-support', [
        'name'     => 'Support', 
        'collapse' => true, 
        'position' => 50, 
        'icon'     => 'fa fa-info-circle', 
    ]);

    
    /*
    $CI->app_menu->add_sidebar_menu_item('custom-menu-unique-id', [
        'name'     => 'Parent Item', // The name if the item
        'collapse' => true, // Indicates that this item will have submitems
        'position' => 10, // The menu position
        'icon'     => 'fa fa-question-circle', // Font awesome icon
    ]);

    // The first paremeter is the parent menu ID/Slug
    $CI->app_menu->add_sidebar_children_item('custom-menu-unique-id', [
        'slug'     => 'child-to-custom-menu-item', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Sub Menu', // The name if the item
        'href'     => 'https://perfexcrm.com/', // URL of the item
        'position' => 5, // The menu position
        'icon'     => 'fa fa-exclamation', // Font awesome icon
    ]);
    */
}