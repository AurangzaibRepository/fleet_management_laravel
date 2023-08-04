<?php

namespace App\Transformers;

class FuelHistoryTransformer
{
    public function transformList(array $data): array
    {
        $response = [
            'data' => [],
        ];

        foreach ($data as $index => $row) {
            $response['data'][] = [
                (++$index),
                $row->vehicle_name,
                formatDate($row->date),
                $row->meter_entry->value,
                config('app.transaction_currency')." {$row->total_amount}",
                $row->id,
            ];
        }

        return $response;
    }
}
