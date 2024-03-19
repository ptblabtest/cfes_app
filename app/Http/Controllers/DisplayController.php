<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EntityService;
use App\Services\MediaService;
use App\Services\RelationshipService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Config;

class DisplayController extends Controller
{
    protected $entityService;
    protected $relationshipService;
    protected $mediaService;
    protected $config;

    public function __construct(
        EntityService $entityService,
        RelationshipService $relationshipService,
        MediaService $mediaService
    ) {
        $this->entityService = $entityService;
        $this->relationshipService = $relationshipService;
        $this->mediaService = $mediaService;
        $this->config = Config::get("pages");
    }

    public function index($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        return Inertia::render($config['view']['index'], [
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function show($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        return Inertia::render($config['view']['show'], [
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function create($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $parentId = request()->input($config['parent'] ?? '');

        if ($parentId && $config['redirect_show']['enabled'] ?? false) {
            $parentEntity = $config['model']::where($config['parent'], $parentId)->first();

            if ($parentEntity) {
                $redirectPath = $config['redirect_show']['path'] ?? $entity;
                $showAction = $config['redirect_show']['show_action'] ?? 'show';
                return redirect("/{$redirectPath}/{$showAction}/{$parentId}");
            }
        }

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'sections' => $config['form']['sections'] ?? null,
            'fields' => $config['form']['fields'] ?? null,
            'title' => $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function edit($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $item = $config['model']::findOrFail($id);

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'item' => $item,
            'sections' => $config['form']['sections'] ?? null,
            'fields' => $config['form']['fields'] ?? null,
            'title' => $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }
}
