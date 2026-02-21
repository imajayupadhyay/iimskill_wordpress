<?php
/**
 * Custom Navigation Walker — Skillignative
 *
 * Outputs nav HTML that exactly matches the static site:
 *   <li class="nav-item [has-mega-menu] [active]">
 *
 * Mega menu is triggered by adding the CSS class "has-mega-menu"
 * to a menu item via Appearance → Menus → Screen Options → CSS Classes.
 *
 * Supports 3 levels:
 *   Depth 0 → top-level nav items
 *   Depth 1 → mega menu column headers  (only inside has-mega-menu)
 *   Depth 2 → mega menu course links    (only inside has-mega-menu)
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Skillignative_Walker_Nav extends Walker_Nav_Menu {

	/**
	 * Track whether we are currently inside a mega-menu item.
	 * @var bool
	 */
	private $in_mega_menu = false;

	/* ─────────────────────────────────────────────
	   START SUB-LEVEL
	───────────────────────────────────────────── */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		// Only render sub-levels inside mega-menu items
		if ( ! $this->in_mega_menu ) {
			return;
		}

		if ( 0 === $depth ) {
			// Open the mega-menu overlay
			$output .= "\n" . '<div class="mega-menu"><div class="mega-menu-container">';
		} elseif ( 1 === $depth ) {
			// Open the column's course list
			$output .= '<ul class="mega-menu-list">';
		}
	}

	/* ─────────────────────────────────────────────
	   END SUB-LEVEL
	───────────────────────────────────────────── */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( ! $this->in_mega_menu ) {
			return;
		}

		if ( 0 === $depth ) {
			$output .= '</div></div>' . "\n"; // close mega-menu-container + mega-menu
			$this->in_mega_menu = false;      // exit mega-menu context
		} elseif ( 1 === $depth ) {
			$output .= '</ul></div>';          // close mega-menu-list + mega-menu-column
		}
	}

	/* ─────────────────────────────────────────────
	   START ELEMENT
	───────────────────────────────────────────── */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes  = empty( $item->classes ) ? array() : array_map( 'trim', (array) $item->classes );
		$is_mega  = in_array( 'has-mega-menu', $classes, true );

		// Active state — WordPress adds these to the current page's item(s)
		$active_classes = array(
			'current-menu-item',
			'current-menu-ancestor',
			'current-menu-parent',
			'current-page-ancestor',
			'current_page_parent',
			'current_page_ancestor',
		);
		$is_active = (bool) array_intersect( $classes, $active_classes );

		/* ── Depth 0: top-level nav item ─────────────────── */
		if ( 0 === $depth ) {
			if ( $is_mega ) {
				$this->in_mega_menu = true;
			}

			$li_class = 'nav-item';
			if ( $is_mega )   $li_class .= ' has-mega-menu';
			if ( $is_active ) $li_class .= ' active';

			$output .= '<li class="' . esc_attr( $li_class ) . '">';
			$output .= '<a href="' . esc_url( $item->url ) . '">';
			$output .= esc_html( $item->title );

			if ( $is_mega ) {
				$output .= ' <svg width="10" height="6" viewBox="0 0 10 6" fill="none" class="dropdown-arrow">'
				         . '<path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'
				         . '</svg>';
			}
			$output .= '</a>';

		/* ── Depth 1: mega-menu column header ────────────── */
		} elseif ( 1 === $depth && $this->in_mega_menu ) {
			$output .= '<div class="mega-menu-column">';
			$output .= '<h3 class="mega-menu-title">' . esc_html( $item->title ) . '</h3>';

		/* ── Depth 2: mega-menu course link ──────────────── */
		} elseif ( 2 === $depth && $this->in_mega_menu ) {
			$output .= '<li><a href="' . esc_url( $item->url ) . '">'
			         . esc_html( $item->title )
			         . '</a>';
		}
	}

	/* ─────────────────────────────────────────────
	   END ELEMENT
	───────────────────────────────────────────── */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( 0 === $depth ) {
			$output .= '</li>' . "\n";
		} elseif ( 2 === $depth && $this->in_mega_menu ) {
			$output .= '</li>';
		}
		// Depth 1 (column wrappers) are closed inside end_lvl
	}
}
