<?php 
/**
 * Mobile Detection Component
 * @author rich gubby
 * @version 0.1
 */ 
class MobileDetectionComponent extends Object
{
    var $components = array('RequestHandler');
    var $isMobile = false;
    var $architectDevKey = '55bad5af8e5a51c0a2a8aea207c46301';

    function startup($controller)
    {
        $this->controller = $controller;
    }

    function detect()
    {
        // Set up SOAP client
        try 
        {
            $sClient = @new SoapClient('http://webservices.wapple.net/wapl.wsdl');

            if($sClient)
            {
                $headers = array();
                foreach($_SERVER as $key => $val)
                {
                    $headers[] = array('name' => $key, 'value' => $val);
                }
                
                // If we're a mobile, use WAPL to display the page
                $params = array(
                    'devKey' => $this->architectDevKey,
                    'deviceHeaders' => $headers
                );
                    
                if(@$sClient->isMobileDevice($params))
                {
                    $this->controller->webservices = 'Wapl';
                    $this->RequestHandler->respondAs('xml');
                    $this->controller->viewPath .= DS.'wapl';
                    $this->controller->layoutPath = 'wapl';
                    $this->controller->set('sClient', $sClient);
                    $this->controller->set('sClientHeaders', $headers);
                    $this->controller->set('architectDevKey', $this->architectDevKey);

                    // Flag as a mobile device
                    $this->isMobile = true;
                }
            }
        } catch (Exception $e)
        {
            // Put your error handling in here
        }
    }
}
?>
