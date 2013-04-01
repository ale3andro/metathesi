<!-- File: /app/views/provinces/pages/home.ctp -->

<?php
	echo  $this->element("header", array( "activeTab" => 0) );
	$this->set('title_for_layout', 'metathesi.gr - Αρχική Σελίδα');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="contentBIG" style="float:left">
			<div class="post">
				<h1 class="gamma">Καλώς ορίσατε στο metathesi.gr</h1>
				<div class="entry drop-cap epsilon">
					Καλώς ορίσατε στο <strong>metathesi.gr</strong>, ένα site αφιερωμένο στο μεγαλύτερο - μετά τον διορισμό - βάσανο των εκπαιδευτικών: τις 
						<strong>μεταθέσεις</strong>... Για περισσότερες πληροφορίες σχετικά με το <a href="http://metathesi.gr">metathesi.gr</a> επισκεφθείτε 
						<a href="pages/about">αυτή</a> τη σελίδα.
						<br /><?php echo $html->link("Disclaimer", "disclaimer"); ?>
				</div>
			</div>
			<div class="post">
				<h1 class="gamma">Επιλογή Περιοχής</h1>
				<div class="entry epsilon">
					Η επιλογή περιοχής μπορεί να γίνει από 
					<?php echo $html->link("τη λίστα", "/provinces/viewAll"); ?>
					με τις περιοχές ή από τον παρακάτω χάρτη:<br /><br />
					<map name="greece">
  						<area shape="poly" title="Νομός Λακωνίας" href="provinces/show/39" coords="241,489,242,491,242,494,244,496,244,499,243,501,243,513,246,519,248,520,249,522,253,524,255,523,257,519,257,516,258,514,258,505,257,503,257,500,259,496,259,493,260,491,266,488,268,489,269,491,271,492,276,502,276,505,278,509,278,512,280,513,281,515,287,518,290,518,294,520,297,520,299,521,302,521,304,520,306,516,306,510,303,504,301,503,297,495,297,492,298,490,298,487,299,485,299,476,297,472,295,470,294,468,292,467,291,465,285,465,284,467,281,467,277,469,274,469,272,468,270,464,266,462,259,448,257,447,255,443,251,441,248,441,244,443,242,447,240,448,238,450,236,451,233,457,236,463,238,465,240,469,240,478,241,480,241,483,240,485,240,491,241,493" />
  						<area shape="poly" title="Νομός Μεσσηνίας" href="provinces/show/45" coords="194,431,194,437,192,441,190,442,189,444,187,445,185,449,185,452,184,454,185,456,186,459,188,463,190,464,195,474,195,486,198,492,200,493,202,495,204,496,207,496,211,494,212,492,212,474,213,472,213,469,214,467,216,466,218,462,224,462,228,464,229,466,226,472,227,474,233,477,234,479,236,480,237,482,239,483,240,485,241,483,241,477,234,463,234,454,228,454,226,453,225,451,221,449,220,447,218,446,216,442,216,439,213,433,213,427,212,425,212,422,211,420,205,423,202,429,202,432,200,433,198,429,194,431,193,433,193,436" />
  						<area shape="poly" title="Νομός Αργολίδας" href="provinces/show/4" coords="246,396,250,394,251,392,253,391,255,392,256,394,260,396,262,398,268,401,271,401,273,402,276,402,278,403,296,403,298,402,300,403,301,405,301,408,302,410,302,413,304,415,306,419,308,421,320,427,320,433,319,435,307,441,306,443,300,446,298,445,295,444,293,443,289,435,287,434,284,428,274,423,271,423,269,424,266,424,260,427,254,424,252,420,252,417,254,413,252,409,250,408,247,408,245,407,244,405,242,404,239,398,241,394,243,393,247,395,249,394" />
  						<area shape="poly" title="Νομός Αρκαδίας" href="provinces/show/5" coords="214,438,216,439,217,441,217,444,219,445,220,447,222,449,223,451,225,453,227,454,233,454,241,450,242,448,244,447,247,441,250,441,252,442,255,442,257,443,267,463,269,464,270,466,272,467,273,469,275,470,277,468,281,466,284,466,286,467,289,467,291,466,292,464,288,456,286,455,285,453,283,452,282,450,282,444,281,442,281,439,279,435,279,432,277,431,275,427,273,425,272,423,262,428,259,428,258,426,254,424,253,422,253,419,254,417,254,414,253,412,249,410,248,408,246,407,244,405,241,399,241,396,240,394,238,392,235,392,234,390,231,390,230,392,228,393,216,393,210,390,207,390,205,391,204,393,200,395,199,397,199,400,200,402,200,405,203,411,205,412,206,414,208,415,211,416,213,417,215,421,215,439,216,441" />
  						<area shape="poly" title="Νομός Ηλείας" href="provinces/show/26" coords="170,364,171,366,175,368,177,370,179,371,180,373,179,375,179,381,181,382,182,384,190,388,193,388,195,387,196,385,198,384,200,380,202,379,205,379,208,385,206,389,204,390,202,394,200,395,199,397,199,400,200,402,200,405,204,413,208,415,209,417,213,419,214,421,214,424,212,425,206,425,204,426,204,432,201,432,200,430,198,429,195,429,193,428,190,422,190,419,189,417,187,416,185,412,183,410,182,408,172,403,170,405,169,407,166,407,163,401,163,398,164,396,164,393,163,391,149,384,148,382,148,379,150,375,152,374,155,374,159,372,161,368,163,367,164,365,166,364,170,366" />
  						<area shape="poly" title="Νομός Κορινθίας" href="provinces/show/36" coords="246,345,247,347,247,356,244,362,242,363,241,365,241,371,240,373,236,375,234,379,234,391,235,393,237,394,240,394,242,395,245,395,247,394,249,390,252,390,256,392,257,394,265,398,268,398,271,399,274,399,276,400,279,400,283,402,286,402,288,403,291,403,293,402,296,402,298,401,301,401,303,400,300,394,302,390,301,388,299,387,296,386,293,386,292,384,290,383,290,380,294,378,297,378,299,374,299,368,298,366,295,366,292,365,289,365,287,364,284,364,282,365,278,363,276,361,264,355,261,355,259,354,256,354,254,353,251,352,249,351,246,351" />
  						<area shape="poly" title="Νομός Αχαίας" href="provinces/show/8" coords="165,360,166,362,170,364,172,366,176,368,178,370,180,371,180,374,178,378,179,380,181,382,187,385,188,387,190,388,193,388,195,387,196,385,198,384,201,378,204,378,206,379,207,381,207,384,209,388,209,391,212,391,214,392,217,392,219,393,228,393,230,389,233,389,234,387,234,378,236,377,237,375,241,373,243,369,243,351,242,349,240,348,237,348,231,345,228,345,220,341,217,341,213,339,204,339,202,340,201,342,185,350,182,350,180,351,177,351,169,355,168,357,166,358,165,360" />
  						<area shape="poly" title="Νομός Λασιθίου" href="provinces/show/41" coords="485,612,480,622,478,623,477,625,473,627,472,629,470,630,469,632,469,635,468,637,468,640,472,642,473,644,475,645,477,649,479,650,481,654,483,655,484,657,488,659,489,661,487,665,488,667,494,670,497,670,499,671,505,671,509,669,515,667,519,665,521,663,523,662,525,660,527,659,528,657,530,656,533,654,535,650,536,647,537,645,537,627,538,624,538,621,537,618,537,615,535,613,532,611,528,610,525,609,495,609,493,610,490,610,487,611,485,612" />
  						<area shape="poly" title="Νομός Ηρακλείου" href="provinces/show/28" coords="438,603,435,609,433,611,429,619,429,625,431,626,433,630,432,632,430,633,421,633,420,635,420,638,416,646,416,649,414,650,412,654,412,660,414,661,415,663,417,664,420,665,422,666,428,666,431,667,434,667,440,669,452,669,460,665,466,665,468,664,471,664,475,662,477,660,479,659,481,655,481,652,479,648,477,647,476,645,472,643,468,635,472,633,474,629,476,628,476,625,479,619,479,613,474,603,472,602,471,600,469,599,451,599,447,601,444,601,438,604" />
  						<area shape="poly" title="Νομός Ρεθύμνης" href="provinces/show/50" coords="393,605,392,607,392,610,391,612,391,615,389,619,387,620,386,622,386,631,387,633,387,636,388,638,388,644,392,652,396,654,397,656,405,660,408,660,410,659,414,651,414,648,415,646,417,645,423,633,426,634,428,635,431,635,433,634,433,631,431,630,429,626,429,617,432,611,432,605,431,603,427,601,425,599,422,598,420,597,417,597,415,596,412,596,409,595,403,595,399,597,398,599,396,600,396,603,395,605,393,606,392,608" />
  						<area shape="poly" title="Νομός Χανίων" href="provinces/show/24" coords="328,590,327,592,327,610,325,611,324,613,324,616,323,618,323,627,325,631,327,632,329,634,343,641,346,641,348,642,355,680,384,677,388,659,385,649,384,644,386,643,381,641,385,639,388,633,388,618,389,616,389,601,387,597,385,596,383,593,381,591,380,589,378,587,377,585,374,583,372,581,368,579,366,577,364,576,352,576,349,577,346,577,344,578,341,578,337,580,335,582,331,584,330,586,328,587,328,593" />
  						<area shape="poly" title="Νομός Δωδεκανήσου" href="provinces/show/14" coords="566,442,562,446,560,447,559,449,557,450,555,454,553,455,550,461,548,462,547,464,543,462,540,462,538,466,536,467,536,470,532,478,532,481,530,485,530,488,528,489,527,491,523,493,521,495,520,497,518,498,515,504,515,510,519,518,521,519,524,525,524,534,521,540,520,543,519,545,517,547,517,550,516,552,516,561,524,577,526,578,527,580,531,582,534,585,536,586,540,589,546,595,550,598,552,600,554,603,555,606,555,609,556,611,557,614,559,618,561,620,563,623,565,624,570,628,573,630,581,634,590,634,592,633,595,631,596,629,600,627,606,621,607,619,611,615,612,612,616,608,618,605,620,603,621,601,623,599,625,598,629,595,631,594,634,592,636,591,638,588,644,584,646,581,647,579,649,577,653,574,657,572,660,569,663,567,664,565,666,562,667,559,670,553,772,554,772,544,762,542,743,536,724,518,696,519,689,514,691,509,682,511,673,512,671,511,668,510,664,508,658,508,656,509,650,509,649,507,647,506,647,503,646,501,646,495,644,493,642,492,639,492,635,494,633,498,631,500,627,502,624,502,622,501,619,501,613,498,611,496,609,495,608,493,606,492,605,490,605,487,607,483,609,482,611,478,611,475,603,471,600,471,598,469,595,463,593,462,591,459,586,454,583,448,571,442,568,443" />
  						<area shape="poly" title="Νομός Κυκλάδων" href="provinces/show/38" coords="411,370,406,380,404,381,402,385,394,389,393,391,389,393,387,397,385,398,384,400,382,401,379,407,379,413,378,415,377,418,377,427,378,429,378,435,377,437,375,438,374,440,370,442,368,444,367,446,365,447,361,451,355,463,355,469,352,475,350,476,350,485,351,487,353,489,354,491,360,497,362,498,364,500,366,501,368,503,370,504,372,506,376,508,377,510,379,511,381,513,383,514,387,518,389,519,392,522,395,524,398,527,400,528,404,531,406,532,410,533,415,536,421,539,424,540,426,541,429,542,431,543,435,543,439,544,442,545,457,545,459,544,465,544,468,545,480,545,483,544,489,541,492,540,495,540,497,539,500,539,502,538,505,538,509,536,511,534,512,532,514,530,514,527,515,525,515,521,514,519,514,516,512,512,511,509,509,505,508,502,508,496,510,492,514,488,516,487,518,485,520,484,523,483,525,482,526,480,528,479,529,476,529,469,528,466,526,464,524,461,523,459,509,445,506,444,504,442,500,439,499,437,497,436,496,434,494,432,493,430,491,428,490,426,488,423,486,421,485,419,483,417,480,413,476,409,471,403,470,401,468,399,467,397,463,393,462,391,452,381,450,380,447,377,444,375,442,374,441,372,431,367,428,366,418,366,415,367,411,369,410,371" />
  						<area shape="poly" title="Νομός Σάμου" href="provinces/show/52" coords="514,396,512,397,511,399,509,400,506,406,506,415,507,417,507,420,510,426,512,428,514,429,516,432,518,433,521,434,523,435,526,436,529,436,531,437,534,437,537,438,564,438,567,437,571,435,572,433,574,432,577,426,577,411,581,403,587,400,588,398,590,397,590,391,589,389,579,384,576,384,574,383,550,383,547,384,541,384,538,385,529,385,523,388,522,390,518,392,516,396,512,398" />
  						<area shape="poly" title="Νομός Αττικής" href="pages/athina" coords="306,360,305,362,297,366,297,375,302,385,304,386,307,392,307,398,304,404,304,407,302,411,302,414,303,416,305,418,309,420,312,420,314,421,315,423,321,426,322,428,324,429,321,435,319,436,318,438,314,440,311,446,311,455,312,457,312,460,313,462,313,480,314,482,314,497,312,501,312,504,307,514,307,517,306,519,306,525,302,527,299,527,297,526,294,525,290,523,289,521,283,521,281,520,280,522,278,523,275,529,275,541,280,551,282,552,283,554,285,555,291,557,311,590,328,572,303,551,307,549,308,547,310,546,311,544,315,542,317,538,319,537,323,529,323,526,326,520,326,517,330,509,330,506,331,504,331,498,336,488,336,485,342,473,344,471,346,467,348,465,350,461,352,460,352,457,355,451,356,448,359,442,359,439,364,429,365,426,366,423,371,413,373,412,378,402,378,399,375,393,374,390,372,386,368,382,367,380,365,379,363,375,363,372,362,370,362,367,363,365,363,362,367,354,365,350,359,347,356,347,342,340,340,341,332,357,332,360,331,362,329,363,323,363,321,361,320,359,318,358,316,356,314,355,311,355,310,357,308,358,307,360,299,364,298,366" />
  						<area shape="poly" title="Νομός Χίου" href="provinces/show/25" coords="466,309,466,312,467,315,467,318,468,320,470,321,472,325,475,328,486,350,490,352,492,354,496,356,499,356,501,357,504,358,510,358,512,357,514,355,516,354,519,348,521,347,525,339,525,330,527,329,528,327,532,325,533,323,529,321,528,319,525,318,519,315,516,315,514,313,511,313,509,312,506,311,500,311,498,310,468,310,466,309" />
  						<area shape="poly" title="Νομός Λέσβου" href="provinces/show/42" coords="433,178,433,181,432,184,432,187,427,197,426,200,425,202,424,205,423,207,423,225,424,227,425,230,428,236,430,237,432,239,438,242,444,244,446,245,449,246,451,247,457,249,459,251,462,252,465,254,467,256,477,261,480,263,482,264,484,266,488,268,490,270,492,271,494,273,502,277,508,279,511,279,514,280,517,280,520,281,526,281,532,284,535,285,537,286,540,286,542,287,545,287,553,283,557,275,557,269,556,267,554,265,553,263,551,261,550,259,548,257,547,254,546,252,545,249,545,243,544,241,538,238,526,238,524,239,521,239,519,240,507,240,504,239,502,238,490,226,489,224,484,219,482,216,481,214,480,211,480,193,478,191,477,189,475,187,470,177,468,175,466,174,463,173,457,173,451,176,448,176,442,179,439,179,437,180,434,180,432,179" />
  						<area shape="poly" title="Νομός Εύβοιας" href="provinces/show/17" coords="295,283,294,285,292,286,289,286,287,287,286,289,282,291,279,291,279,294,280,296,283,296,287,294,290,294,292,293,302,298,303,300,307,302,309,304,311,305,312,307,314,309,316,310,317,312,320,312,322,314,324,315,325,317,329,319,330,321,332,322,333,324,335,325,341,337,345,339,351,339,354,340,360,343,361,345,363,346,365,350,367,351,369,355,371,356,371,359,380,377,382,378,383,380,387,382,396,382,400,380,401,378,403,377,407,369,409,368,410,366,410,345,411,343,411,340,412,338,412,323,413,321,413,318,414,316,415,310,415,307,416,305,416,299,417,297,417,288,415,284,415,281,411,279,410,277,408,276,399,276,397,277,394,277,392,278,386,278,383,279,377,279,375,280,351,280,348,279,345,279,343,278,337,278,335,277,332,277,330,276,327,276,325,275,322,275,320,274,317,274,315,273,306,273,300,276,299,278,287,284,286,286,284,287,281,287,275,290,276,292,282,295,288,295" />
  						<area shape="poly" title="Νομός Βοιωτίας" href="provinces/show/10" coords="256,326,256,332,259,338,261,339,264,339,266,338,268,340,271,346,273,347,275,351,284,351,287,352,291,354,294,354,296,355,299,355,305,358,306,360,308,359,310,355,314,353,315,355,319,357,321,359,323,360,325,362,327,363,333,363,333,360,336,354,336,348,338,344,340,343,341,341,339,337,337,336,334,330,334,327,330,325,327,325,325,324,322,324,316,321,315,323,315,326,316,328,310,328,308,327,296,327,290,324,287,324,284,323,278,320,270,324,267,324,265,325,262,325,256,322,254,326" />
  						<area shape="poly" title="Νομός Φωκίδας" href="provinces/show/21" coords="216,313,214,317,214,320,212,321,210,325,211,327,210,329,204,332,204,335,205,337,207,338,210,338,212,337,213,335,216,335,226,340,229,341,238,341,240,340,241,338,245,336,247,332,249,333,251,337,253,338,254,340,256,342,260,344,262,343,262,340,261,338,259,337,255,329,255,320,256,318,254,314,250,312,249,310,243,307,242,305,238,303,232,306,229,306,227,307,224,307,220,305,218,306,216,310,214,311,214,314,215,316,215,319,213,323" />
  						<area shape="poly" title="Νομός Μαγνησίας" href="provinces/show/44" coords="258,258,257,260,255,261,251,269,252,271,254,272,256,274,259,275,261,276,264,276,278,283,281,283,285,285,288,285,290,284,291,282,293,281,294,279,302,275,303,273,311,269,317,271,320,271,324,273,327,273,329,274,332,274,334,275,337,275,339,276,366,276,370,274,372,272,375,271,377,270,378,268,382,266,383,264,387,262,392,252,392,243,386,231,384,230,383,228,381,227,372,227,370,228,367,228,353,235,350,235,330,245,327,245,325,246,322,246,320,247,311,247,303,243,300,237,298,236,297,234,295,233,293,229,289,227,288,225,285,225,283,226,282,228,280,229,279,231,275,233,273,237,276,243,276,246,275,248,269,248,268,246,266,245,264,246,263,248,263,251,262,253,258,255,256,259,256,262,255,264,253,265,253,268,252,270" />
  						<area shape="poly" title="Νομός Φθιώτιδας" href="provinces/show/22" coords="213,277,207,280,205,284,207,288,207,291,209,292,211,296,211,299,212,301,211,303,209,304,208,306,210,307,212,306,213,304,215,303,218,303,220,304,223,304,225,305,227,307,230,307,236,304,239,304,243,306,244,308,252,312,254,316,256,318,256,321,257,323,259,324,271,324,275,322,276,320,278,319,280,320,281,322,283,323,286,323,292,326,295,326,297,327,300,327,302,326,308,326,312,328,315,328,316,326,313,320,313,317,314,315,316,314,315,312,309,312,307,311,306,309,304,308,304,311,301,311,299,312,296,311,294,307,294,304,293,302,290,301,287,301,279,297,276,297,274,298,270,296,270,293,266,291,262,293,259,293,257,292,256,290,260,288,263,288,269,291,275,291,276,289,278,288,281,288,283,287,284,285,280,283,277,283,275,282,273,280,265,276,262,276,260,275,257,275,251,272,250,270,248,268,247,266,243,264,241,262,240,260,236,258,232,266,232,269,231,271,225,274,222,274,216,277,213,277,209,279,207,283,207,286,208,288" />
  						<area shape="poly" title="Νομός Ζακύνθου" href="provinces/show/58" coords="115,376,114,378,113,381,113,387,120,401,122,402,123,404,125,406,129,408,130,410,136,413,139,413,141,414,144,414,148,412,150,408,150,405,148,401,148,398,147,396,147,393,146,391,144,390,142,386,136,383,135,381,131,379,129,377,125,375,119,375,117,376,114,376" />
  						<area shape="poly" title="Νομός Λευκάδας" href="provinces/show/43" coords="114,289,111,295,111,298,109,302,109,305,108,307,113,317,117,319,118,321,120,322,123,322,125,323,126,321,128,320,131,320,133,319,135,315,135,312,134,310,134,307,133,305,129,303,128,301,126,300,126,291,125,289,123,288,117,288,113,290" />
  						<area shape="poly" title="Νομός Κεφαλληνίας" href="provinces/show/33" coords="106,325,104,327,103,329,101,330,100,332,96,334,95,336,93,337,90,343,90,346,89,348,90,351,92,355,94,356,99,366,101,368,109,372,112,373,115,373,118,374,130,374,132,373,133,371,135,370,137,368,138,366,138,363,137,361,137,349,139,345,139,342,137,338,135,337,134,335,132,333,131,331,129,330,128,328,126,326,125,324,119,321,107,321,105,322,102,328" />
  						<area shape="poly" title="Νομός Αιτωλοακαρνανίας" href="provinces/show/2" coords="153,275,157,273,159,269,161,268,163,266,165,265,168,265,170,266,171,268,173,269,174,271,174,280,175,282,177,283,178,285,180,286,181,288,183,290,185,294,183,298,185,302,187,303,188,305,194,308,197,308,199,309,202,309,216,302,218,303,219,305,219,308,217,309,215,313,215,316,214,318,214,321,213,323,213,326,212,328,210,329,207,329,202,339,198,341,186,341,185,343,182,343,181,341,177,339,176,337,172,335,171,333,169,332,169,332,169,335,168,337,165,337,163,341,157,344,151,341,151,338,150,336,151,334,153,333,154,331,152,327,152,324,150,320,149,322,147,323,145,319,145,316,144,313,142,309,140,308,136,300,134,298,132,299,129,299,126,298,125,296,125,293,127,292,129,288,127,284,133,284,135,285,139,283,145,286,147,288,149,289,152,289,154,288,156,289,155,286,157,282,157,279,153,271,159,268" />
  						<area shape="poly" title="Νομός Άρτας" href="provinces/show/6" coords="142,251,141,253,139,254,138,256,136,257,134,261,134,267,132,271,132,274,136,276,137,278,139,279,140,277,143,277,145,278,151,275,154,269,156,268,159,268,167,264,170,264,171,262,171,259,172,257,174,256,175,254,172,248,160,242,160,239,159,237,159,231,158,229,155,229,154,231,150,233,149,235,147,236,146,238,142,240,141,242,139,243,141,244,145,242,147,243,147,246,146,248,144,249,143,251,141,252,140,254" />
  						<area shape="poly" title="Νομός Καρδίτσας" href="provinces/show/31" coords="173,247,173,259,174,261,176,262,177,260,181,258,190,258,192,259,194,258,195,256,197,255,199,256,200,258,204,260,205,262,209,264,210,266,212,267,213,269,213,272,214,274,216,276,225,276,227,275,228,273,231,273,232,271,232,262,236,260,237,258,233,256,231,252,231,249,232,247,234,246,239,236,237,232,233,230,231,231,222,231,220,230,217,230,213,232,212,234,210,233,207,233,205,234,203,238,201,239,195,239,193,240,181,240,179,241,176,241,175,243,171,245,173,249" />
  						<area shape="poly" title="Νομός Ευρυτανίας" href="provinces/show/18" coords="171,267,173,271,175,272,173,276,173,279,174,281,176,283,178,284,179,286,181,287,182,289,184,290,185,292,187,293,186,295,184,296,183,298,183,301,187,303,189,305,195,308,204,308,206,307,207,305,211,303,212,301,212,298,210,294,208,293,207,291,206,288,206,285,207,283,207,280,209,279,212,273,212,270,210,269,208,265,204,263,203,261,197,258,196,256,194,257,193,259,191,260,188,259,186,258,180,258,178,259,177,261,175,262,172,262,170,263,170,266,172,270" />
  						<area shape="poly" title="Νομός Τρικάλων" href="provinces/show/55" coords="159,231,160,233,160,239,163,245,165,246,171,246,173,245,173,242,175,241,178,241,181,240,184,240,186,239,195,239,197,238,200,238,202,239,204,238,205,236,207,235,208,233,210,232,214,234,216,230,218,229,224,229,226,230,229,230,231,231,233,230,234,228,230,220,228,218,224,216,222,212,214,208,211,202,209,201,200,201,196,199,193,199,191,198,188,198,186,199,183,199,181,200,172,200,166,203,164,207,164,210,163,212,161,213,158,213,157,215,158,217,160,218,161,221,162,223,162,226,160,227,159,229,159,232" />
  						<area shape="poly" title="Νομός Λαρίσης" href="provinces/show/40" coords="213,206,215,208,219,210,221,214,223,215,224,217,228,219,229,221,233,223,233,229,234,231,236,232,239,233,240,235,240,238,238,239,233,249,233,255,239,258,240,260,246,263,247,265,249,266,250,268,252,269,256,267,256,264,257,262,257,259,260,253,263,253,264,251,264,248,263,245,264,243,267,243,271,247,274,247,275,245,272,239,272,236,273,234,277,232,278,230,284,227,286,223,284,219,284,216,283,214,283,211,278,201,276,200,270,194,269,192,267,191,266,189,265,191,263,192,254,192,252,191,251,189,249,187,247,186,246,184,244,183,243,181,243,175,242,173,233,173,225,177,223,181,221,182,220,184,218,185,217,187,215,188,213,192,213,195,212,197,212,200,217,210" />
  						<area shape="poly" title="Νομός Πιερίας" href="provinces/show/48" coords="231,174,235,172,241,172,243,173,244,175,244,178,245,180,245,183,246,185,254,189,255,191,258,191,260,192,263,192,265,191,266,189,266,186,262,184,260,180,260,171,261,169,261,160,265,152,265,149,262,143,263,141,265,140,262,140,260,141,257,141,253,143,250,143,246,145,245,147,243,148,240,154,238,155,237,157,233,159,229,167,229,173" />
  						<area shape="poly" title="Νομός Γρεβενών" href="provinces/show/23" coords="149,175,149,178,150,180,150,183,153,189,159,192,160,194,162,195,163,197,171,201,175,199,184,199,186,198,192,198,194,199,197,200,199,201,211,201,212,199,212,196,211,193,209,192,208,190,206,188,204,184,204,178,203,175,202,173,196,170,190,168,188,167,185,166,179,166,171,170,165,167,164,169,158,172,149,172,149,175,150,177,150,180" />
  						<area shape="poly" title="Νομός Κοζάνης" href="provinces/show/37" coords="163,168,166,168,167,166,169,168,171,169,174,169,175,167,181,164,184,164,190,167,193,167,194,169,198,171,200,173,202,174,207,184,207,187,208,189,210,190,213,190,217,188,222,178,224,177,225,175,227,174,234,160,233,158,231,157,229,155,227,151,225,149,223,145,219,143,216,143,214,142,213,140,213,137,214,135,214,123,213,121,211,120,208,120,206,121,202,129,186,137,184,141,184,144,183,146,174,146,172,147,169,147,167,148,166,150,158,154,153,164,153,170,154,172,158,170,161,170,163,169,165,165" />
  						<area shape="poly" title="Νομός Πρεβέζης" href="provinces/show/49" coords="107,254,115,250,118,250,122,248,125,248,127,247,133,247,135,246,138,246,140,245,143,245,144,243,146,242,147,244,146,246,144,247,142,251,138,253,135,259,135,262,134,264,134,267,128,279,128,285,126,286,124,285,124,282,125,280,124,277,119,267,113,264,112,262,110,261,108,259,106,255,107,253,109,252" />
  						<area shape="poly" title="Νομός Κέρκυρας" href="provinces/show/34" coords="24,197,24,203,26,204,27,206,29,207,31,211,33,212,39,218,40,220,42,221,43,223,45,224,46,226,48,227,50,229,52,233,54,234,55,236,58,239,60,243,62,244,63,246,65,247,66,249,68,250,69,252,71,253,73,255,74,257,76,258,78,262,80,263,82,267,84,268,85,270,93,274,97,272,97,266,92,256,90,254,88,250,88,247,86,243,86,237,85,235,83,234,81,230,79,229,77,225,75,224,72,218,70,217,68,213,68,210,70,206,69,203,68,201,58,196,55,195,53,194,50,193,48,192,45,191,36,191,26,196,25,198,23,199" />
  						<area shape="poly" title="Νομός Θεσπρωτίας" href="provinces/show/54" coords="100,205,98,206,95,206,93,205,93,208,94,210,94,213,92,214,91,216,88,216,84,218,83,220,84,222,84,225,86,229,84,230,85,232,89,234,90,236,90,242,92,243,95,249,97,250,98,252,100,253,106,253,112,250,115,250,117,249,123,249,124,247,124,241,122,237,122,234,121,231,119,230,118,228,112,225,111,222,110,220,110,211,111,209,109,205,103,202,101,203,100,205" />
  						<area shape="poly" title="Νομός Ιωαννίνων" href="provinces/show/29" coords="99,187,97,188,95,192,98,198,100,199,101,201,103,202,105,204,107,205,108,207,110,208,112,212,112,224,116,226,118,230,120,231,121,233,121,236,122,238,122,241,124,243,126,247,135,247,137,246,138,244,142,242,143,240,149,237,151,233,155,231,156,229,160,227,161,225,156,215,157,213,160,213,162,212,163,210,165,209,165,206,168,200,167,198,159,194,157,192,153,190,152,188,150,187,148,183,148,168,147,165,146,163,146,160,144,159,143,157,133,152,130,152,128,153,123,163,123,166,124,168,124,171,121,177,117,179,108,179,106,180,103,180,102,182,96,185,96,191" />
  						<area shape="poly" title="Νομός Καστοριάς" href="provinces/show/32" coords="149,129,149,132,146,138,144,139,143,141,139,143,136,143,132,145,130,149,130,152,132,153,138,153,142,155,143,157,145,158,148,164,148,167,150,171,153,171,154,169,154,160,155,158,155,155,159,153,160,151,170,146,173,146,175,147,178,147,184,144,185,142,185,136,184,134,182,133,178,125,178,122,176,121,173,121,171,117,168,117,166,118,165,120,163,121,162,123,158,125,157,127,154,127,152,126,148,128,147,130" />
  						<area shape="poly" title="Νομός Φλώρινας" href="provinces/show/20" coords="144,107,144,110,146,114,146,120,148,124,154,127,156,126,159,126,160,124,166,121,166,118,167,116,169,115,171,116,171,119,177,119,180,125,180,128,182,129,185,135,191,135,194,129,200,129,202,128,203,126,205,125,208,119,207,117,205,115,203,111,204,109,206,108,206,99,205,97,191,104,188,104,182,101,176,101,168,105,162,105,158,103,152,103,146,106,145,108,147,112,145,113" />
  						<area shape="poly" title="Νομός Ημαθίας" href="provinces/show/27" coords="214,125,214,134,213,136,213,139,214,141,218,143,221,143,223,144,225,146,230,156,234,158,238,156,239,154,241,153,245,145,247,144,248,142,252,140,261,140,265,138,266,136,266,133,264,129,262,128,258,124,256,120,253,120,251,121,245,121,243,120,231,120,221,125,218,125,216,126,213,126,214,124" />
  						<area shape="poly" title="Νομός Πέλλας" href="provinces/show/47" coords="205,95,205,98,206,100,206,115,207,117,210,117,212,118,214,122,218,124,221,124,225,122,228,122,230,121,251,121,257,118,258,116,260,115,263,109,263,106,253,101,250,95,248,94,245,88,245,85,247,84,247,81,246,79,244,78,241,78,239,79,232,79,230,78,221,78,219,82,217,84,216,86,214,87,213,89,211,90,208,90,206,91" />
  						<area shape="poly" title="Νομός Κιλκίς" href="provinces/show/35" coords="250,81,247,87,245,88,245,91,244,93,244,96,245,98,251,101,254,102,264,107,267,107,269,108,275,108,283,104,286,104,298,98,301,98,302,96,304,95,306,91,305,89,303,88,302,86,300,85,298,83,297,81,291,78,289,76,287,75,285,71,285,68,284,66,284,63,280,61,278,62,277,64,275,65,272,71,272,74,270,76,268,77,267,79,254,79,252,80,251,82" />
  						<area shape="poly" title="Νομός Χαλκιδικής" href="provinces/show/56" coords="302,162,302,165,305,171,307,172,315,188,317,189,318,191,322,193,323,195,325,196,328,196,329,198,333,200,336,201,340,203,346,203,348,204,360,204,362,203,363,201,365,200,372,186,372,183,374,179,374,176,373,173,371,169,369,168,368,166,364,164,363,162,361,161,360,159,358,158,358,152,359,150,359,144,356,138,359,132,351,128,350,126,346,124,334,130,333,132,325,136,324,138,312,144,311,146,307,148,306,150,304,151,303,153,301,154,301,157,302,159" />
  						<area shape="poly" title="Νομός Θεσσαλονίκης" href="pages/thessaloniki" coords="266,110,263,116,261,117,259,121,259,124,260,127,262,131,270,135,279,135,285,132,287,128,289,129,289,132,287,133,285,137,283,138,282,140,282,143,283,145,285,146,286,148,290,152,291,154,293,155,299,155,301,154,303,150,305,149,305,146,307,142,325,133,328,133,336,129,337,127,343,124,345,120,344,118,330,111,329,109,327,108,326,106,318,102,316,100,314,99,308,93,306,92,305,94,303,95,299,103,297,104,294,104,292,105,274,105,268,108,267,110,265,111,265,114" />
  						<area shape="poly" title="Νομός Σερρών" href="provinces/show/53" coords="280,63,282,64,283,66,287,68,288,70,290,71,291,73,293,75,295,79,297,80,298,82,300,84,306,87,307,89,311,91,312,93,314,95,316,99,320,101,321,103,323,104,324,106,330,109,333,109,343,114,346,115,352,115,358,112,361,112,362,110,364,109,367,103,369,102,372,96,372,93,370,92,368,90,358,85,357,83,355,82,353,80,345,64,343,62,342,60,338,56,336,55,315,55,301,62,298,62,296,63,284,63" />
  						<area shape="poly" title="Νομός Δράμας" href="provinces/show/15" coords="338,56,338,59,339,61,341,63,343,64,345,66,346,68,346,71,348,75,350,77,354,79,355,81,357,82,358,84,360,85,361,87,365,89,367,91,369,92,370,94,372,95,375,95,379,93,380,91,384,89,385,87,387,86,388,84,390,83,391,81,399,77,400,75,402,74,407,64,409,63,412,63,418,60,420,56,418,55,415,55,411,53,410,51,408,50,404,42,404,39,398,39,394,41,391,41,389,42,383,42,381,41,378,41,376,45,373,45,371,44,369,45,368,47,368,50,362,50,360,51,357,51,351,54,342,54,338,56" />
  						<area shape="poly" title="Νομός Καβάλας" href="provinces/show/30" coords="382,90,382,93,380,94,377,94,371,97,370,99,368,100,366,104,364,105,363,107,361,108,361,114,363,118,365,119,366,121,370,123,372,125,386,132,389,133,392,133,396,135,399,135,401,136,419,136,427,132,430,132,431,130,431,124,428,118,426,117,419,103,419,88,415,80,413,78,412,76,405,76,402,77,399,77,395,79,394,81,390,83,389,85,387,86,386,88,384,89,383,91,377,94" />
  						<area shape="poly" title="Νομός Ξάνθης" href="provinces/show/57" coords="421,57,417,59,416,61,414,62,411,62,403,66,401,70,401,73,405,75,408,76,412,78,416,86,418,88,419,90,420,93,420,102,421,104,423,105,432,105,438,102,439,100,443,98,444,96,446,95,446,89,442,81,442,75,443,73,447,71,448,69,454,66,454,63,453,61,437,53,434,53,432,52,429,52,423,55,422,57,420,58" />
  						<area shape="poly" title="Νομός Ροδόπης" href="provinces/show/51" coords="453,67,451,68,450,70,444,73,443,75,441,76,441,85,442,87,444,88,446,92,446,95,448,99,452,103,458,106,470,106,484,99,485,97,491,94,492,92,498,89,499,87,503,85,503,79,501,75,501,66,502,64,504,63,502,62,498,64,492,64,490,65,487,65,485,66,470,66,468,67,465,67,461,69,452,69" />
  						<area shape="poly" title="Νομός Έβρου" href="provinces/show/19" coords="483,102,487,100,488,98,492,96,493,94,501,90,502,88,504,87,504,84,503,82,501,80,500,78,500,69,502,65,504,64,505,62,507,61,510,61,518,57,523,47,523,41,521,39,520,37,520,34,519,32,519,26,523,24,529,24,535,27,536,29,542,32,544,34,546,35,549,41,549,44,553,52,553,55,554,57,554,63,552,64,551,66,548,66,540,70,539,72,537,73,535,77,535,80,534,82,534,88,533,90,533,93,531,97,529,98,527,102,525,103,522,109,520,110,519,112,519,115,513,127,513,130,511,131,509,135,507,136,506,138,504,139,500,147,498,148,496,152,494,153,493,155,485,159,482,159,480,160,476,158,473,157,469,155,468,153,466,152,465,150,463,148,458,138,458,129,464,117,466,116,468,112,470,111,471,109,475,107,476,105,484,101" />
					</map>
					<img src="images/Greece_prefectures_map.png" width="800" height="700" usemap="#greece" style="border:0" />
					<?php 
						if (file_exists("news/news.alx"))
						{
							$fp = fopen("news/news.alx", "r");
							$alxData = fread($fp, 3096);
							echo "<p class=\"epsilon\"><br />Τελευταίες αναρτήσεις του <a target=\"_blank\" href=\"http://metathesi.gr/blog\">Ιστολογίου " . 
									$html->image('external_link.gif', array('class'=>'external')) . "</a>:<br />";
							echo "$alxData</p>";
						}
					?>
				</div>
			</div>
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
