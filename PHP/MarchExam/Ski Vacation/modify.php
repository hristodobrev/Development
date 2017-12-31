<?php
include 'app.php';

$error = null;
$info = null;
$postBackup = null;
$data = null;

if (!isset($_GET)) {
    header('Location: SkiVacation.php');
    exit;
}

$id = $_GET['id'];
$bookingService = new \Services\BookingService($db);
$data = new \Models\ViewData\BookingViewData();
$data->setBooking($bookingService->getBooking($id));

if (isset($_POST['modify'])) {
    $postBackup = $_POST;

    $booking = new \Models\DatabaseModels\Booking();

    try {
        if ($_POST['email'] != $_POST['email-confirm']) {
            throw new \Exceptions\UserException('Emails must match');
        }

        $booking->setId($id);
        $booking->setFirstName($_POST['first-name']);
        $booking->setLastName($_POST['last-name']);
        $booking->setEmail($_POST['email']);
        $booking->setPhoneNumber($_POST['phone-number']);
        $booking->setAccommodationType($_POST['accommodation-type']);
        $booking->setChildren($_POST['children']);
        $booking->setAdults($_POST['adults']);
        $booking->setRooms($_POST['rooms']);
        $booking->setCheckInDate($_POST['check-in']);
        $booking->setCheckOutDate($_POST['check-out']);
        $booking->setLiftPass(isset($_POST['lift-pass']) ? $_POST['lift-pass'] : false);
        $booking->setSkiInstructor(isset($_POST['ski-instructor']) ? $_POST['ski-instructor'] : false);

        $bookingService = new \Services\BookingService($db);
        $result = $bookingService->updateBooking($booking);

        if (!$result) {
            throw new Exception('An error has occurred during modifying the booking');
        } else {
            $info = 'Booking modified successfully';
            header('Location: SkiVacation.php');
            exit;
        }
    } catch (\Exceptions\UserException $exception) {
        $error = $exception->getMessage();
    } catch (\Exceptions\AccommodationException $exception) {
        $error = $exception->getMessage();
    } catch (\Exceptions\VacationException $exception) {
        $error = $exception->getMessage();
    }
}

$templateEngine->renderTemplate('modify', $error, $info, $postBackup, $data);