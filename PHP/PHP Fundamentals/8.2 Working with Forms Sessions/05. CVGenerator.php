<style>
    .error {
        color: red;
    }

    table {
        border: 1px solid black;
        border-spacing: 0;
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid black;
        padding: 10px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    var programmingLanguagePattern = `<p>
                <input type="text" name="programming_languages[]" id="programming_languages">
                <select name="programming_languages_level[]">
                    <option value="beginner">Beginner</option>
                    <option value="programmer">Programmer</option>
                    <option value="ninja">Ninja</option>
                </select>
            </p>`;

    var languagePattern = `<p>
                <input type="text" name="languages[]" id="languages">
                <select name="languages_comprehension[]">
                    <option value="beginner">Beginner</option>
                    <option value="advanced">Advanced</option>
                    <option value="intermediate">Intermediate</option>
                </select>
                <select name="languages_reading[]">
                    <option value="beginner">Beginner</option>
                    <option value="beginner">Advanced</option>
                    <option value="intermediate">Intermediate</option>
                </select>
                <select name="languages_writing[]">
                    <option value="beginner">Beginner</option>
                    <option value="beginner">Advanced</option>
                    <option value="intermediate">Intermediate</option>
                </select>
            </p>`;

    $(function () {
        $('#add_programming_language').click(function () {
            $('#programming_languages')
                .append($(programmingLanguagePattern));
        });
        $('#add_language').click(function () {
            $('#languages')
                .append($(languagePattern));
        });
        $('#remove_programming_language').click(function () {
            $('#programming_languages>p:last-child').remove();
        });
        $('#remove_language').click(function () {
            $('#languages>p:last-child').remove();
        });
    });
</script>

<form method="get">
    <fieldset>
        <legend>Personal Information</legend>
        <p>
            <input type="text" name="first_name" placeholder="First Name">
            <?= isset($exceptions['first_name']) ? '<span class="error">' . $exceptions['first_name'] . '</span>' : '' ?>
        </p>
        <p>
            <input type="text" name="last_name" placeholder="Last Name">
            <?= isset($exceptions['last_name']) ? '<span class="error">' . $exceptions['last_name'] . '</span>' : '' ?>
        </p>
        <p>
            <input type="email" name="email" placeholder="Email">
            <?= isset($exceptions['email']) ? '<span class="error">' . $exceptions['email'] . '</span>' : '' ?>
        </p>
        <p>
            <input type="text" name="phone_number" placeholder="Phone Number">
            <?= isset($exceptions['phone_number']) ? '<span class="error">' . $exceptions['phone_number'] . '</span>' : '' ?>
        </p>
        <p>
            <label>Female <input type="radio" name="gender" value="Female"></label>
            <label>Male <input type="radio" name="gender" value="Male"></label>
        </p>
        <p><label for="birthday">Birth Date</label></p>
        <p><input type="date" name="birthday" id="birthday"></p>
        <p><label for="nationality">Nationality</label></p>
        <p>
            <select name="nationality" id="nationality">
                <option value="Bulgarian">Bulgarian</option>
                <option value="English">English</option>
                <option value="American">American</option>
                <option value="French">French</option>
                <option value="Spanish">Spanish</option>
                <option value="Italian">Italian</option>
            </select>
        </p>
    </fieldset>
    <fieldset>
        <legend>Last Work Position</legend>
        <p>
            <label>
                Company Name
                <input type="text" name="company_name">
                <?= isset($exceptions['company_name']) ? '<span class="error">' . $exceptions['company_name'] . '</span>' : '' ?>
            </label>
        </p>
        <p>
            <label>
                From
                <input type="date" name="from">
            </label>
        </p>
        <p>
            <label>
                To
                <input type="date" name="to">
            </label>
        </p>
    </fieldset>
    <fieldset>
        <legend>Computer Skills</legend>
        <p>Programming Languages</p>
        <div id="programming_languages">
            <p>
                <input type="text" name="programming_languages[]" id="programming_languages">
                <select name="programming_languages_level[]">
                    <option value="beginner">Beginner</option>
                    <option value="programmer">Programmer</option>
                    <option value="ninja">Ninja</option>
                </select>
            </p>
        </div>
        <p>
            <input type="button" id="remove_programming_language" value="Remove Language">
            <input type="button" id="add_programming_language" value="Add Language">
        </p>
    </fieldset>
    <fieldset>
        <legend>Other Skills</legend>
        <p>Languages</p>
        <div id="languages">
            <p>
                <input type="text" name="languages[]" id="languages">
                <select name="languages_comprehension[]">
                    <option value="Beginner">Beginner</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Intermediate">Intermediate</option>
                </select>
                <select name="languages_reading[]">
                    <option value="Beginner">Beginner</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Intermediate">Intermediate</option>
                </select>
                <select name="languages_writing[]">
                    <option value="Beginner">Beginner</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Intermediate">Intermediate</option>
                </select>
            </p>
        </div>
        <p>
            <input type="button" id="remove_language" value="Remove Language">
            <input type="button" id="add_language" value="Add Language">
        </p>
        <p>Driver's License</p>
        <p>
            <label>A <input type="checkbox" name="drivers_license[]" value="A"></label>
            <label>B <input type="checkbox" name="drivers_license[]" value="B"></label>
            <label>C <input type="checkbox" name="drivers_license[]" value="C"></label>
        </p>
    </fieldset>
    <p><input type="submit" name="submit" value="Generate CV"></p>
</form>

<?php if (count($exceptions) == 0) : ?>
    <h1>CV</h1>
    <table>
        <thead>
        <tr>
            <td colspan="2">Personal Information</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>First Name</td>
            <td><?= $firstName ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?= $lastName ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><?= $phoneNumber ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?= $gender ?></td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td><?= $birthday ?></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><?= $nationality ?></td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            <td colspan="2">Last Work Position</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Company Name</td>
            <td><?= $companyName ?></td>
        </tr>
        <tr>
            <td>From</td>
            <td><?= $from ?></td>
        </tr>
        <tr>
            <td>To</td>
            <td><?= $to ?></td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            <td colspan="2">Computer Skills</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Programming Languages</td>
            <td>
                <table>
                    <tr>
                        <th>Language</th>
                        <th>Skill Level</th>
                    </tr>
                    <?php for ($i = 0; $i < count($programmingLanguages); $i++): ?>
                        <tr>
                            <td><?= $programmingLanguages[$i] ?></td>
                            <td><?= $programmingLanguagesLevels[$i] ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr>
            <td colspan="2">Other Skills</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Languages</td>
            <td>
                <table>
                    <tr>
                        <th>Language</th>
                        <th>Comprehension</th>
                        <th>Reading</th>
                        <th>Writing</th>
                    </tr>
                    <?php for ($i = 0; $i < count($languages); $i++): ?>
                        <tr>
                            <td><?= $languages[$i] ?></td>
                            <td><?= $languagesComprehension[$i] ?></td>
                            <td><?= $languagesReading[$i] ?></td>
                            <td><?= $languagesWriting[$i] ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>Driver's License</td>
            <td><?= implode(', ', $driversLicenses); ?></td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>
