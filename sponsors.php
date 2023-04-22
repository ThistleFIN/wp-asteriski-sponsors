<?php
/**
 * Sponsor template
 *
 * @package asteriski-sponsors
 */

defined('ABSPATH') || exit;

$main_sponsor_title = carbon_get_theme_option('main_sponsor_name');
$main_sponsor_link = carbon_get_theme_option('main_sponsor_link');
$main_sponsor_img = carbon_get_theme_option('main_sponsor_image');
$sponsors = carbon_get_theme_option('asteriski_sponsors');
shuffle($sponsors);
?>

<div class="sponsors-block">
	<div class="main-sponsor sponsor">
		<a href="<?php echo esc_url($main_sponsor_link); ?>" target="_blank">
			<?php echo wp_get_attachment_image($main_sponsor_img, 'full', '', array(
				'class' => 'main-sponsor',
				'title' => esc_attr($main_sponsor_title),
				'alt' => esc_attr($main_sponsor_title),
			)); ?>
		</a>
	</div>

	<div class="sponsors">
		<?php foreach ($sponsors as $sponsor) : ?>
			<div class="sponsor">
				<a href="<?php echo esc_url($sponsor['sponsor_link']); ?>" target="_blank">
					<?php echo wp_get_attachment_image($sponsor['sponsor_image'], 'full', '', array(
						'class' => 'main-sponsor',
						'title' => esc_attr($sponsor['sponsor_name']),
						'alt' => sprintf(__('Logo of a sponsor. Sponsor is %s.', 'asteriski-sponsors'), esc_attr($sponsor['sponsor_name'])),
					)); ?>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
