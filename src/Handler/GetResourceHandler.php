<?php

namespace App\Handler;

class GetResourceHandler
{
    private function getContents()
    {

    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function getData(array $data): array
    {
        if (!$data) {
            return [];
        }

        $access_key = $data['access_key'];
        $uri        = $data['resource'];
        $city       = $data['city'];
        $nameId     = $data['name_id'];
        $endPoint   = $data['end_point'];
        $queryName  = $data['query_name'];

        try {
            $response = file_get_contents("http://$uri$endPoint?$queryName=$city&$nameId=$access_key");
        }catch (\Exception $exception) {
            return [];
        }

        return (array) json_decode($response);
    }

    /**
     * @param float $temperature
     *
     * @return string
     */
    public function formatTemperature(float $temperature): string
    {
        if ($temperature - 273 > 0) {
            return $temperature - 273;
        }

        return $temperature;
    }
}