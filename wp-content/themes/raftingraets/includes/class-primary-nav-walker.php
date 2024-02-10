<?php

class Primary_Nav_Walker extends Walker_Nav_Menu {
    protected $depth_level; // Depth level to print items

    /**
     * Custom_Nav_Walker constructor.
     *
     * @param int $depth_level Depth level to print items.
     */
    public function __construct($depth_level = 0) {
        $this->depth_level = $depth_level;
    }

    /**
     * Start the element output.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   Menu item arguments.
     * @param int    $id     Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if ($depth === $this->depth_level) {
            $output .= sprintf(
                '<a href="%s" class="nav-item nav-link">%s</a>',
                $item->url,
                $item->title
            );
        }
    }

    /**
     * End the element output, if needed.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Page data object. Not used.
     * @param int    $depth  Depth of page. Not Used.
     * @param array  $args   Not used.
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        // Nothing to do here as we only want to output <a> tags.
    }
}  
