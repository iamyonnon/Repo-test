<?php
/**
 * Style template.
 *
 * 🚫🚫🚫
 * DO NOT EDIT THIS FILE WHILE INSIDE THE PLUGIN! Changes You make will be lost when a new version
 * of the AMP plugin is released. You need to copy this file out of the plugin and put it into your
 * custom theme, for example. To learn about how to customize these Reader-mode AMP templates, please
 * see: https://amp-wp.org/documentation/how-the-plugin-works/classic-templates/
 * 🚫🚫🚫
 *
 * @package AMP
 */

// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */

$content_max_width       = absint( $this->get( 'content_max_width' ) );
$theme_color             = $this->get_customizer_setting( 'theme_color' );
$text_color              = $this->get_customizer_setting( 'text_color' );
$muted_text_color        = $this->get_customizer_setting( 'muted_text_color' );
$border_color            = $this->get_customizer_setting( 'border_color' );
$link_color              = $this->get_customizer_setting( 'link_color' );
$header_background_color = $this->get_customizer_setting( 'header_background_color' );
$header_color            = $this->get_customizer_setting( 'header_color' );
?>
/* Generic WP styling */

.alignright {
	float: right;
}

.alignleft {
	float: left;
}

.aligncenter {
	display: block;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}

.amp-wp-enforced-sizes {
	/** Our sizes fallback is 100vw, and we have a padding on the container; the max-width here prevents the element from overflowing. **/
	max-width: 100%;
	margin: 0 auto;
}

<?php echo wp_remote_retrieve_body(wp_remote_get( AMP__DIR__ . '/assets/css/amp-default.css' )); // phpcs:ignore WordPress.WP.AlternativeFunctions ?>

/* Template Styles */

.amp-wp-content,
.amp-wp-title-bar div {
	<?php if ( $content_max_width > 0 ) : ?>
	margin: 0 auto;
	max-width: <?php echo sprintf( '%dpx', $content_max_width ); ?>;
	<?php endif; ?>
}

html {
	background: <?php echo sanitize_hex_color( $header_background_color ); ?>;
}

body {
	background: <?php echo sanitize_hex_color( $theme_color ); ?>;
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
	font-family: Georgia, 'Times New Roman', Times, Serif;
	font-weight: 300;
	line-height: 1.75em;
}

p,
ol,
ul,
figure {
	margin: 0 0 1em;
	padding: 0;
}

a,
a:visited {
	color: <?php echo sanitize_hex_color( $link_color ); ?>;
}

a:hover,
a:active,
a:focus {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
}

/* Quotes */

