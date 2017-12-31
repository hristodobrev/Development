<?php /** @var \Models\ViewData\BookingViewData $data */ ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ski Vacation</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php if (isset($info)): ?>
    <div class="panel">
        <p class="info"><?= $info; ?></p>
    </div>
<?php endif; ?>
<?php if (isset($error)): ?>
    <div class="panel">
        <p class="error"><?= $error; ?></p>
    </div>
<?php endif; ?>
<div class="panel">
    <form method="post">
        <fieldset>
            <legend>
                Personal Information
            </legend>
            <p class="form-group">
                <label for="first-name">First Name *</label>
                <input id="first-name" type="text" name="first-name"
                       value="<?= $data->getBooking()->getFirstName() ?>" disabled>
            </p>
            <p class="form-group">
                <label for="last-name">Last Name *</label>
                <input id="last-name" type="text" name="last-name"
                       value="<?= $data->getBooking()->getLastName() ?>" disabled>
            </p>
            <p class="form-group">
                <label for="phone-number">Phone Number *</label>
                <input id="phone-number" type="text" name="phone-number"
                       value="<?= $data->getBooking()->getPhoneNumber() ?>" disabled>
            </p>
            <p class="form-group">
                <label for="email">Email Address *</label>
                <input id="email" type="email" name="email"
                       value="<?= $data->getBooking()->getEmail() ?>" disabled>
            </p>
            <p class="form-group">
                <label for="email-confirm">Confirm Email Address *</label>
                <input id="email-confirm" type="email" name="email-confirm"
                       value="<?= $data->getBooking()->getEmail() ?>" disabled>
            </p>
        </fieldset>
        <fieldset>
            <legend>
                Accommodation Details
            </legend>
            <p class="form-group">
                <label for="accommodation-type">Type Of Accommodation *</label>
                <select name="accommodation-type" id="accommodation-type">
                    <option value="Hotel"
                        <?= $data->getBooking()->getAccommodationType() == 'Hotel' ? 'selected="selected"' : '' ?> disabled>
                        Hotel
                    </option>
                    <option value="Hostel"
                        <?= $data->getBooking()->getAccommodationType() == 'Hostel' ? 'selected="selected"' : '' ?> disabled>
                        Hostel
                    </option>
                    <option value="Bungalow"
                        <?= $data->getBooking()->getAccommodationType() == 'Bungalow' ? 'selected="selected"' : '' ?> disabled>
                        Bungalow
                    </option>
                </select>
            </p>
            <p class="form-group">
                <label for="children">Number Of Children *</label>
                <input id="children" type="number" name="children"
                       value="<?= $data->getBooking()->getChildren() ?>" disabled>
            </p>
            <p class="form-group">
                <label for="adults">Number Of Adults *</label>
                <input id="adults" type="number" name="adults"
                       value="<?= $data->getBooking()->getAdults() ?>" disabled>
            </p>
            <p class="form-group">
                <label for="rooms">Rooms</label>
                <input id="rooms" type="number" name="rooms"
                       value="<?= $data->getBooking()->getRooms() ?>" disabled>
            </p>
        </fieldset>
        <fieldset>
            <legend>
                Vacation Details
            </legend>
            <p class="form-group">
                <label for="check-in">Check-In Date *</label>
                <input id="check-in" type="date" name="check-in"
                       value="<?= $data->getBooking()->getCheckInDate() ?>" disabled>
            </p>
            <p class="form-group">
                <label for="check-out">Check-Out Date *</label>
                <input id="check-out" type="date" name="check-out"
                       value="<?= $data->getBooking()->getCheckOutDate() ?>" disabled>
            </p>
            <p class="form-group-checkbox">
                <label><input type="checkbox" name="lift-pass"
                        <?= $data->getBooking()->getLiftPass() ? 'checked="checked"' : '' ?> disabled> Lift
                    Pass</label>
                <label><input type="checkbox" name="ski-instructor"
                        <?= $data->getBooking()->getSkiInstructor() ? 'checked="checked"' : '' ?> disabled> Ski
                    Instructor</label>
            </p>
        </fieldset>
        <input type="submit" name="delete" value="Delete">
    </form>
</div>
</body>
</html>