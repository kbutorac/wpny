<?php


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = null) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
}

function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'group/item menu-item-' . $item->ID;

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

		$output .= $indent . '<li id="menu-item-' . $item->ID . '" class="' . $class_names . '">';

		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

		$item_output = $args->before;

		if ($depth === 1 && $item->url && get_post_type($item->object_id) === 'mega-menu') {
				// Display content of the "mega-menu" custom post type
				$mega_menu_post = get_post($item->object_id);
				$item_output .= '<div class="mega-menu-content py-10 absolute opacity-0 top-[86%] z-[10]">' . apply_filters('the_content', $mega_menu_post->post_content) . '</div>';
		} else {
				// Display regular menu link
				$item_output .= '<a ' . $attributes . '>';
				$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
				if (in_array('menu-item-has-children', $classes)) {
					$item_output .= '<svg fill="currentColor" viewBox="0 0 20 20"class="text-orange rotate-0 group-hover/item:rotate-180 inline w-4 h-4 mt-3 ml-0.5 transition-transform duration-200 transform md:-mt-0 rotate-0"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>';
			}

				$item_output .= '</a>';
		}

		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
}
}

class Custom_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = null ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			$output .= $indent . '<li id="menu-item-' . $item->ID . '" class="' . $class_names . '">';

			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

			$item_output = $args->before;

		if ( in_array( 'menu-item-has-children', $classes ) ) {
				$item_output .= '<span class="mobile-menu-toggle "></span>';
		}

			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


class Custom_Walker_Mega_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = null) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			$indent = ($depth) ? str_repeat("\t", $depth) : '';

			$classes = empty($item->classes) ? array() : (array) $item->classes;
			$classes[] = 'group/item top-level menu-item-' . $item->ID;

			$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

			$output .= $indent . '<li id="menu-item-' . $item->ID . '" class="' . $class_names . '">';

			$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

			$item_output = $args->before;

			if ($depth === 1 && $item->url && get_post_type($item->object_id) === 'mega-menu') {
					// Display content of the "mega-menu" custom post type
					$mega_menu_post = get_post($item->object_id);
					$item_output .= '<div class="mega-menu-content absolute py-12 left-0 text-dark opacity-0 top-[100%] z-[10]">' . apply_filters('the_content', $mega_menu_post->post_content) . '</div>';
			} else {
					// Display regular menu link
					$item_output .= '<a ' . $attributes . '>';
					$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
					if (in_array('menu-item-has-children', $classes)) {
						$item_output .= '<svg xmlns="http://www.w3.org/2000/svg" class="rotate-0 group-hover/item:rotate-180 inline mt-3 ml-2 transition-transform duration-200 transform md:-mt-0" width="11" height="8" viewBox="0 0 11 8" fill="none">
							<path d="M5.5 7.21094L6.05061 6.68508L11 1.93366L9.89879 0.789125L5.5 5.01466L1.10123 0.789125L6.29309e-08 1.93366L4.94938 6.68508L5.5 7.21094Z" fill="currentColor"/>
							</svg>';
				}

					$item_output .= '</a>';
			}

			$item_output .= $args->after;

			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}