<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupport;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;

class SupportController extends Controller
{
    protected $repository;

    public function __construct(SupportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $supports = $this->repository->all($request->all());

        return SupportResource::collection($supports);
    }

    public function store(StoreSupport $request)
    {
        $support = $this->repository
                        ->create($request->validated());

        return new SupportResource($support);
    }
}
