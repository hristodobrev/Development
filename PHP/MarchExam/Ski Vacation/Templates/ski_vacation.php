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
                       value="<?= isset($postBackup) ? $postBackup['first-name'] : '' ?>">
            </p>
            <p class="form-group">
                <label for="last-name">Last Name *</label>
                <input id="last-name" type="text" name="last-name"
                       value="<?= isset($postBackup) ? $postBackup['last-name'] : '' ?>">
            </p>
            <p class="form-group">
                <label for="phone-number">Phone Number *</label>
                <input id="phone-number" type="text" name="phone-number"
                       value="<?= isset($postBackup) ? $postBackup['phone-number'] : '' ?>">
            </p>
            <p class="form-group">
                <label for="email">Email Address *</label>
                <input id="email" type="email" name="email"
                       value="<?= isset($postBackup) ? $postBackup['email'] : '' ?>">
            </p>
            <p class="form-group">
                <label for="email-confirm">Confirm Email Address *</label>
                <input id="email-confirm" type="email" name="email-confirm"
                       value="<?= isset($postBackup) ? $postBackup['email-confirm'] : '' ?>">
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
                        <?= isset($postBackup) && $postBackup['accommodation-type'] == 'hotel' ? 'selected="selected"' : '' ?>>
                        Hotel
                    </option>
                    <option value="Hostel"
                        <?= isset($postBackup) && $postBackup['accommodation-type'] == 'hostel' ? 'selected="selected"' : '' ?>>
                        Hostel
                    </option>
                    <option value="Bungalow"
                        <?= isset($postBackup) && $postBackup['accommodation-type'] == 'bungalow' ? 'selected="selected"' : '' ?>>
                        Bungalow
                    </option>
                </select>
            </p>
            <p class="form-group">
                <label for="children">Number Of Children *</label>
                <input id="children" type="number" name="children"
                       value="<?= isset($postBackup) ? $postBackup['children'] : '' ?>">
            </p>
            <p class="form-group">
                <label for="adults">Number Of Adults *</label>
                <input id="adults" type="number" name="adults"
                       value="<?= isset($postBackup) ? $postBackup['adults'] : '' ?>">
            </p>
            <p class="form-group">
                <label for="rooms">Rooms</label>
                <input id="rooms" type="number" name="rooms"
                       value="<?= isset($postBackup) ? $postBackup['rooms'] : '' ?>">
            </p>
        </fieldset>
        <fieldset>
            <legend>
                Vacation Details
            </legend>
            <p class="form-group">
                <label for="check-in">Check-In Date *</label>
                <input id="check-in" type="date" name="check-in"
                       value="<?= isset($postBackup) ? $postBackup['check-in'] : '' ?>">
            </p>
            <p class="form-group">
                <label for="check-out">Check-Out Date *</label>
                <input id="check-out" type="date" name="check-out"
                       value="<?= isset($postBackup) ? $postBackup['check-out'] : '' ?>">
            </p>
            <p class="form-group-checkbox">
                <label><input type="checkbox" name="lift-pass"
                        <?= isset($postBackup, $postBackup['lift-pass']) ? 'checked="checked"' : '' ?>> Lift
                    Pass</label>
                <label><input type="checkbox" name="ski-instructor"
                        <?= isset($postBackup, $postBackup['ski-instructor']) ? 'checked="checked"' : '' ?>> Ski
                    Instructor</label>
            </p>
        </fieldset>
        <input type="submit" name="submit" value="Submit Reservation">
    </form>
</div>
<div class="panel">
    <form method="get">
        <input type="submit" name="show-reservations" value="Show Reservations">
    </form>
</div>
<div class="panel">
    <?php if (isset($data)) : ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Accommodation Details</th>
                <th>Vacation Details</th>
                <th>Modify/Delete</th>
            </tr>
            <?php foreach ($data->getBookings() as $booking) : ?>
                <tr>
                    <td><?= $booking->getFirstName() . ' ' . $booking->getLastName(); ?></td>
                    <td><?= $booking->getPhoneNumber(); ?></td>
                    <td><?= $booking->getEmail(); ?></td>
                    <td><?= $booking->getAccommodationType() . ', ' .
                    $booking->getRooms() . ' Room(s), ' .
                    $booking->getAdults() . ' Adult(s), ' .
                    $booking->getChildren() . ' Child(ren) '; ?></td>
                    <td><?= $booking->getCheckInDate() . ' ' . $booking->getCheckOutDate() . ', ' .
                        ($booking->getLiftPass() ? '' : 'No ') . ' Lift Pass, ' .
                        ($booking->getSkiInstructor() ? '' : 'No ') . ' Ski Instructor'?></td>
                    <td>
                        <a href="delete.php?id=<?= $booking->getId(); ?>">X</a>
                        <a href="modify.php?id=<?= $booking->getId(); ?>">U</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
</body>
</html>