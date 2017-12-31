<?php

require_once '../src/Google/autoload.php';
require_once '../src/Google/Client.php';
require_once '../src/Google/Service/YouTube.php';

$client = new Google_Client();
$client->setDeveloperKey('{YOUR-API-KEY}');
$youtube = new Google_Service_YouTube($client);

$nextPageToken = '';
$htmlBody = '<ul>';

do {
    $playlistItemsResponse = $youtube->playlistItems->listPlaylistItems('snippet', array(
        'playlistId' => '{https://www.youtube.com/playlist?list=PLDHLPz-B_LbiYwBiFvwMkIjwo4SMcknaTsrc/}',
        'maxResults' => 50,
        'pageToken' => $nextPageToken));

    foreach ($playlistItemsResponse['items'] as $playlistItem) {
        $htmlBody .= sprintf('<li>%s (%s)</li>', $playlistItem['snippet']['title'], $playlistItem['snippet']['resourceId']['videoId']);
    }

    $nextPageToken = $playlistItemsResponse['nextPageToken'];
} while ($nextPageToken <> '');

$htmlBody .= '</ul>';
?>

<!doctype html>
<html>
<head>
    <title>Video list</title>
</head>
<body>
<?= $htmlBody ?>
</body>
</html>