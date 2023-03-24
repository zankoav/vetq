<?php 
    if (!defined('ABSPATH')) { exit; }
    wp_footer();
    global $assets;
    $data = $args['data'];
?>

        <script src="<?= $assets->js($data['page_name']); ?>"></script>
    </body>
</html>