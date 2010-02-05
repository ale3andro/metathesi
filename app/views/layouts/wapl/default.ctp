<?php 
	// XML headers and open
	$string = '<' . '?xml version="1.0" encoding="utf-8" ?'.'><wapl xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://wapl.wapple.net/wapl.xsd">';

	// Page title and external CSS
	$string .= '<head><title>'.$title_for_layout.'</title>';
	$string .= '<css><url>' . $this->webroot . 'css/mobile.css</url></css>';
	$string .= '</head>';
	$string .= '<layout start_stack="div">';
	echo '	<row>
				<cell>
					<externalLink>
						<label>metathesi.gr - αυστηρά για εκπαιδευτικούς...</label>
						<url>http://metathesi.gr</url>
					</externalLink>
				</cell>
			</row>';

	$string .= $content_for_layout;

	$string .= '</layout></wapl>';

	// Setup parameters for communicating
	$params = array('devKey' => $architectDevKey, 'wapl' => $string, 'deviceHeaders' => $sClientHeaders);

	// Send markup to API and parse through simplexml
	$xml = simplexml_load_string(@$sClient->getMarkupFromWapl($params));

	foreach($xml->header->item as $val)
	{
		header($val);
	}
	echo trim($xml->markup);
?>
