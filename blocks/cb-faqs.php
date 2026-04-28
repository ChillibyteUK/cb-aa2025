<?php
/**
 * Block template for CB FAQ.
 *
 * @package cb-aa2025
 */

defined( 'ABSPATH' ) || exit;

$title = get_field( 'title' );
$faqs  = get_field( 'faqs' );

if ( empty( $faqs ) ) {
	return;
}

$schema_items = array();

foreach ( $faqs as $faq ) {
	if ( empty( $faq['question'] ) || empty( $faq['answer'] ) ) {
		continue;
	}

	$schema_items[] = array(
		'@type'          => 'Question',
		'name'           => wp_strip_all_tags( $faq['question'] ),
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => wp_strip_all_tags( $faq['answer'] ),
		),
	);
}

$schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => $schema_items,
);
?>

<section class="cb-faq has-off-white-background-color">
	<div class="container">

		<?php if ( $title ) : ?>
			<h2 class="cb-faq__title text-center">
				<?= esc_html( $title ); ?>
			</h2>
		<?php endif; ?>

		<div class="row justify-content-center cb-faq__grid">

			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$question = $faq['question'] ?? '';
				$answer   = $faq['answer'] ?? '';
				$item_id  = 'faq-' . $block['id'] . '-' . $index;

				if ( ! $question || ! $answer ) {
					continue;
				}
				?>

				<div class="col-md-6 cb-faq__col">
					<div class="cb-faq__item">
						<button
							class="cb-faq__question"
							type="button"
							aria-expanded="false"
							aria-controls="<?= esc_attr( $item_id ); ?>"
						>
							<span><?= esc_html( $question ); ?></span>
							<span class="cb-faq__icon" aria-hidden="true"></span>
						</button>

						<div
							id="<?= esc_attr( $item_id ); ?>"
							class="cb-faq__answer"
							hidden
						>
							<?= wp_kses_post( $answer ); ?>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>

	</div>

	<?php if ( ! empty( $schema_items ) ) : ?>
		<script type="application/ld+json">
			<?= wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
		</script>
	<?php endif; ?>
</section>