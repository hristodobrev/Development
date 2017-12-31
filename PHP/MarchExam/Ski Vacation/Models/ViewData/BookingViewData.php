<?php

namespace Models\ViewData;

use Models\DatabaseModels\Booking;

class BookingViewData
{
    /** @var Booking */
    private $booking;

    private $error;

    private $info;

    private $postData;

    public function __construct()
    {
    }

    public function getBooking()
    {
        return $this->booking;
    }

    public function setBooking($booking)
    {
        $this->booking = $booking;
    }
}