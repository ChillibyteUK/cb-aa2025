<?php
/**
 * One-off migration: add layout keys for cb-scroll-snap flexible content
 *
 * Save as migrate-scrollsnap.php and run:
 *   wp eval-file migrate-scrollsnap.php
 */

global $wpdb;
$posts = $wpdb->get_results(
    "SELECT ID, post_content FROM {$wpdb->posts}
     WHERE post_content LIKE '%acf/cb-scroll-snap%'"
);

foreach ($posts as $post) {
    $content = $post->post_content;

    // Match each cb-scroll-snap block.
    $content = preg_replace_callback(
        '/<!-- wp:acf\/cb-scroll-snap ([^>]+) \/-->/',
        function ($matches) {
            $json = html_entity_decode($matches[1], ENT_QUOTES, 'UTF-8');

            // Decode the attribute JSON safely.
            $data = json_decode(trim($json), true);
            if (!isset($data['data']) || !is_array($data['data'])) {
                return $matches[0];
            }

            // Count rows.
            $rows = isset($data['data']['sections']) ? (int) $data['data']['sections'] : 0;
            for ($i = 0; $i < $rows; $i++) {
                $layoutKey  = "sections_{$i}_layout";
                $layoutVal  = "default_section";
                $layoutKey2 = "_sections_{$i}_layout";
                $layoutVal2 = "layout_default_section";

                // Inject only if missing.
                if (!isset($data['data'][$layoutKey])) {
                    $data['data'][$layoutKey] = $layoutVal;
                }
                if (!isset($data['data'][$layoutKey2])) {
                    $data['data'][$layoutKey2] = $layoutVal2;
                }
            }

            // Re-encode back to JSON.
            $newJson = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            return '<!-- wp:acf/cb-scroll-snap ' . $newJson . ' /-->';
        },
        $content
    );

    // Update the post only if something changed.
    if ($content !== $post->post_content) {
        $wpdb->update(
            $wpdb->posts,
            ['post_content' => $content],
            ['ID' => $post->ID]
        );
        echo "Updated post {$post->ID}\n";
    }
}

echo "Migration complete.\n";

