<?php get_header(); ?>	
	<div class="full-img">
		<?php the_post_thumbnail( 'post-thumbnail', 'class=post-full-img' ); ?>
		<i class="fa fa-times" aria-hidden="true"></i>
	</div>
	<div class="container">
	<div class="row row-single">
	<div class="col-md-6">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- post -->		
	<div class="pic-full">
		<?php the_post_thumbnail( 'post-thumbnail', 'class=post-img' ); ?>
		</div>
<?php endwhile; ?>

<?php else: ?>
<?php endif; ?>
	</div>
	<div class="col-md-6">
		<h2><?php the_title(); ?></h2>
		<div class="date">
			<?php the_date('d.m.y') ?>
		</div>
		<?php the_content( ) ?>
		<a href="<?php echo get_post_meta( get_the_ID(), 'download', true); ?>" target="_blank" rel="nofollow">
			<div class="download">Скачать бесплатно</div>
		</a>
		<div class="tags">
			<?php 
				the_tags('Теги: '); 
				$tags = get_post_meta(get_the_ID(), 'tags', true);
				$id = array(get_the_ID());
			?>
		</div>
		<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter"></div>
		<div class="ad">
			<!-- Yandex.RTB R-A-321453-1 -->
<div id="yandex_rtb_R-A-321453-1"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-321453-1",
                renderTo: "yandex_rtb_R-A-321453-1",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
		</div>
	</div>

	</div></div>

	<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-12"><h3>Похожие</h3></div>
		<div class="col-12 col-md-10 similars">
			
<?php 
	$args = array(
	'posts_per_page' => 5,
	'paged' => 1,
	'tag' => $tags,
	'post__not_in' => $id
		);
$query = new WP_Query( $args );

// Цикл

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		?>
		<a href="<?php the_permalink(); ?>" class="similar-link">
			<div class="similar-item" style="background-image: url( <?php echo get_the_post_thumbnail_url();?> ) ;">
				<div class="similar-item-info">
					<span class="similar-item-caption"><?php the_title(); ?></span>
				</div>
				<div class="post-shadow"></div>
			</div>
		</a>

<?php	}
} 
else {
	// Постов не найдено
}
/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
wp_reset_postdata();


 ?>			
	</div>
		</div>
			</div>

<?php get_footer(); ?>	