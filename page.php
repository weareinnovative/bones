<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
									<?php /* <p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'bonestheme' ) ), bones_get_the_author_posts_link());
									?></p> */ ?>

								</header>

								<section class="entry-content clearfix" itemprop="articleBody">

									<?php

										if( empty( $post->post_content) ) { ?>

											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque placerat cursus turpis in pulvinar.</strong> Etiam vitae neque quis ligula pretium euismod et eget erat. <em>Integer nec massa ante, vitae vehicula mi.</em> Aliquam erat volutpat. <span style="color: #00ff00;">Ut id scelerisque mi.</span> Donec turpis elit, mattis vitae pellentesque id, posuere eget mi. <a href="#">Fusce lacus ipsum, eleifend id mollis eu, tincidunt et lorem.</a> Vivamus varius adipiscing nibh ut adipiscing.</p>

											<p>Vestibulum nulla lectus, congue sit amet dictum non, fringilla et augue. Aliquam tincidunt molestie tortor sit amet faucibus. Pellentesque enim sapien, luctus sit amet sodales a, vulputate a lectus. Duis molestie sem et nisl fermentum tincidunt. Vivamus lacinia ullamcorper auctor. Aenean sagittis odio vitae nisi mattis pulvinar eget sit amet elit. Vivamus felis erat, venenatis vel iaculis in, pharetra ac ligula. Curabitur elementum iaculis convallis.</p>

											<p>Aliquam at odio a lacus tempor aliquet ut sit amet mauris. Aliquam elementum tempus tortor id ullamcorper. Proin commodo pulvinar faucibus. Ut ultricies accumsan urna et consequat. Vivamus eget erat vitae lectus venenatis accumsan. Nam pulvinar accumsan nulla a congue. Etiam urna mauris, porta ac sodales sit amet, facilisis a diam. Nulla faucibus neque sit amet arcu venenatis at tincidunt dui imperdiet. In lacus nunc, fringilla ut porttitor quis, adipiscing in dolor. Aliquam in ligula sit amet enim pulvinar laoreet non at dolor.</p>
											
											<h2>This is an H2 Style Heading</h2>
											<p>Nulla sem tellus, aliquet vel faucibus vitae, iaculis sit amet nisl. Sed in tellus dictum leo viverra lobortis laoreet a dolor. Proin laoreet, nisl ac tempus interdum, felis enim vehicula mauris, vel porttitor purus libero id nisi. Cras ipsum elit, elementum ac accumsan eget, sagittis vel ante. Duis mattis elit placerat lacus dapibus a varius diam vehicula. Etiam consequat fermentum felis quis viverra. Suspendisse sit amet lobortis lectus. Curabitur lobortis convallis rutrum. Donec congue ornare rutrum. Donec non enim ante.</p>
											
											<p style="padding-left: 30px;">This is some indented text.</p>

											<ol>
												<li>OL Item One</li>
												<li>OL Item Two
													<ol>
														<li>OL Sub-Item One</li>
														<li>OL Sub-Item Two</li>
													</ol>
												</li>
												<li>OL Item Three</li>
											</ol>

											<ul>
												<li>UL Item One</li>
												<li>UL Item Two
													<ul>
														<li>UL Sub-Item One</li>
														<li>UL Sub-Item Two</li>
													</ul>
												</li>
												<li>UL Item Three</li>
											</ul>

											<blockquote>
												<p>Aliquam at odio a lacus tempor aliquet ut sit amet mauris. Aliquam elementum tempus tortor id ullamcorper. Proin commodo pulvinar faucibus. Ut ultricies accumsan urna et consequat. Vivamus eget erat vitae lectus venenatis accumsan. Nam pulvinar accumsan nulla a congue. Etiam urna mauris, porta ac sodales sit amet, facilisis a diam. Nulla faucibus neque sit amet arcu venenatis at tincidunt dui imperdiet. In lacus nunc, fringilla ut porttitor quis, adipiscing in dolor. Aliquam in ligula sit amet enim pulvinar laoreet non at dolor.</p>
											</blockquote>

											<p>Vestibulum nulla lectus, congue sit amet dictum non, fringilla et augue. Aliquam tincidunt molestie tortor sit amet faucibus. Pellentesque enim sapien, luctus sit amet sodales a, vulputate a lectus. Duis molestie sem et nisl fermentum tincidunt. Vivamus lacinia ullamcorper auctor. Aenean sagittis odio vitae nisi mattis pulvinar eget sit amet elit. Vivamus felis erat, venenatis vel iaculis in, pharetra ac ligula. Curabitur elementum iaculis convallis.</p>

											<h3>This is an H3 Style Heading</h3>
											<p>Aliquam at odio a lacus tempor aliquet ut sit amet mauris. Aliquam elementum tempus tortor id ullamcorper. Proin commodo pulvinar faucibus. Ut ultricies accumsan urna et consequat. Vivamus eget erat vitae lectus venenatis accumsan. Nam pulvinar accumsan nulla a congue. Etiam urna mauris, porta ac sodales sit amet, facilisis a diam. Nulla faucibus neque sit amet arcu venenatis at tincidunt dui imperdiet. In lacus nunc, fringilla ut porttitor quis, adipiscing in dolor. Aliquam in ligula sit amet enim pulvinar laoreet non at dolor.</p>

											<h4>This is an H4 Style Heading</h4>
											<p>Donec mollis tempus nisi non vulputate. Suspendisse metus lacus, commodo et vulputate et, luctus eu quam. Fusce ut quam sem. Donec nec nisl non lectus semper venenatis. Curabitur orci lectus, blandit sit amet ullamcorper ut, sodales sed sapien. Integer in magna lacinia nisi bibendum mattis. Nam facilisis feugiat risus id commodo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut gravida velit sed turpis interdum sit amet viverra nisl posuere. Cras congue scelerisque pulvinar. Proin laoreet egestas lorem, eu bibendum odio pharetra ut. Fusce congue dui ac nisl pharetra aliquam. Pellentesque consectetur venenatis consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mi lacus, suscipit at lacinia vitae, consequat non mauris.</p>

											<h5>Nulla sem tellus, aliquet vel faucibus vitae, iaculis sit amet nisl. Sed in tellus dictum leo viverra lobortis laoreet a dolor. Proin laoreet, nisl ac tempus interdum, felis enim vehicula mauris, vel porttitor purus libero id nisi. Cras ipsum elit, elementum ac accumsan eget, sagittis vel ante. Duis mattis elit placerat lacus dapibus a varius diam vehicula. Etiam consequat fermentum felis quis viverra. Suspendisse sit amet lobortis lectus. Curabitur lobortis convallis rutrum. Donec congue ornare rutrum. Donec non enim ante.</h5>

											<h6>Aliquam at odio a lacus tempor aliquet ut sit amet mauris. Aliquam elementum tempus tortor id ullamcorper. Proin commodo pulvinar faucibus. Ut ultricies accumsan urna et consequat. Vivamus eget erat vitae lectus venenatis accumsan. Nam pulvinar accumsan nulla a congue. Etiam urna mauris, porta ac sodales sit amet, facilisis a diam. Nulla faucibus neque sit amet arcu venenatis at tincidunt dui imperdiet. In lacus nunc, fringilla ut porttitor quis, adipiscing in dolor. Aliquam in ligula sit amet enim pulvinar laoreet non at dolor.</h6>

										<?php } else {

											the_content();

										}

									?>

								</section>

							</article>

							<?php endwhile; else: endif; ?>

						</div>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
