<?php 
$text='<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  
  </head>
  <body>

  	<div>
    <h1>sss, world!</h1>
    </div>
  	<div>
    <h1>Hello, world!</h1>
    </div>


    <div>

    <span>Hello, world!</span>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>';

$searchFeild="Hello, world!";



function get_output($text,$searchFeild)
{


	$total_match=substr_count($text, $searchFeild); // get no of match

	
	// get all positions 
	$lastPos = 0;
	$positions = array();
	$output = array();

	while (($lastPos = strpos($text, $searchFeild, $lastPos))!== false) 
	{
	    $positions[] = $lastPos;
	    $lastPos = $lastPos + strlen($searchFeild);
	}

	//for($x=0;$x<=$total_match;$x++)

	foreach($positions as $pos)
	{
		/*if($total_match==1)
		{*/
			$temp_str=substr($text, 0, ($pos));

			$lastPos_2=0;
			$divPos=array();

			while (($lastPos_2 = strpos($temp_str, "<div" , $lastPos_2))!== false) 
				{
				    $divPos[] = $lastPos_2;
				    $lastPos_2 = $lastPos_2 + strlen("<div");
				}
			$div_start_pos=end($divPos);

			$temp_str2_start_pos=strlen($searchFeild)+$pos;
			//echo $temp_str2_start_pos;
			$text_len=strlen($text);
			$end_point=$text_len-$temp_str2_start_pos;
			$temp_str2=substr($text,$temp_str2_start_pos,$end_point);



			$lastPos_3=0;
			$divClose=array();

			while (($lastPos_3 = strpos($temp_str2, "</div>" , $lastPos_3))!== false) 
				{
				    $divClose[] = $lastPos_3;
				    $lastPos_3 = $lastPos_3 + strlen("</div>");
				}
			$div_end_pos=$divClose[0]+$temp_str2_start_pos+6;
			
			$div_length=$div_end_pos-$div_start_pos;
			

			$output[]=substr($text,$div_start_pos,$div_length);

			
		/*}else
		{

		}*/
	}

	return $output;



}
$out=get_output($text,$searchFeild);
print_r($out);

?>