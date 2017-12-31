<?php

namespace Services;

use Models\DatabaseModels\Booking;

interface BookingServiceInterface
{
    public function listAllBookings();

    public function addBooking(Booking $booking);

    public function getBooking($id);

    public function deleteBooking($id);

    public function updateBooking(Booking $booking);
}