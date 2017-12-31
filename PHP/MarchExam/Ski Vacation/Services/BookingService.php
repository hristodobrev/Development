<?php

namespace Services;

use Driver\DatabaseInterface;
use Models\DatabaseModels\Booking;
use Models\ViewData\BookingsViewData;

class BookingService implements BookingServiceInterface
{
    /** @var DatabaseInterface $db */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getBooking($id)
    {
        $query = "SELECT 
                    id,
                    first_name AS firstName, 
                    last_name AS lastName,
                    email,
                    phone_number AS phoneNumber,
                    accommodation_type AS accommodationType,
                    children,
                    adults,
                    rooms,
                    check_in_date AS checkInDate,
                    check_out_date AS checkOutDate,
                    lift_pass AS liftPass,
                    ski_instructor AS skiInstructor
                  FROM bookings
                  WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetchObject(Booking::class);
    }

    /** @return BookingsViewData */
    public function listAllBookings()
    {
        $query = "SELECT 
                    id,
                    first_name AS firstName, 
                    last_name AS lastName,
                    email,
                    phone_number AS phoneNumber,
                    accommodation_type AS accommodationType,
                    children,
                    adults,
                    rooms,
                    check_in_date AS checkInDate,
                    check_out_date AS checkOutDate,
                    lift_pass AS liftPass,
                    ski_instructor AS skiInstructor
                  FROM bookings";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $bookingViewData = new BookingsViewData();

//        $bookings = function () use ($stmt) {
//            while ($booking = $stmt->fetchObject(Booking::class)) {
//                yield $booking;
//            }
//        };

        $bookings = [];
        while ($booking = $stmt->fetchObject(Booking::class)) {
            $bookings[] = $booking;
        }

        $bookingViewData->setBookings($bookings);

        return $bookingViewData;
    }

    public function addBooking(Booking $booking)
    {
        $query = "INSERT INTO
                    bookings (
                      `first_name`,
                      `last_name`,
                      `email`,
                      `phone_number`,
                      `accommodation_type`,
                      `children`,
                      `adults`,
                      `rooms`,
                      `check_in_date`,
                      `check_out_date`,
                      `lift_pass`,
                      `ski_instructor`
                    ) VALUES (
                      ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                    )";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $booking->getFirstName(),
            $booking->getLastName(),
            $booking->getEmail(),
            $booking->getPhoneNumber(),
            $booking->getAccommodationType(),
            $booking->getChildren(),
            $booking->getAdults(),
            $booking->getRooms(),
            $booking->getCheckInDate(),
            $booking->getCheckOutDate(),
            $booking->getLiftPass(),
            $booking->getSkiInstructor()
        ]);

        return $stmt->rowCount() != 0;
    }

    public function deleteBooking($id)
    {
        $query = "DELETE FROM bookings WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->rowCount() != 0;
    }

    public function updateBooking(Booking $booking)
    {
        $query = "UPDATE bookings
                  SET 
                      `first_name` = ?,
                      `last_name` = ?,
                      `email` = ?,
                      `phone_number` = ?,
                      `accommodation_type` = ?,
                      `children` = ?,
                      `adults` = ?,
                      `rooms` = ?,
                      `check_in_date` = ?,
                      `check_out_date` = ?,
                      `lift_pass` = ?,
                      `ski_instructor` = ?
                    WHERE id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $booking->getFirstName(),
            $booking->getLastName(),
            $booking->getEmail(),
            $booking->getPhoneNumber(),
            $booking->getAccommodationType(),
            $booking->getChildren(),
            $booking->getAdults(),
            $booking->getRooms(),
            $booking->getCheckInDate(),
            $booking->getCheckOutDate(),
            $booking->getLiftPass(),
            $booking->getSkiInstructor(),
            $booking->getId()
        ]);

        return $stmt->rowCount() != 0;
    }
}