<?php

namespace App\Http\Controllers;

use App\Services\EntityService;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Spatie\MediaLibrary\HasMedia;

class FindingController extends Controller
{

    protected $entityService;
    protected $config;

    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
        $this->config = Config::get("findings");
    }

    public function index($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        $items = $this->entityService->getItems($entity, $config);

        if (in_array(HasMedia::class, class_implements($config['model']))) {
            $items = $this->entityService->loadMediaForItems($items, $config['model']);
        }

        $items->transform(function ($item) use ($entity) {
            $item->showUrl = url("/f/{$entity}/show/{$item->id}");
            return $item;
        });

        $exportUrl = url("/f/{$entity}/export");

        return Inertia::render('Display/Index/Index', [
            'items' => $items,
            'entity' => $entity,
            'tables' => $config['index']['tables'] ?? null,
            'grids' => $config['index']['grids'] ?? null,
            'title' => $config['title'],
            'createUrl' => $createUrl ?? null,
            'exportUrl' => $exportUrl ?? null,
            'auth' => ['user' => auth()->user()],
        ]);
    }

}
