<?php 
//jquery
	function PREFIX_enqueue_scripts() {
		wp_enqueue_script( 'jquery-3.1.0.min', get_template_directory_uri() . '/js/jquery-3.1.0.min.js');
	}
	
	add_action( 'wp_enqueue_scripts', 'PREFIX_enqueue_scripts' );

$args = array(
	'name'          => 'Sidebar',
	'id'            => "sidebar",
	'description'   => 'Виджет сайдбара',
	'before_widget' => '<nav>
	<a class="nav-tab"><i class="fa fa-bars fa-2x"></i></a>
	<menu class="menu">',
	'after_widget'  => "</li> </menu> </nav>",
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => "</h2>\n",
);
register_sidebar( $args );


//миниатюры
add_theme_support( 'post-thumbnails' );

// menu
register_nav_menu( 'menu', 'Меню' );
register_nav_menu( 'footer-menu', 'Меню2' );


/**
 * Микроразметка навигационных меню, фильтруется через хук wp_nav_menu
**/
 function nav_menu_schema($content) {
	$pattern = "<a";
	$replacement = '<a itemprop="url"';
	$content = str_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('wp_nav_menu', 'nav_menu_schema');

add_action('template_redirect', 'bez_stranic_vlogenii');
function bez_stranic_vlogenii() {
	global $wp_query, $post;
	if ( is_attachment() ) :
		$wp_query->set_404();
	endif;
} 
//Подгрузка блоков
function true_load_posts(){
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';
    $args['posts_per_page'] = 10;
    $q = new WP_Query($args);



    if( $q->have_posts() ):
        while($q->have_posts()): $q->the_post(); 
?>
<div class="item">	
					<a href="<?php the_permalink(); ?>"><div class="post">
						<?php $id=null; echo get_the_post_thumbnail($id, 'full', array('class' => 'post-img')); ?>
							<div class="post-shadow"></div>
							<div class="post-info">
								<span class="post-caption"><?php the_title(); ?></span>
								<a href="<?php echo get_post_meta( $q->post->ID, 'download', true); ?>" target="_blank">
									<div class="download-btn"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
								</a>
							</div>
						</div>
					</a>
				</div>
<?php
endwhile; endif;
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

 ?>