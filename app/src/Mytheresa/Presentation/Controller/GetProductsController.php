<?php

namespace App\Mytheresa\Presentation\Controller;

use App\Mytheresa\Application\Query\GetProductsMessage;
use App\Mytheresa\Infrastructure\Messaging\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetProductsController extends AbstractController
{
    public function __invoke(
        Request $request,
        QueryBus $queryBus,
    ): JsonResponse
    {
        $category = empty($request->query->get('category')) ? null : $request->query->get('category');
        $priceLessThan = empty($request->query->get('priceLessThan')) ? null : $request->query->get('priceLessThan');
        $limit = 5;

        $products = $queryBus->handle(new GetProductsMessage($limit, $category, $priceLessThan));

        foreach ($products as &$product) {
            $product = $product->toArray();
        }

        return $this->json($products);
    }
}
