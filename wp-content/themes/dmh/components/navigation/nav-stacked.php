<?php 
// Intented to use bootstrap 3.
// Location is like a 'primary'
// After, you print menu just add create_bootstrap_menu("primary") in your preferred position;
	
#add this function in your theme functions.php
	
function create_bootstrap_menu( $theme_location ){

	$locations = get_nav_menu_locations();
	$menu = get_term( $locations[$theme_location], 'nav_menu' );
	$menu_items = wp_get_nav_menu_items($menu->term_id);



	if( $theme_location && isset($locations[$theme_location]) ):
		$navbar = '<nav class="nav nav-stacked nav-stacked-fixed height-vh-100">' ."\n";

			foreach( $menu_items as $menu_item ):

				$class = '';
				$id = $menu_item->ID;
				$icon = get_field('icon', $id);


				foreach($menu_item->classes as $elClass ){
					$class .= $elClass.' ';
				}



				if( $menu_item->menu_item_parent == 0 ):

					$children = childNav($id, $menu_items);


					$navbar .= '<div class="nav-item '. $class .'">
												<a class="nav-link" href="' . $menu_item->url . '">
													<span class="valign-middle">'.$menu_item->title.'</span>' ."\n";


					if( isset($icon) ){
						$navbar .= '<span class="icon-thumbnail pull-right">
													<svg><use xlink:href="#'.$icon.'"></use></svg>
												</span>';
					}

					$navbar .= '</a>' ."\n";


					// If has submenu items...
					if( count( $children ) > 0 ){

						$navbar .= '<div class="subnavbar">' ."\n";
						$navbar .= '<nav class="nav">' ."\n";
						$navbar .= implode( "\n", $children );
						$navbar .= '</nav>' ."\n";
						$navbar .= '</div>' ."\n";
					}


					$navbar .= '</div>' ."\n";
			 
				endif;

			endforeach;

		$navbar .= '</nav>' ."\n";
	endif;

	echo $navbar;


}//create_bootstrap_menu()





// Get all children items
function childNav($parentID, $items){

	$menu_array = array();

	foreach( $items as $submenu ): 

		if( $submenu->menu_item_parent == $parentID ):

			$smclass = '';
			$elID = $submenu->ID;
			$count = 0;

			// Custom classes for submenu items
			foreach( $submenu->classes as $smClass ){
				$smclass .= $smClass.' ';
			}


			// Test if has subitems
			foreach( $items as $children ){
				if( $children->menu_item_parent == $elID ){
					$count++; 
				}
			}


			$menu_array[] = '<div class="nav-item '. $smclass .'">
												<a class="nav-link" href="' . $submenu->url . '">' 
													.$submenu->title.
												'</a>' ."\n";


				// The sub navbar
				if( $count > 0 ){
				$menu_array[] = '<div class="subnavbar">' ."\n";
					$menu_array[] = '<nav class="nav">' ."\n";
				}

						$menu_array[] = implode( "\n", childNav($elID, $items) );

				if( $count > 0 ){
					$menu_array[] = '</nav>' ."\n";
				$menu_array[] = '</div>' ."\n";
				}

			$menu_array[] = '</div>' ."\n";

		endif;
	endforeach;


	return $menu_array;
}//childNav()







function footer_menu( $theme_location ){


	if( get_field('navbar_left', 'option') )
		$nav_left_cant = get_field('navbar_left', 'option');
	
	if( get_field('navbar_right', 'option') )
		$nav_right_cant = get_field('navbar_right', 'option');


	if( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ){


		$menu_list  = '<nav class="nav nav-stacked">' ."\n";
		 
		 
		$menu = get_term( $locations[$theme_location], 'nav_menu' );
		$menu_items = wp_get_nav_menu_items($menu->term_id);


		global $post;
		$page_id 	= $post->ID;


		foreach( $menu_items as $menu_item ){

			$class = '';
			
			foreach($menu_item->classes as $elClass ){
				$class .= $elClass.' ';
			}


			if( $menu_item->menu_item_parent == 0 ){
					 
				$parent = $menu_item->ID;				 
				$menu_array = array();


				foreach( $menu_items as $submenu ){
					if( $submenu->menu_item_parent == $parent ){

						$smclass = '';
			
						foreach($submenu->classes as $smClass ){
							$smclass .= $smClass.' ';
						}

						$bool = true;
						$menu_array[] = '<div class="nav-item '. $smclass .'"><a class="nav-link" href="' . $submenu->url . '">' . $submenu->title . '</a></div>' ."\n";
					}
				}


				if( $bool == true && count( $menu_array ) > 0 ){
						 
					$menu_list .= '<div class="nav-item '. $class .'">' ."\n";

					$menu_list .= implode( "\n", $menu_array );
					$menu_list .= '</div>' ."\n";
						 
				}else{

					if($page_id == $menu_item->object_id){
						$menu_list .= '<div class="nav-item">' ."\n";
					}else{
						$menu_list .= '<div class="nav-item '. $class .'">' ."\n";
					}

					$menu_list .= '<a class="nav-link" href="'. $menu_item->url .'">'. $menu_item->title .'</a>' ."\n";
					$menu_list .= '</div>' ."\n";

				}
					 
			}
			 
			// end <li>
			// $menu_list .= '</div>' ."\n";

		}

		$menu_list .= '</nav>' ."\n";

	} else {
		$menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
	}


	echo $menu_list;
	 
}//footer_menu()







