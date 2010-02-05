<!-- File : app/views/elements/waplText.ctp -->
<?php

	if (isset($text))
		echo "	<row>
					<cell>
						<chars make_safe=\"1\"" . ((isset($class))?" class=\"$class\">":">") .
							"<value>$text</value>
						</chars>
					</cell>
				</row>";
?>
		
