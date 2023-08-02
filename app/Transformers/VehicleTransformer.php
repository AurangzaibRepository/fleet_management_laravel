<?php

namespace App\Transformers;

class VehicleTransformer
{
    public function transformList(array $data): array
    {
        $response = [
            'data' => [],
        ];

        foreach ($data as $index => $row) {
            $name = "<div>
                <img src='{$row->default_image_url_small}' class='img-car' />
                <span>{$row->name}</span>
            </div>";

            $response['data'][] = [
                (++$index),
                $name,
                $row->make,
                $row->model,
                $row->type_name,
                $row->id,
            ];
        }

        return $response;
    }

    public function transformDetails(array $data): array
    {
        $response = [
            'id' => $data['id'],
            'image' => $data['default_image_url_medium'],
        ];

        $response['details'] = [
            'name' => $data['name'],
            'type' => $data['vehicle_type_name'],
            'year' => $data['year'],
            'model' => $data['model'],
            'make' => $data['make'],
            'vin' => $data['vin'],
            'meter' => $data['meter_name'],
        ];

        $response['open_issues'] = [
            'open' => $data['issues_count'],
            'orders_count' => $data['work_orders_count'],
        ];

        $response['dimensions'] = [
            'height' => $data['height'],
            'length' => $data['length'],
            'width' => $data['width'],
        ];

        $response['engine'] = [
            'brand' => $data['engine_brand'],
            'description' => $data['engine_description'],
            'aspiration' => $data['engine_aspiration'],
        ];
    }
}
