<?php
class InvalidSongException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}

class InvalidArtistNameException extends InvalidSongException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}

class InvalidSongNameException extends InvalidSongException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}

class InvalidSongLengthException extends InvalidSongException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}

class InvalidSongMinutesException extends InvalidSongLengthException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}

class InvalidSongSecondsException extends InvalidSongLengthException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}

class Song
{
    private $name;
    private $artist;
    private $minutes;
    private $seconds;

    public function __construct($artist, $name, $minutes, $seconds)
    {
        $this->setArtist($artist);
        $this->setName($name);
        $this->setMinutes($minutes);
        $this->setSeconds($seconds);
    }

    public function setArtist($artist)
    {
        if (strlen($artist) < 3 || strlen($artist) > 20) {
            throw new InvalidArtistNameException('Artist name should be between 3 and 20 symbols.');
        }

        $this->artist = $artist;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setName($name)
    {
        if(strlen($name) < 3 || strlen($name) > 30) {
            throw new InvalidSongNameException('Song name should be between 3 and 30 symbols.');
        }

        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setMinutes(int $minutes)
    {
        if($minutes < 0 || $minutes > 14) {
            throw new InvalidSongMinutesException('Song minutes should be between 0 and 14.');
        }

        $this->minutes = $minutes;
    }

    public function getMinutes()
    {
        return $this->minutes;
    }

    public function setSeconds(int $seconds)
    {
        if($seconds < 0 || $seconds > 59) {
            throw new InvalidSongSecondsException('Song seconds should be between 0 and 59.');
        }

        $this->seconds = $seconds;
    }

    public function getSeconds()
    {
        return $this->seconds;
    }
}

$songs = [];
$count = intval(fgets(STDIN));
while($count--) {
    $tokens = explode(';', trim(fgets(STDIN)));
    $artistName = $tokens[0];
    $songName = $tokens[1];
    $length = explode(':', $tokens[2]);
    $minutes = $length[0];
    $seconds = $length[1];
    try	{
        $song = new Song($artistName, $songName, $minutes, $seconds);
        $songs[] = $song;
        echo 'Song added.' . PHP_EOL;
    } catch(InvalidSongException $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
}

$hours = 0;
$minutes = 0;
$seconds = 0;

foreach($songs as $song) {
    $minutes += $song->getMinutes();
    $seconds += $song->getSeconds();
}

$minutes += floor($seconds / 60);
$hours += floor($minutes / 60);

$minutes = $minutes % 60;
$seconds = $seconds % 60;

echo 'Songs added: ' . count($songs) . PHP_EOL;
echo 'Playlist length: ' . $hours . 'h ' . ($minutes < 10 ? '0' . $minutes : $minutes) . 'm ' . ($seconds < 10 ? '0' . $seconds : $seconds) . 's';