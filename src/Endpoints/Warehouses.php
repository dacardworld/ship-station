<?php

namespace dacardworld\ShipStation\Endpoints;


use dacardworld\ShipStation\Models\Warehouse;

class Warehouses extends BaseEndpoint
{
    protected $endpoint = '/warehouses/';

    /**
     * @param string $warehouseId
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getWarehouse($warehouseId = '')
    {
        return $this->get($warehouseId);
    }

    /**
     * @param Warehouse $warehouse
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function updateWarehouse(Warehouse $warehouse)
    {
        return $this->put($warehouse->warehouseId, ['json' => $warehouse->toArray()]);
    }

    /**
     * @param Warehouse $warehouse
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createWarehouse(Warehouse $warehouse)
    {
        return $this->post('createwarehouse', ['json' => $warehouse->toArray()]);
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getList()
    {
        return $this->get();
    }
}
