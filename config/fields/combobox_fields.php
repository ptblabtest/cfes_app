<?php

return [
    'skill' => [
        'label' => 'Keahlian',
        'type' => 'combobox',
        'validation' => 'nullable|string',
        'smallLabel' => 'Bisa pilih lebih dari 1',
        'options' => [
            ['value' => 'option1', 'label' => 'Option 1'],
            ['value' => 'option2', 'label' => 'Option 2'],
            // Add more options as needed
        ],
    ],

];
