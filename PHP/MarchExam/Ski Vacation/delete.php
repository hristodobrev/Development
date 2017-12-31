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

if (isset($_POST['delete'])) {
    $result = $bookingService->deleteBooking($id);

    if ($result) {
        $info = 'Booking deleted successfully';
        header('Location: SkiVacation.php');
        exit;
    } else {
        $error = 'Could not delete booking';
    }
}

$templateEngine->renderTemplate('delete', $error, $info, $postBackup, $data);