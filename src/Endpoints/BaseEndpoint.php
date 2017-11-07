<?php

namespace dacardworld\ShipStation\Endpoints;


use dacardworld\ShipStation\ShipStationApi;

abstract class BaseEndpoint
{
    /**
     * @var
     */
    protected $api;

    /**
     * @var string
     */
    protected $endpoint = '';

    /**
     * BaseEndpoint constructor.
     *
     * @param ShipStationApi $api
     */
    public function __construct(ShipStationApi $api)
    {
        $this->api = $api;
    }

    /**
     * @param string $endpoint_extension
     * @param array  $options
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function get($endpoint_extension = '', $options = [])
    {
        if(isset($options["query"]) && is_array($options["query"])) {
            $options["query"] = $this->format_query($options["query"]);
        }

        return $this->api->get($this->endpoint.$endpoint_extension, $options);
    }

    /**
     * @param array  $query
     * @return array
     */
    protected function format_query($query = [])
    {
        foreach ($query as $key => $value){
            if(!is_bool($value)){
                continue;
            }

            $query[$key] = ($value === true) ? 'true' : 'false';
        }

        return $query;
    }

    /**
     * @param string $endpoint_extension
     * @param array  $options
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function post($endpoint_extension = '', $options = [])
    {
        return $this->api->post($this->endpoint.$endpoint_extension, $options);
    }

    /**
     * @param string $endpoint_extension
     * @param array  $options
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function put($endpoint_extension = '', $options = [])
    {
        return $this->api->put($this->endpoint.$endpoint_extension, $options);
    }

    /**
     * @param string $endpoint_extension
     * @param array  $options
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function delete($endpoint_extension = '', $options = [])
    {
        return $this->api->delete($this->endpoint.$endpoint_extension, $options);
    }
}