blockquote {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
	background: rgba(127,127,127,.125);
	border-<?php echo is_rtl() ? 'right' : 'left'; ?>: 2px solid <?php echo sanitize_hex_color( $link_color ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
	margin: 8px 0 24px 0;
	padding: 16px;
}

blockquote p:last-child {
	margin-bottom: 0;
}

/* UI Fonts */

.amp-wp-meta,
.amp-wp-header div,
.amp-wp-title,
.wp-caption-text,
.amp-wp-tax-category,
.amp-wp-tax-tag,
.amp-wp-comments-link,
.amp-wp-footer p,
.back-to-top {
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
}

/* Header */

.amp-wp-header {
	background-color: <?php echo sanitize_hex_color( $header_background_color ); ?>;
}

.amp-wp-header div {
	color: <?php echo sanitize_hex_color( $header_color ); ?>;
	font-size: 1em;
	font-weight: 400;
	margin: 0 auto;
	max-width: calc(840px - 32px);
	padding: .875em 16px;
	position: relative;
}

.amp-wp-header a {
	color: <?php echo sanitize_hex_color( $header_color ); ?>;
	text-decoration: none;
}

<?php if ( $this->get( 'post_canonical_link_url' ) || is_customize_preview() ) : ?>
	.amp-wp-header .amp-wp-canonical-link {
		font-size: 0.8em;
		text-decoration: underline;
		position: absolute;
		<?php
		$distance = 18;
		if ( $this->get( 'site_icon_url' ) ) {
			$distance += 32 + 10; // Width of site icon with margin.
		}
		printf( '%s: %dpx;', is_rtl() ? 'left' : 'right', $distance ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	}
<?php endif; ?>

.amp-wp-header .amp-wp-site-icon {
	/** site icon is 32px **/
	background-color: <?php echo sanitize_hex_color( $header_color ); ?>;
	border: 1px solid <?php echo sanitize_hex_color( $header_color ); ?>;
	border-radius: 50%;
	position: absolute;
	<?php echo is_rtl() ? 'left' : 'right'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>: 18px;
	top: 10px;
}

/* Article */

.amp-wp-article {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
	font-weight: 400;
	margin: 1.5em auto;
	max-width: 840px;
	overflow-wrap: break-word;
	word-wrap: break-word;
}

/* Article Header */

.amp-wp-article-header {
	align-items: center;
	align-content: stretch;
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	margin: 1.5em 16px 0;
}

.amp-wp-title {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
	display: block;
	flex: 1 0 100%;
	font-weight: 900;
	margin: 0 0 .625em;
	width: 100%;
}

/* Article Meta */

.amp-wp-meta {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	display: inline-block;
	flex: 2 1 50%;
	font-size: .875em;
	line-height: 1.5em;
	margin: 0;
	padding: 0;
}

.amp-wp-article-header .amp-wp-meta:first-of-type {
	text-align: <?php echo is_rtl() ? 'right' : 'left'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
}

.amp-wp-article-header .amp-wp-meta:last-of-type {
	margin-bottom: 1.5em;
}

.amp-wp-byline amp-img,
.amp-wp-byline .amp-wp-author {
	display: inline-block;
	vertical-align: middle;
}

.amp-wp-byline amp-img {
	border: 1px solid <?php echo sanitize_hex_color( $link_color ); ?>;
	border-radius: 50%;
	position: relative;
	margin-<?php echo is_rtl() ? 'left' : 'right'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>: 6px;
}

.amp-wp-posted-on {
	text-align: <?php echo is_rtl() ? 'left' : 'right'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
}

/* Featured image */

.amp-wp-article-featured-image {
	margin: 0 0 1em;
	text-align: center;
	display: block;
	width: 100%;
}
.amp-wp-article-featured-image amp-img {
	margin: 0 auto;
}
.amp-wp-article-featured-image.wp-caption .wp-caption-text {
	margin: 0 18px;
}

/* Article Content */

.amp-wp-article-content {
	margin: 0 16px;
}

.amp-wp-article-content ul,
.amp-wp-article-content ol {
	margin-<?php echo is_rtl() ? 'right' : 'left'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>: 1em;
}

.amp-wp-article-content .wp-caption {
	max-width: 100%;
}

.amp-wp-article-content amp-img {
	margin: 0 auto;
}

.amp-wp-article-content amp-img.alignright {
	margin: 0 0 1em 16px;
}

.amp-wp-article-content amp-img.alignleft {
	margin: 0 16px 1em 0;
}

/* Captions */

.wp-caption {
	padding: 0;
}

.wp-caption.alignleft {
	margin-right: 16px;
}

.wp-caption.alignright {
	margin-left: 16px;
}

.wp-caption .wp-caption-text {
	border-bottom: 1px solid <?php echo sanitize_hex_color( $border_color ); ?>;
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	margin: 0;
	padding: .66em 10px .75em;
}

/* AMP Media */

.alignwide,
.alignfull {
	clear: both;
}

amp-carousel {
	background: <?php echo sanitize_hex_color( $border_color ); ?>;
	margin: 0 -16px 1.5em;
}
amp-iframe,
amp-youtube,
amp-instagram,
amp-vine {
	background: <?php echo sanitize_hex_color( $border_color ); ?>;
	margin: 0 -16px 1.5em;
}

.amp-wp-article-content amp-carousel amp-img {
	border: none;
}

amp-carousel > amp-img > img {
	object-fit: contain;
}

.amp-wp-iframe-placeholder {
	background: <?php echo sanitize_hex_color( $border_color ); ?> url( <?php echo esc_url( $this->get( 'placeholder_image_url' ) ); ?> ) no-repeat center 40%;
	background-size: 48px 48px;
	min-height: 48px;
}

/* Article Footer Meta */

.amp-wp-article-footer .amp-wp-meta {
	display: block;
}

.amp-wp-tax-category,
.amp-wp-tax-tag {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	margin: 1.5em 16px;
}

.amp-wp-comments-link {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	text-align: center;
	margin: 2.25em 0 1.5em;
}

.amp-wp-comments-link a {
	border-style: solid;
	border-color: <?php echo sanitize_hex_color( $border_color ); ?>;
	border-width: 1px 1px 2px;
	border-radius: 4px;
	background-color: transparent;
	color: <?php echo sanitize_hex_color( $link_color ); ?>;
	cursor: pointer;
	display: block;
	font-size: 14px;
	font-weight: 600;
	line-height: 18px;
	margin: 0 auto;
	max-width: 200px;
	padding: 11px 16px;
	text-decoration: none;
	width: 50%;
	-webkit-transition: background-color 0.2s ease;
			transition: background-color 0.2s ease;
}

/* AMP Footer */

.amp-wp-footer {
	border-top: 1px solid <?php echo sanitize_hex_color( $border_color ); ?>;
	margin: calc(1.5em - 1px) 0 0;
}

.amp-wp-footer div {
	margin: 0 auto;
	max-width: calc(840px - 32px);
	padding: 1.25em 16px 1.25em;
	position: relative;
}

.amp-wp-footer h2 {
	font-size: 1em;
	line-height: 1.375em;
	margin: 0 0 .5em;
}

.amp-wp-footer p {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .8em;
	line-height: 1.5em;
	margin: 0 85px 0 0;
}

.amp-wp-footer a {
	text-decoration: none;
}

.back-to-top {
	bottom: 1.275em;
	font-size: .8em;
	font-weight: 600;
	line-height: 2em;
	position: absolute;
	<?php echo is_rtl() ? 'left' : 'right'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>: 16px;
}

.amp-wp-article-footer{
	margin: 1.5em 16px 0;
}

.main.version-chap{
	margin: 1.5em 16px 0;
}

.chapter-release-date{
	font-size: 0.87em;
    display: block;
}

.wp-manga-nav .select-view > div, .selectpicker_chapter{display: inline}
.nav-links{
	display: flex;
}
.nav-links > div{
	display: inline-block;
	flex: 2 1 50%;
	width: 50%;
}
.nav-links > div:last-of-type{
	text-align: <?php echo is_rtl() ? 'left' : 'right'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
}

.fa-lock:before{content:"\f023"}.fa-lock-open:before{content:"\f3c1"}
.fa-coins:before{content:"\f51e"}
@font-face{font-family:"Font Awesome 5 Brands";font-style:normal;font-weight:normal;font-display:auto;src:url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-brands-400.eot);src:url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-brands-400.eot?#iefix) format("embedded-opentype"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-brands-400.woff2) format("woff2"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-brands-400.woff) format("woff"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-brands-400.ttf) format("truetype"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-brands-400.svg#fontawesome) format("svg")}.fab{font-family:"Font Awesome 5 Brands"}@font-face{font-family:"Font Awesome 5 Free";font-style:normal;font-weight:400;font-display:auto;src:url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-regular-400.eot);src:url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-regular-400.eot?#iefix) format("embedded-opentype"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-regular-400.woff2) format("woff2"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-regular-400.woff) format("woff"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-regular-400.ttf) format("truetype"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-regular-400.svg#fontawesome) format("svg")}.far{font-weight:400}@font-face{font-family:"Font Awesome 5 Free";font-style:normal;font-weight:900;font-display:auto;src:url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-solid-900.eot);src:url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-solid-900.eot?#iefix) format("embedded-opentype"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-solid-900.woff2) format("woff2"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-solid-900.woff) format("woff"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-solid-900.ttf) format("truetype"),url(<?php echo get_template_directory_uri();?>/amp/fontawesome-webfonts/fa-solid-900.svg#fontawesome) format("svg")}.fa,.far,.fas{font-family:"Font Awesome 5 Free"}.fa,.fas{font-weight:900}

<?php 

$amp_height = function_exists('ot_get_option') ? ot_get_option('amp_image_height', 400) : 400;

if(function_exists('madara_permalink_reading_chapter')){
	$chapter = madara_permalink_reading_chapter();
	if($chapter){
		
		global $wp_manga_chapter;
		$chapter_amp_height = $wp_manga_chapter->get_chapter_meta($chapter, 'AMP_Height');
		if($chapter_amp_height){
			$amp_height = $chapter_amp_height;
		}
	}
}

 ?>

.fixed-container {
  position: relative;
  width: 100%;
  height: <?php echo esc_html($amp_height);?>px;
}

amp-img.contain img {
   object-fit: contain;
}

.wp-manga-nav .select-view{text-align: center; margin-top: 20px}