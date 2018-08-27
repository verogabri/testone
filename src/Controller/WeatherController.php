<?php

    namespace Demo\Controller;
    
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    
    // controller
    class WeatherController extends BaseController {
        
        
        public function daily(Request $request, Response $response) {
            return $this->view->render($response, 'weather.html', [
                "temperature" => "hoott"
            ]);
        }
    }
    
    
?>