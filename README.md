# GRE
The run.php is meant to alert you when there is slot available on your specified date in specified location. I have not considered test centre but you can add and (&) with the keyword to achieve this.
<br/><br/>
Get our cookies by visiting https://ereg.ets.org/ereg/public/workflowmanager/schlWorkflow?_p=GRI in chrome. 
<br/>
These cookies have a life-span of 24-48 hours. I am unsure about it though. <br/>
<br/>Set php cron for every 10 mins as ETS auto expires the cookies for every 20 minutes of inactivity.
<br/>
Goto 'Menu' and 'More Tools' and choose 'Developer Tools' or Ctrl+Shift+I
<br/>
Choose 'Application' tab and under 'Storage' double-click 'Cookies' 
<br/>
Pick 'https://ereg.ets.org' and copy all the values in your 'Name-Value' panel by selecting Ctrl+A and paste them in notepad
<br/>
Appropriate values and paste in the above variable
<br/>
Two loops are made in this program. One will alert for Cookie expiry and another is meant for notifying you on availability of your required date.
<br/>
I have clubbed with an IFTTT trigger. #Action was the trigger word I used to notify and wake up my phone through IFTTT app.
		
