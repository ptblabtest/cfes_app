<?php

return array_merge(
    include __DIR__ . '/fields/text_fields.php',
    include __DIR__ . '/fields/select_fields.php',
    include __DIR__ . '/fields/number_fields.php',
    include __DIR__ . '/fields/textarea_fields.php',
    include __DIR__ . '/fields/file_fields.php',
    include __DIR__ . '/fields/date_fields.php',
    include __DIR__ . '/fields/relation_fields.php',
    include __DIR__ . '/fields/hidden_fields.php',
    include __DIR__ . '/fields/url_fields.php',
    include __DIR__ . '/fields/combobox_fields.php',
    include __DIR__ . '/fields/image_fields.php',
    include __DIR__ . '/fields/model_fields.php',
    include __DIR__ . '/fields/boolean_fields.php',
    include __DIR__ . '/fields/currency_fields.php',
);

