<?php

namespace App\Transformers;

class VendorTransformer
{
    public function transformList(array $data): array
    {
        $response = [
            'data' => [],
        ];

        foreach ($data as $index => $row) {
            $address = $row['street_address'].'<br/>'.$row['city'].', '.$row['postal_code'].', '.$row['country'];

            $response['data'][] = [
                ++$index,
                $row['name'],
                $address,
                $row['phone'],
                $row['website'],
            ];
        }

        return $response;
    }
}
