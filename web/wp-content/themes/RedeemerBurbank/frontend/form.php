<?php

// https://github.com/sendgrid/sendgrid-php/blob/master/examples/helpers/mail/example.php

require_once __DIR__ . '/inc/vendor/autoload.php';
require("inc/sendgrid-php/sendgrid-php.php");

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

// Send Email
// --------------------------------------------------

$from = new SendGrid\Email("Garden City Church", "admin@gardencitysv.com");
$to = new SendGrid\Email(null, "admin@gardencitysv.com");
$subject = $obj['subject'];
$message = '';
$googleValues = [];

foreach($obj as $key => $item) {
	if ($key != 'type' && $key != 'subject') {
		if (isset($item['label']) && isset($item['value'])) {
			$message .= $item['label'] . ': ' . $item['value'] . "<br />";
		}
		$googleValues[] = isset($item['value']) ? $item['value'] : '';
	}
}

$mailBody = file_get_contents('inc/email-inline.html');
//$mailBody = str_replace('{{preview}}', $preview, $mailBody);
$mailBody = str_replace('{{content}}', $message, $mailBody);

$content = new SendGrid\Content("text/html", $mailBody);
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$to = new SendGrid\Email(null, "ryanbrill@gmail.com");
$mail->personalization[0]->addBcc($to);

$apiKey = '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';
$sg = new \SendGrid($apiKey);


$response = $sg->client->mail()->send()->post($mail);

/*echo $response->statusCode();
echo $response->headers();
echo $response->body();*/

// Add to Google Sheet
// --------------------------------------------------

// This Sheet MUST BE shared with service account email
if ($obj['type'] == 'serve') {
	$sheetId = '1Mjjatizj5nHHGb14VH6Jj7zgrUJ1-z7pbnqbSylJPyk';
} else if ($obj['type'] == 'membership') {
	$sheetId = '1NglOIievMnygCUk6OZpHh5ViIOfaBZaOlkUd16XzbXc';
} else {
	$sheetId = '1XV-88xjyL5zlTky2rW-JSNhSWjCTr4SpSA0U8EIGlDY';
}

define('SHEET_ID', $sheetId);
define('APPLICATION_NAME', 'Garden City Form');
define('CLIENT_SECRET_PATH', __DIR__ . '/inc/Garden City Website-684068d165c6.json');
define('ACCESS_TOKEN', '684068d165c6febf93fb6d97d683724db8e97d12');
define('SCOPES', implode(' ', [Google_Service_Sheets::SPREADSHEETS]));
 
// Create Google API Client
$client = new Google_Client();
$client->setApplicationName(APPLICATION_NAME);
$client->setScopes(SCOPES);
$client->setAuthConfig(CLIENT_SECRET_PATH);
$client->setAccessToken(ACCESS_TOKEN);
 
$service = new Google_Service_Sheets($client);
 
//$sheetInfo = $service->spreadsheets->get(SHEET_ID)->getProperties();
//print($sheetInfo['title']. PHP_EOL);

$options = array('valueInputOption' => 'RAW');
$values = [$googleValues];
$body   = new Google_Service_Sheets_ValueRange(['values' => $values]);
$result = $service->spreadsheets_values->append(SHEET_ID, 'A1:C1', $body, $options);

exit();