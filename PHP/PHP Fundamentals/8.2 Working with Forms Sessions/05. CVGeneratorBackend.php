<?php

$nameAndLanguageRegex = '/^[A-Za-z]{2,20}$/';
$companyNameRegex = '/^[A-Za-z0-9]{2,20}$/';
$phoneNumberRegex = '/^[0-9\-\+ ]+$/';
$emailRegex = '/^[A-Za-z0-9]+(\.[A-Za-z0-9]+)+@[A-Za-z0-9]+(\.[A-Za-z0-9]+)+$/';

if (isset($_GET['submit'])) {
    $exceptions = [];

    if (!preg_match($nameAndLanguageRegex, $_GET['first_name'])) {
        $exceptions['first_name'] = 'First name must contain only letters between 2 and 20 symbols.';
    }
    if (!preg_match($nameAndLanguageRegex, $_GET['last_name'])) {
        $exceptions['last_name'] = 'Last name must contain only letters between 2 and 20 symbols.';
    }
    if (!preg_match($emailRegex, $_GET['email'])) {
        $exceptions['email'] = 'Email must have numbers or digits and must contain "@".';
    }
    if (!preg_match($phoneNumberRegex, $_GET['phone_number'])) {
        $exceptions['phone_number'] = 'Invalid phone number.';
    }
    if (!preg_match($companyNameRegex, $_GET['company_name'])) {
        $exceptions['company_name'] = 'Company name must contain only letters and digits between 2 and 20 symbols.';
    }

    $firstName = $_GET['first_name'];
    $lastName = $_GET['last_name'];
    $email = $_GET['email'];
    $phoneNumber = $_GET['phone_number'];
    $gender = $_GET['gender'];
    $birthday = $_GET['birthday'];
    $nationality = $_GET['nationality'];
    $companyName = $_GET['company_name'];
    $from = $_GET['from'];
    $to = $_GET['to'];
    $programmingLanguages = $_GET['programming_languages'];
    $programmingLanguagesLevels = $_GET['programming_languages_level'];
    $languages = $_GET['languages'];
    $languagesComprehension = $_GET['languages_comprehension'];
    $languagesReading = $_GET['languages_reading'];
    $languagesWriting = $_GET['languages_writing'];
    $driversLicense = $_GET['drivers_license'];
    $driversLicenses = [];
    if (isset($driversLicense[0])) {
        $driversLicenses[] = 'A';
    }
    if (isset($driversLicense[1])) {
        $driversLicenses[] = 'B';
    }
    if (isset($driversLicense[2])) {
        $driversLicenses[] = 'C';
    }
}

function print_array($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

include '05. CVGenerator.php';