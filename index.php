<?php
/*
Template name: index
*/
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */
get_header();
$context          = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['foo']   = 'bar';
$templates        = array( 'index.twig','footer.twig');
if ( is_home() ) {
	//array_unshift( $templates, 'front-page.twig', 'home.twig' );
}
//$context['mainpage']= Timber:: get_post(6);
// $context['logo_1']= get_theme_mod( 'm1_logo1' );
// $context['logo_2']= get_theme_mod( 'm1_logo2' );
// $context['facebook']= get_theme_mod( 'facebookUrl' );
// $context['phone']= get_theme_mod( 'phone' );
// $context['email']= get_theme_mod( 'email' );
// $context['menuTop'] = new Timber\Menu('header_menu');
// $context['menuFooter'] = new Timber\Menu('footer_menu');
$date_now = date('Y-m-d');

$context['is_front_page']= 1;

//$post = new Timber\Post();

while (have_posts()) : the_post();
$data = Timber::context();
$context['post'] = new Timber\Post();
$blocks= parse_blocks(get_the_content());
$newBlocks=array();
foreach($blocks as $block){
    $blockName= $block['blockName'];
    if($blockName=='acf/section'){
		$blockTitle= $block['attrs']['data']['tytul_sekcji'];
		$blockDataId= $block['attrs']['data']['dataid'];
		$newBlocks[]=array(
			'blockTitle'=>$blockTitle,
			//'blockName'=> $blockName
			'blockDataId'=> $blockDataId
	
		);
    };
};

endwhile;
$context['blocks']= $newBlocks;
$context['home']= true;
Timber::render( $templates, $context );

//get_footer();