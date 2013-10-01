
<?php
$files = glob("../logcam/*.*");
for ($i=0; $i<count($files); $i++)
{
	$num = $files[$i];
	print $num."<br />";
	echo '<img src="'.$num.'" alt="random image" />'."<br /><br />";
}
?>
