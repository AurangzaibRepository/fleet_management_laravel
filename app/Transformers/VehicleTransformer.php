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
            $response['data'][] = [
                (++$index),
                $row->name,
                $row->make,
                $row->model,
                $row->type_name,
                $row->id,
            ];
        }

        return $response;
    }
}
