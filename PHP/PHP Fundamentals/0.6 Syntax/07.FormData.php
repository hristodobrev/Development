<form method="get">
    <p>
        <input type="text" name="name">
    </p>
    <p>
        <input type="number" name="age">
    </p>
    <p>
        <input type="radio" name="gender" value="male"> Male
    </p>
    <p>
        <input type="radio" name="gender" value="female"> Female
    </p>
    <p>
        <input type="submit" value="Sumbit">
    </p>
    <p>
        <?php
        if (isset($_GET['name']) && isset($_GET['age']) && isset($_GET['gender'])) {
            echo "My name is {$_GET['name']}. I am {$_GET['age']} years old. I am {$_GET['gender']}";
        }
        ?>
    </p>
</form>
