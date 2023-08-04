<?php

namespace App\Transformers;

class FuelHistoryTransformer
{
    public function transformList(array $data): array
    {
        $response = $this->calculateStatistics($data);
        $response['data'] = [];

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

    private function calculateStatistics(array $data): array
    {
        $dataSize = count($data);
        $totalFuelCost = array_sum(array_column($data, 'total_amount'));
        $totalFuelEconomy = array_sum(array_column($data, 'fuel_economy_for_current_user'));

        $response['totalFuelCost'] = config('app.transaction_currency')." {$totalFuelCost}";
        $response['totalVolume'] = array_sum(array_column($data, 'us_gallons'));
        $response['avgFuelEconomy'] = $totalFuelEconomy / $dataSize;
        $response['avgCost'] = $totalFuelCost / $dataSize;

        return $response;

    }
}
