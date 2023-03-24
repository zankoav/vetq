<?php

    class Assets {

        private $assets;

        public function __construct() {
            $path         = get_template_directory_uri() . "/frontend/assets.json";
            $content      = file_get_contents($path);
            $this->assets = json_decode($content, true);
        }

        public function js($name) {
            return $this->assets[$name]['js'];
        }
        
        public function css($name) {
            return $this->assets[$name]['css'];
        }
    }