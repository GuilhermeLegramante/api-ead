<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSupport;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;

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

    public function indexFromUser(Request $request)
    {
        $supports = $this->repository->allFromUser($request->all());

        return SupportResource::collection($supports);
    }
}
