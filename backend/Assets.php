<?php if (!defined('ABSPATH')) { exit; }

    class Assets {

        private $assets;

        public function __construct() {
            $path         = get_template_directory_uri() . "/frontend/build/manifest.json";
            $content      = file_get_contents($path);
            $this->assets = json_decode($content, true);
        }

        public function asset($name) {
            return $this->assets[$name];
        }
    }