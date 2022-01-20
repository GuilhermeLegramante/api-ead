<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSupport;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;
use App\Repositories\ReplySupportRepository;

class ReplySupportController extends Controller
{
    protected $repository;

    public function __construct(ReplySupportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $supports = $this->repository->all($request->all());

        return SupportResource::collection($supports);
    }

    public function store(StoreReplySupport $request)
    {
        $reply = $this->repository->store($request->validated());

        return new ReplySupportResource($reply);
    }
}
