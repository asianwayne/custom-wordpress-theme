<?php 
class Mc_Menu_Walker extends Walker_Nav_Menu {
    // Display element start.
    public function start_lvl(&$output, $depth = 0, $args = null) {
        // Depth-dependent classes.
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    // Display element end.
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start element output.
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    // Passed classes.
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'navbar-item';

    // Determine if the item has children.
    $has_children = in_array('menu-item-has-children', $classes) ? ' has-submenu' : '';

    // Join class names.
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = $class_names ? ' class="' . esc_attr($class_names . $has_children) . '"' : '';

    // Output the element.
    $output .= $indent . '<li' . $class_names . '>';

    // Link attributes.
    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    // Build output.
    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    // Output the element.
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
}


    // End element output.
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}
