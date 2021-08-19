<?php
/**
 * Sharing Buttons
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function post_social_sharing_buttons($content) {
	global $post;
	if(is_single()){
	
		// Get current page URL 
		$postURL = urlencode(get_permalink());
 
		// Get current page title
		$postTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $postTitle = str_replace( ' ', '%20', get_the_title());
		
    // Get Post Thumbnail for pinterest
		$postThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL.'&amp;via=realresearcher.com/media';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postURL.'&amp;title='.$postTitle;
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$postURL.'&amp;media='.$postThumbnail[0].'&amp;description='.$postTitle;
 
       
 
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Implement your own superfast social sharing buttons without any JavaScript loading. No plugin required.-->';
		$content .= '<div class="share-social d-flex flex-column flex-md-row mt-1">';
		$content .= '<p class="text-uppercase text-center font-italic text-muted mb-4 mb-md-0 mr-0 mr-md-4">share</p>';
    $content .= '<div class="share-buttons d-flex justify-content-between">';
    $content .= '<a class="share-btn share-facebook" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook"></i><span class="label">Facebook</span></a>';
    $content .= '<a class="share-btn share-twitter" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter"></i><span class="label">Twitter</span></a>';
		$content .= '<a class="share-btn share-linkedin" href="'.$linkedInURL.'" target="_blank"><i class="fa fa-linkedin"></i><span class="label">Linkedin</span></a>';
    $content .= '<a class="share-btn share-pinterest" href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i><span class="label">Pinterest</span></a>';
    $content .=  '</div>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'post_social_sharing_buttons');

// This will create a wordpress shortcode [social].
// Please it in any widget and social buttons appear their.
// You will need to enabled shortcode execution in widgets.
add_shortcode('social','post_social_sharing_buttons');