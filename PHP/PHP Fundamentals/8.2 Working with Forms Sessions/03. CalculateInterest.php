<form method="get">
    <p>
        <label>
            Enter Amount:
            <input type="number" step="any" name="amount">
        </label>
    </p>
    <p>
        <label>
            <input type="radio" name="currency" value="USD">
            USD
        </label>
        <label>
            <input type="radio" name="currency" value="EUR">
            EUR
        </label>
        <label>
            <input type="radio" name="currency" value="BGN">
            BGN
        </label>
    </p>
    <p>
        <label>
            Compound Interest Amount:
            <input type="number" step="any" name="interest">
        </label>
    </p>
    <p>
        <select name="period">
            <option value="6">6 Months</option>
            <option value="12">1 Year</option>
            <option value="24">2 Years</option>
            <option value="60">5 Years</option>
        </select>
        <input type="submit" value="Calculate">
    </p>
</form>

<?php if(isset($total)): ?>
    <p><?= $total; ?></p>
<?php endif; ?>
