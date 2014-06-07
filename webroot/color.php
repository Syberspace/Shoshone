<?php
function convert($n)
{
	switch($n)
	{
		case 10: $n = 'a';
		break;
		case 11: $n = 'b';
		break;
		case 12: $n = 'c';
		break;
		case 13: $n = 'd';
		break;
		case 14: $n = 'e';
		break;
		case 15: $n = 'f';
		break;
		default: 
		break;
	}
	
	return $n;
}

$g1 = 1;
$g2 = 1;
$b1 = 1;
$b2 = 1;

echo "<body bgcolor='#000000'>";

	for($r1 = 0; $r1<=15; $r1++)
	{
		for($r2 = 0; $r2<=15; $r2++)
		{
			for($g1 = 0; $g1<=15; $g1++)
			{
				/*for($g2 = 0; $g2<=15; $g2++)
				{
					for($b1 = 0; $b1<=15; $b1++)
					{
						for($b2 = 0; $b2<=15; $b2++)
						{*/
							$y1 = convert($r1);
							$y2 = convert($r2);
							$x1 = convert($g1);
							$x2 = convert($g2);
							$c1 = convert($b1);
							$c2 = convert($b2);
							
							echo "<div style='background-color:#$y1$y2$x1$x2$c1$c2;width:1px;height:1px;'><!--#$y1$y2$x1$x2$c1$c2-->&nbsp;</div>\n";
						/*}
						#echo "<div style='float:left; color:#fffff;'>lol</div>";
					}
				}*/
			}
		}
	}
	
echo "</div>";


?>
