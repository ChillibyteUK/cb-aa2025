<?php
/**
 * Block template for CB Two Quotes.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="cb-two-quotes py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="inner">
					<?php
					if ( get_field( 'quote_1' ) ) {
						?>
					<blockquote class="cb-two-quotes__quote mb-4">
						<?= esc_html( get_field( 'quote_1' ) ); ?>
					</blockquote>
						<?php
					}
					if ( get_field( 'author_1' ) ) {
						?>
					<p class="cb-two-quotes__author text-end mb-0">
						&mdash; <?= esc_html( get_field( 'author_1' ) ); ?>
					</p>
						<?php
					}
					?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="inner">
					<?php
					if ( get_field( 'quote_2' ) ) {
						?>
					<blockquote class="cb-two-quotes__quote mb-4">
						<?= esc_html( get_field( 'quote_2' ) ); ?>
					</blockquote>
						<?php
					}
					if ( get_field( 'author_2' ) ) {
						?>
					<p class="cb-two-quotes__author text-end mb-0">
						&mdash; <?= esc_html( get_field( 'author_2' ) ); ?>
					</p>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>