<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Product\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\Product;
use Ecommerce\Domains\Product\Repositories\ProductRepository;
use Ecommerce\Domains\Product\Requests\ManageRequest;
use Ecommerce\Domains\Product\Resources\ProductResource;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class Controller extends BaseController
{
    public function index(ProductRepository $repository): JsonResponse
    {
        return $this->response(
            'Products are successfully retrieved.',
            ProductResource::collection($repository->index())
        );
    }

    public function show(Product $product): JsonResponse
    {
        return $this->response(
            'Product is successfully retrieved.',
            ProductResource::make($product)
        );
    }

    public function create(ManageRequest $request, ProductRepository $repository): JsonResponse
    {
        $product = $repository->create($request->getCurrentUser(), $request->getDto());

        return $this->response(
            'Product is successfully created.',
            ProductResource::make($product),
            Response::HTTP_CREATED
        );
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Product $product, ManageRequest $request, ProductRepository $repository): JsonResponse
    {
        $this->authorize('isOwner', $product);

        $product = $repository->update($product, $request->getDto());

        return $this->response(
            'Product is successfully updated.',
            ProductResource::make($product)
        );
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(Product $product): JsonResponse
    {
        $this->authorize('isOwner', $product);

        return $this->response('Product is successfully deleted.');
    }
}