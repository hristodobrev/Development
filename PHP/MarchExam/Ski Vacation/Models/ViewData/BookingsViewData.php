<?php

namespace Models\ViewData;

use Models\DatabaseModels\Booking;

class BookingsViewData
{
    /** @var Booking[]|\Iterator */
    private $bookings;

    private $error;

    private $info;

    private $postData;

    /**
     * BookingViewData constructor.
     * @param \Iterator|\Models\DatabaseModels\Booking[] $bookings
     */
    public function __construct()
    {
    }

    /**
     * @return \Iterator|\Models\DatabaseModels\Booking[]
     */
    public function getBookings()
    {
        return $this->bookings;
    }

    /**
     * @param \Iterator|\Models\DatabaseModels\Booking[] $bookings
     */
    public function setBookings($bookings)
    {
        $this->bookings = $bookings;
    }
}