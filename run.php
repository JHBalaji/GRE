<?php
$cookievalue='JSESSIONID=<paste_value_here>; ActiveID=<paste_value_here>; sck=<paste_value_here>'; 

// Read the readME


function remotefileSize($url) {
	global $cookievalue;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36');
  curl_setopt($ch, CURLOPT_REFERER, "https://ereg.ets.org/ereg/public/workflowmanager/workflow?workflowItemId=tcAvailability");
  curl_setopt($ch, CURLOPT_COOKIE, $cookievalue);

	curl_exec($ch);
	$filesize = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
	curl_close($ch);
	if ($filesize) return $filesize;
}



$url='<paste_URL_here>';
// something like https://ereg.ets.org/ereg/public/testcenter/availability/seats?testId=30&testName=GRE+General+Test&location=Bangalore%2C+Karnataka%2C+India&latitude=12.9715987&longitude=77.59456269999998&testStartDate=February-02-2017&testEndDate=March-31-2017&currentTestCenterCount=0&sourceTestCenterCount=0&adminCode=&rescheduleFlow=false&isWorkflow=true&oldTestId=30&oldTestTime=&oldTestCenterId=&isUserLoggedIn=true&oldTestTitle=&oldTestCenter=&oldTestType=&oldTestDate=&oldTestTimeInfo=&peviewTestSummaryURL=%2Fresch%2Ftestpreview%2Fpreviewtestsummary&rescheduleURL=



    if (remotefileSize($url)>2000)
    {
  
  			date_default_timezone_set('Asia/Kolkata');
// IFTTT email loop for alerting cookie expiry and if it’s between sleep hours. A notification and email would be made instead of triggering an IFTTT action	
      if ( date('H') > 6 &&  date('H') < 22)
					{
						echo "yes";
						sendemail("Cookie expired #Action",'https://ereg.ets.org/ereg/public/workflowmanager/schlWorkflow?_p=GRI');
					}	
			
					else{

						echo "yes";
						sendemail("Cookie expired-SleepZone",'https://ereg.ets.org/ereg/public/workflowmanager/schlWorkflow?_p=GRI');
					}
    }


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36');
curl_setopt($ch, CURLOPT_REFERER, "https://ereg.ets.org/ereg/public/workflowmanager/workflow?workflowItemId=tcAvailability");
curl_setopt($ch, CURLOPT_COOKIE, $cookievalue);

$text = curl_exec($ch);

/* All posssible options for date.  Copy and use the month as displayed in ETS page  */
$searchtext='February 06';
$searchtext1='February 07';
$searchtext2='<your_date_here>';

mailer($text,$searchtext);
mailer($text,$searchtext1);
mailer($text,$searchtext2);





function mailer($testtext,$query) {
    $test = strpos($testtext,$query);
    if ($test==false)
    {
        echo "no";
    }
    else
    {
        echo "yes";
        sendemail($query.'#Action');
      
    }
}


function sendemail($subjecttxt,$txt = "https://mygre.ets.org/greweb/login/login.jsp") {
global $url;


$to = "youremail@domain.com,trigger@recipe.ifttt.com";

$headers = "From: your_email@gmail.com"; //  Make sure you set the right from email incase if you use IFTTT trigger
mail($to,$subjecttxt,$txt,$headers);
echo $txt;
}


?>
