<?php

return
    [
        'model' => App\Models\Option::class,
        'title' => 'Option',
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
    ];
