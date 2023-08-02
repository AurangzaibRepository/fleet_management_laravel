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
}
