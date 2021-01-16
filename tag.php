<?php get_header(); ?>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-12 col-md-10">
			<div class="masonry-container">
<?php 
	$args = array(
	'posts_per_page' => 10,
	'paged' => 1,
	'tag' => get_query_var('tag')
		);

$query = new WP_Query( $args );
// Цикл

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();?>
		<div class="item">	
					<div class="post">
						<a href="<?php the_permalink(); ?>">
						<?php $id=null; echo get_the_post_thumbnail($id, 'full', array('class' => 'post-img')); ?>
							<div class="post-shadow"></div>
							<div class="post-info">
								<span class="post-caption"><?php the_title(); ?></span>
							</div>
							</a>
							<a href="<?php echo get_post_meta( $query->post->ID, 'download', true); ?>" target="_blank" rel="nofollow">
									<div class="download-btn"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
								</a>
						</div>
				</div>
<?php	}
} 
else {
	echo 'Постов не найдено';
}
/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
wp_reset_postdata();


 ?>			

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <script>
    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
    var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
    var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
    </script>
<div id="load_more_gs">
</div>
<?php endif; ?>

 </div>
	</div>
		</div>
			</div>

<div class="container">
	<div class="row">
		<div class="col-12 justify-content-center">
			<div class="role">
				<i class="fa fa-cog" aria-hidden="true" style="display: none;"></i>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>	