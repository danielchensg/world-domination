<?php

/*
APPLICATION
Allow anyone in Grab to ask about a product in Slack and return the name of a PM whom they can contact.
*/


# Grab some of the values from the slash command, create vars for post back to Slack
$command = $_POST['command'];
$text = $_POST['text'];
$token = $_POST['token'];
$text_new = null;

# Check the token and make sure the request is from our team 
if($token != '2tDjTmti8XWukvPd7K6OX13C'){ #replace this with the token from your slash command configuration page
  $msg = "The token for the slash command doesn't match. Check your script.";
  die($msg);
  echo $msg;
}


if (stripos($text, "gamma") !== false)
{$reply = ("*Question:* ".$text."\n*Answer:* You might want to ping Daniel. Just not over email."."\n```PM: Daniel Chen\nSpecialty: Gamma & Control Centre```");}

elseif (stripos($text_new = str_replace(' ', '', $text), "paxapp") !== false)
{$reply = ("*Question:* ".$text."\n*Answer:* It's all the hype these days, and Mike Tee is your man."."\n```PM: Mike Tee\nSpecialty: Passenger App```");}

elseif (stripos($text_new = str_replace(' ', '', $text), "driverapp") !== false)
{$reply = ("*Question:* ".$text."\n*Answer:* Have you not seen him in the news? Drive your way to Suren."."\n```PM: Suren Anwar\nSpecialty: Driver App```");}
	
elseif (stripos($text_new = str_replace(' ', '', $text), "grabpay") !== false || stripos($text_new = str_replace(' ', '', $text), "payments") !== false)
{$reply = ("*Question:* ".$text."\n*Answer:* Money money money. Nothing slips past Tom Waechter"."\n```PM: Tom Waechter\nSpecialty: Payments```");}

else
{$reply = "*Question:* ".$text."\n*Answer:* We don't have a PM for this yet. Wanna volunteer? <product.managers@grabtaxi.com>";}


# Send the reply back to the user. 
echo $reply;
