<?php
// Template Name: Sobre 
?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="container sobre">
			<h2 class="subtitulo"><?php the_title(); ?></h2>

			<div class="grid-8">
				<?php
					$imagem = wp_get_attachment_image_src(get_field_cmb2('foto_rest_id'),'medium')[0]; 
				?>
				<img src="<?php the_field_cmb2('foto_rest'); ?>" alt="Fachada do Rest">
				<img src="<?php echo $imagem; ?>" alt="Fachada do Rest">
			</div>

			<div class="grid-8">
				<h2>História</h2>
				<p><?php echo get_post_meta(get_the_ID(), 'historia', true); ?></p>
				<p>Gostaria de enfatizar que o desenvolvimento contínuo de distintas formas de atuação prepara-nos para enfrentar situações atípicas decorrentes do remanejamento dos quadros funcionais.</p>
				<h2>Visão</h2>
				<p><?php echo get_post_meta(get_the_ID(), 'visao', true); ?></p>
				<h2>Valores</h2>
				<p>O empenho em analisar a consolidação das estruturas apresenta tendências no sentido de aprovar a manutenção dos índices pretendidos.</p>
			</div>
		</section>
	<?php endwhile; else: ?>
		<section class="container sobre">
			<div class="grid-8">
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<div>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>