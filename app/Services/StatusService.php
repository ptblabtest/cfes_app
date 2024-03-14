<?php

namespace App\Services;

class StatusService
{
    public function getApprovalStatuses()
    {
        return [
            'review' => [
                'label' => 'Review',
                'class' => 'bg-yellow-50 dark:bg-yellow-700 text-yellow-500',
            ],
            'approved' => [
                'label' => 'Disetujui',
                'class' => 'bg-green-50 dark:bg-green-700 text-green-500',
            ],
            'test' => [
                'label' => 'Test',
                'class' => 'bg-red-50 dark:bg-red-700 text-red-500',
            ],
        ];
    }
}
