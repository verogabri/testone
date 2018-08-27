<?php

    namespace Demo\Controller;
        
    
    // controller
    class BaseController {
        
        protected $view;
        
        public function __construct($view) {
            $this->view = $view;
        }
        
    }
    
    
?>