<?php
	$url = "http://feeds.feedburner.com/metathesigr";
	require('rss_fetch.inc');
	$rss = fetch_rss($url);
	
	$num_items = 3;
	$counter = 0;
	$fh = fopen('../app/webroot/news/news.alx', 'w') or die('Cannot');
	$news = "";
	
	foreach($rss->items as $item)
	{
		$exp = explode(" ", $item['pubdate']);
		$date = implode(" ", array($exp[0], $exp[1], $exp[2], $exp[3]));
		$news .= "<a href=\"" . $item['feedburner']['origlink'] . "\">" . $item['title'] . "</a> (" . $date . ")<br />";
		$counter++;
		var_dump($item);
		if ($counter>=$num_items)
			break;
	}
	
	fwrite($fh, $news);
	fclose($fh);
?>
