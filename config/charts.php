<?php

use App\Models\Location;

return [

    'forestTreeCount' => [
        'model' => Location::class,
        'fields' => [
            'forest_name' => 'Forest Name',
            'tree_count' => 'Total Trees',
        ],
        'chartType' => 'bar',
        'backgroundColor' => ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"],
        'datasets' => [
            [
                'label' => 'Tree Count by Forest',
                'legendName' => 'Total Trees', // Custom name for the legend
            ],
            // Add more datasets here if needed, each with its own custom legendName
        ],
    ],





];