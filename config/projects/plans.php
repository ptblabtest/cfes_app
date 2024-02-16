<?php

return [
    'model' => App\Models\Plan::class,
    'title' => 'TOR/BTOR',
    'relationship' => ['createdby', 'location', 'tor', 'btor', 'article', 'project'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'year' => $commonFields['year'],
                'title' => $commonFields['title'],
                'tor_status' => [
                    'label' => 'Status TOR',
                    'type' => 'tor_status',
                ],
                'btor_status' => [
                    'label' => 'Status BTOR',
                    'type' => 'btor_status',
                ],
                'actreport_status' => [
                    'label' => 'Status Lap. Aktivitas', 
                    'type' => 'actreport_status'
                ],
                'total_budget' => [
                    'label' => 'PUM', 'type' => 'total_budget'
                ],
                'total_cost' => [
                    'label' => 'PJUM', 'type' => 'total_cost'
                ],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'year' => $commonFields['year'],
            'title' => $commonFields['title'],
            'project_target' => $commonFields['project_target'],
            'project_id' => $commonFields['project_id'],
            'project_type' => $commonFields['project_type'],
            'address' => $commonFields['address'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'year' => $commonFields['year'],
                'title' => $commonFields['title'],
                'project_target' => $commonFields['project_target'],
                'project_id' => $commonFields['project_id'],
                'project_type' => $commonFields['project_type'],
                'address' => $commonFields['address'],
            ],
        ],
    ],
    'relation_show' => [
        'tor' => [
            'model' => App\Models\Tor::class,
            'entity' => 'tors',
            'relationship' => ['createdby', 'plan'],
            'title' => 'Data TOR',
            'create' => [
                'url' => '/p/tor/create?plan_id=',
                'label' => 'Isi Tor',
            ],
            'fields' => [
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'tor_file' => $commonFields['tor_file'],
                'budget' => $commonFields['budget'],
                'budget_file' => $commonFields['budget_file'],
                'comment' => $commonFields['comment'],
            ],
        ],
        'btor' => [
            'model' => App\Models\Btor::class,
            'entity' => 'btors',
            'relationship' => ['createdby', 'plan'],
            'title' => 'Data BTOR',
            'create' => [
                'url' => '/p/btor/create?plan_id=',
                'label' => 'Isi Btor',
            ],
            'fields' => [
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'btor_file' => $commonFields['btor_file'],
                'cost' => $commonFields['cost'],
                'cost_file' => $commonFields['cost_file'],
                'comment' => $commonFields['comment'],
            ],
        ],
        'actreports' => [
            'model' => App\Models\ActReport::class,
            'entity' => 'actreports',
            'relationship' => ['createdby', 'plan'],
            'title' => 'Data Laporan Aktifitas',
            'create' => [
                'url' => '/actreports/create?plan_id=',
                'label' => 'Isi Laporan Kegiatan',
            ],
            'fields' => [
                'act_file' => $commonFields['act_file'],
            ],
        ],
        'article' => [
            'model' => App\Models\Article::class,
            'entity' => 'article',
            'relationship' => ['createdby', 'plan'],
            'title' => 'Data Artikel',
            'create' => [
                'url' => '/article/create?plan_id=',
                'label' => 'Isi Artikel',
            ],
            'fields' => [
                'article_file' => $commonFields['article_file'],
            ],
        ],
    ],
];
