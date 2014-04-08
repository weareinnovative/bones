<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type.php' ); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/
// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'bonestheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!








////////////////////////////////////////////////
// TINYMCE: FIRST LINE TOOLBAR CUSTOMIZATIONS //
////////////////////////////////////////////////
if( !function_exists('base_extended_editor_mce_buttons') ){
    function base_extended_editor_mce_buttons($buttons) {
        // The settings are returned in this array. Customize to suite your needs.
        return array(
            'bold', 'italic', 'blockquote', 'separator', 'bullist', 'numlist', 'separator', 'sub', 'sup', 'separator', 'link', 'unlink', 'separator', 'outdent', 'indent'
        );
        /* WordPress Default
        return array(
            'bold', 'italic', 'strikethrough', 'separator',
            'bullist', 'numlist', 'blockquote', 'separator',
            'justifyleft', 'justifycenter', 'justifyright', 'separator',
            'link', 'unlink', 'wp_more', 'separator',
            'spellchecker', 'fullscreen', 'wp_adv'
        ); */
    }
    add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
}

/////////////////////////////////////////////////
// TINYMCE: SECOND LINE TOOLBAR CUSTOMIZATIONS //
/////////////////////////////////////////////////
if( !function_exists('base_extended_editor_mce_buttons_2') ){
    function base_extended_editor_mce_buttons_2($buttons) {
        // The settings are returned in this array. Customize to suite your needs. An empty array is used here because I remove the second row of icons.
        return array(
            'formatselect', 'separator', 'charmap', 'fullscreen', 'separator', 'undo', 'redo', 'separator', 'wp_help'
        );
    }
    add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
}


/////////////////////////////////////////
// CUSTOMIZE THE FORMAT DROPDOWN ITEMS //
/////////////////////////////////////////
if( !function_exists('base_custom_mce_format') ){
	function base_custom_mce_format($init) {
		// Add block format elements you want to show in dropdown
		$init['theme_advanced_blockformats'] = 'p,h2,h3,h4,h5,h6';
		// Add elements not included in standard tinyMCE dropdown p,h1,h2,h3,h4,h5,h6
		//$init['extended_valid_elements'] = 'code[*]';
		return $init;
	}
	add_filter('tiny_mce_before_init', 'base_custom_mce_format' );
}0


///////////////////////////////////////////////
// PARENT AND CHILD PAGE PASSWORD PROTECTION //
///////////////////////////////////////////////
// function has_protected_parents ( $post ) {
// 	foreach ( get_post_ancestors($post) as $parent ) {
// 		if ( post_password_required( $parent ) ) {
// 			return true;
// 		}
// 	}
// 	return false;
// }


////////////////////////////////
// TRIM LENGTH OF EXCERPT     //
// Change $excerpt_word_count //
////////////////////////////////
// function custom_wp_trim_excerpt($text) {
// $raw_excerpt = $text;
// if ( '' == $text ) {
//     //Retrieve the post content.
//     $text = get_the_content('');

//     //Delete all shortcode tags from the content.
//     $text = strip_shortcodes( $text );

//     $text = apply_filters('the_content', $text);
//     $text = str_replace(']]>', ']]&gt;', $text);

//     $allowed_tags = '<a>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
//     $text = strip_tags($text, $allowed_tags);

//     $excerpt_word_count = 55; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
//     $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);

//     $excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
//     $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

//     $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
//     if ( count($words) > $excerpt_length ) {
//         array_pop($words);
//         $text = implode(' ', $words);
//         $text = $text . $excerpt_more;
//     } else {
//         $text = implode(' ', $words);
//     }
// }
// return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
// }
// remove_filter('get_the_excerpt', 'wp_trim_excerpt');
// add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');


///////////////////////////////////
// REMOVE P TAG FROM AROUND IMGS //
// ----------------------------- //
// Not sure if this still works? //
///////////////////////////////////
// function filter_ptags_on_images($content){
//    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
// }
// add_filter('the_content', 'filter_ptags_on_images');


///////////////////////////////
//  CUSTOM DASHBOARD WIDGET  //
///////////////////////////////
// function say_what_up(){
// 	echo 'Having problems with WordPress, or just not sure where to go to add/remove something from the website? Click <a href="mailto:design@weareinnovative.ca?subject=PROJECT NAME Website Problem">here</a> to send an email to <a href="mailto:design@weareinnovative.ca?subject=PROJECT NAME Website Problem">Innovative Media + Marketing</a>, and we will get back to you as soon as possible!';
// }
// function register_widgets(){
// 	wp_add_dashboard_widget('our-css-id','Having Troubles?','say_what_up');
// }
// add_action('wp_dashboard_setup','register_widgets');


////////////////////////////////
//  CUSTOM ADMIN FOOTER TEXT  //
////////////////////////////////
// function remove_footer_admin () {
// 	echo 'Having problems with WordPress, or just not sure where to go to add/remove something from the website? Click <a href="mailto:design@weareinnovative.ca?subject=PROJECT NAME Website Problem">here</a> to send an email to <a href="design@weareinnovative.ca.com?subject=PROJECT NAME Website Problem">Innovative Media + Marketing</a>, and we will get back to you as soon as possible!';
// }
// add_filter('admin_footer_text', 'remove_footer_admin');




?>