<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="eightcol first clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">

							<header class="article-header">

								<h1><?php _e( '404 - Page Not Found', 'bonestheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p>Unfortunately, the page you were looking for could not be found. Please try using the search field below, or <a href="<?php echo get_site_url(); ?>" title="Click here to return to the home page.">click here</a> to return to the home page.</p>

							</section>

							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section>

						</article>

					</div>

				</div>

			</div>

<?php get_footer(); ?>
