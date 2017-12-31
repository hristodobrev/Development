<form method="get">
    <p><input type="text" name="string"></p>
    <p>Modifier: </p>
    <p><label><input type="radio" name="modifier" value="check-palindrome">Check Palindrome</label></p>
    <p><label><input type="radio" name="modifier" value="reverse-string">Reverse String</label></p>
    <p><label><input type="radio" name="modifier" value="split">Split</label></p>
    <p><label><input type="radio" name="modifier" value="hash-string">Hash String</label></p>
    <p><label><input type="radio" name="modifier" value="shuffle-string">Shuffle String</label></p>
    <p><input type="submit"></p>
</form>

<?php
if (isset($_GET['string']) && isset($_GET['modifier'])) {
    $str = $_GET['string'];
    $modifier = $_GET['modifier'];
    $result;
    switch ($modifier) {
        case 'check-palindrome':
            $result = checkPalindrome($str);
            break;
        case 'reverse-string':
            $result = reverseString($str);
            break;
        case 'split':
            $result = splitString($str);
            break;
        case 'hash-string':
            $result = hashString($str);
            break;
        case 'shuffle-string':
            $result = shuffleString($str);
            break;
    }
    echo $result;
}

function checkPalindrome($str)
{
    $isPalindrome = true;
    $len = strlen($str);
    for ($i = 0; $i <= floor($len / 2); $i++) {
        if ($str[$i] != $str[$len - 1 - $i]) {
            $isPalindrome = false;
            break;
        }
    }

    return "{$str} is" . ($isPalindrome ? '' : ' not') . " a palindrome!";
}

function reverseString($str)
{
    $len = strlen($str);
    for ($i = 0; $i <= floor($len / 2); $i++) {
        $temp = $str[$i];
        $str[$i] = $str[$len - 1 - $i];
        $str[$len - 1 - $i] = $temp;
    }

    return $str;
}

function splitString($str)
{
    $letters = preg_split('/[\W]+/', $str);
    $letters = implode('', $letters);
    $splited = [];
    for ($i = 0; $i < strlen($letters); $i++) {
        $splited[] = $letters[$i];
    }

    return implode(' ', $splited);
}

function hashString($str)
{
    return crypt($str, 'rl');
}

function shuffleString($str)
{
    $result = [];
    $indecies = [];
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $randIndex = rand(0, $len - 1);
        while (in_array($randIndex, $indecies)) {
            $randIndex = rand(0, $len - 1);
        }

        $indecies[] = $randIndex;
        $result[] = $str[$randIndex];
    }
    
    return implode('', $result);
}

?>