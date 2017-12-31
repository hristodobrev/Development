$url = 'http://e.notify.live.net/u/1/db5/H2QAAAAvIQsFzUCKaiPc-ytnreqDgMfusUqZwYNXD-cwZOto73MLTgrdqYB4wrE7YlK3dn_ie6C1UubcUed2scpQgXPiMP0Q7Pag64iWaRssF00zLDN1nQ_LVd2BJnBjAbex5EI/d2luZG93c3Bob25lZGVmYXVsdA/sSQ0755mNkOB81qTJowdkw/t26sZT8CFLkplcjCx8rxHtor27I';

$data = "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
                "<wp:Notification xmlns:wp=\"WPNotification\">" .
                   "<wp:Toast>" .
                        "<wp:Text1>Test</wp:Text1>" .
                        "<wp:Text2>Mest</wp:Text2>" .
                        "<wp:Param>/Page2.xaml?NavigatedFrom=Toast Notification</wp:Param>" .
                   "</wp:Toast> " .
                "</wp:Notification>";

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: text/xml\r\n",
        'method'  => 'POST',
        'content' => $data
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);