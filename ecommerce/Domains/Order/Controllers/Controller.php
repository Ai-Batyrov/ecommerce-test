<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Order\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\Order;
use App\Requests\FormRequest;
use Ecommerce\Domains\Order\Repositories\OrderRepository;
use Ecommerce\Domains\Order\Requests\ManageRequest;
use Ecommerce\Domains\Order\Resources\ShowResource;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class Controller extends BaseController
{
    public function index(FormRequest $request, OrderRepository $repository): JsonResponse
    {
        return $this->response(
            'Orders are successfully retrieved.',
            ShowResource::collection($repository->index($request->getCurrentUser()))
        );
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Order $order): JsonResponse
    {
        $this->authorize('isOwner', $order);

        return $this->response(
            'Order is successfully retrieved.',
            ShowResource::make($order)
        );
    }

    public function create(ManageRequest $request, OrderRepository $repository): JsonResponse
    {
        $order = $repository->create($request->getCurrentUser(), $request->getDto());

        return $this->response(
            'Order is successfully created.',
            ShowResource::make($order),
            Response::HTTP_CREATED
        );
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Order $order, ManageRequest $request, OrderRepository $repository): JsonResponse
    {
        $this->authorize('isOwner', $order);

        $order = $repository->update($order, $request->getDto());

        return $this->response(
            'Order is successfully updated.',
            ShowResource::make($order)
        );
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(Order $order): JsonResponse
    {
        $this->authorize('isOwner', $order);

        $order->delete();

        return $this->response('Order is successfully deleted.');
    }
}