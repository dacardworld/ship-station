<?php

namespace dacardworld\ShipStation\Endpoints;


use dacardworld\ShipStation\Models\Product;

class Products extends BaseEndpoint
{
    protected $endpoint = '/products/';

    /**
     * Get a product by id
     *
     * @param string $productId
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getProduct($productId = '')
    {
        return $this->get('', ['query' => ['id' => $productId]]);
    }

    /**
     * Update a product
     * !WARNING: Every element in the product must be filled
     *
     * @param Product $product
     * @return \GuzzleHttp\Psr7\Response
     */
    public function update(Product $product)
    {
        return $this->put('', [
            'query' => ['id' => $product->productId],
            'json' => $product->toArray()
        ]);
    }

    /**
     * Get a listing of products
     * @param array $query
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getList($query = [])
    {
        return $this->get('', ['json' => $query]);
    }
}
