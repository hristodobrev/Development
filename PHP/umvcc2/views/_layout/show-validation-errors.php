<script>
<?php

foreach (array_reverse($this->validationErrors) as $fieldName => $errorMsg) {
    $fieldNameJson = json_encode($fieldName);
    $errorMsgJson = json_encode($errorMsg);
    echo "showValidationError($fieldNameJson, $errorMsgJson);\n";
}

?>
</script>
