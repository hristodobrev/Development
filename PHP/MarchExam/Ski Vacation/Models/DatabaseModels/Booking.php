<?php

namespace Models\DatabaseModels;

use Exceptions\AccommodationException;
use Exceptions\UserException;

class Booking
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $phoneNumber;
    private $accommodationType;
    private $children;
    private $adults;
    private $rooms;
    private $checkInDate;
    private $checkOutDate;
    private $liftPass;
    private $skiInstructor;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getAccommodationType()
    {
        return $this->accommodationType;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return mixed
     */
    public function getAdults()
    {
        return $this->adults;
    }

    /**
     * @return mixed
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @return mixed
     */
    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    /**
     * @return mixed
     */
    public function getCheckOutDate()
    {
        return $this->checkOutDate;
    }

    /**
     * @return mixed
     */
    public function getLiftPass()
    {
        return $this->liftPass;
    }

    /**
     * @return mixed
     */
    public function getSkiInstructor()
    {
        return $this->skiInstructor;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        if (strlen(trim($firstName)) > 50) {
            throw new UserException('First name must be less than 50 characters');
        }
        if (strlen(trim($firstName)) < 3) {
            throw new UserException('First name must be more than 3 characters');
        }

        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        if (strlen(trim($lastName)) > 50) {
            throw new UserException('Last name must be less than 50 characters');
        }
        if (strlen(trim($lastName)) < 3) {
            throw new UserException('Last name must be more than 3 characters');
        }

        $this->lastName = $lastName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        if (!preg_match('/^[a-zA-Z-]+@[a-zA-Z-]+\.[a-zA-Z-]+$/', $email)) {
            throw new UserException('Email must have @');
        }

        if (strlen(trim($email)) > 100) {
            throw new UserException('Email must be less than 50 characters');
        }
        if (strlen(trim($email)) < 3) {
            throw new UserException('Email must be more than 3 characters');
        }

        $this->email = $email;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        if (!preg_match('/^[0-9-]+$/', $phoneNumber)) {
            throw new UserException('Invalid phone number');
        }

        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param mixed $accommodationType
     */
    public function setAccommodationType($accommodationType)
    {
        $this->accommodationType = $accommodationType;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        if (trim($children) == '') {
            throw new AccommodationException('Children field must not be empty');
        }

        $this->children = $children;
    }

    /**
     * @param mixed $adults
     */
    public function setAdults($adults)
    {
        if (trim($adults) == '') {
            throw new AccommodationException('Adults field must not be empty');
        }

        $this->adults = $adults;
    }

    /**
     * @param mixed $rooms
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * @param mixed $checkInDate
     */
    public function setCheckInDate($checkInDate)
    {
        if (trim($checkInDate) == '') {
            throw new AccommodationException('Check-In Date field must not be empty');
        }

        $this->checkInDate = new \DateTime($checkInDate);
    }

    /**
     * @param mixed $checkOutDate
     */
    public function setCheckOutDate($checkOutDate)
    {
        if (trim($checkOutDate) == '') {
            throw new AccommodationException('Check-Out Date field must not be empty');
        }

        $this->checkOutDate = new \DateTime($checkOutDate);
    }

    /**
     * @param mixed $liftPass
     */
    public function setLiftPass($liftPass)
    {
        $this->liftPass = $liftPass;
    }

    /**
     * @param mixed $skiInstructor
     */
    public function setSkiInstructor($skiInstructor)
    {
        $this->skiInstructor = $skiInstructor;
    }


}