<?php

return [
    'model' => App\Models\Article::class,
    'title' => 'Form Upload Artikel',
    'relationship' => ['createdby', 'project'],
    'view' => [
        'form' => 'Display/Form/Form',
    ],
    'form' => [
        'fields' => [
            'article_file' => $commonFields['article_file'],
        ],
    ],
];
