<!-- File : app/views/elements/waplLink.ctp -->
<?php
	if ( (isset($label)) && (isset($url)) )
		echo "	<row>
					<cell>
						<externalLink>
							<label>$label</label>
							<url>$url</url>
						</externalLink>
					</cell>
				</row>";
?>
		
