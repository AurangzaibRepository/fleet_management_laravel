<?php

namespace App\Transformers;

class FuelHistoryTransformer
{
    public function transformList(array $data): array
    {
        $currency = config('app.transaction_currency');
        $response = $this->calculateStatistics($data, $currency);
        $response['data'] = [];

        foreach ($data as $index => $row) {
            $response['data'][] = [
                (++$index),
                $row->vehicle_name,
                formatDate($row->date),
                $row->meter_entry->value,
                "{$currency} {$row->total_amount}",
                $row->id,
            ];
        }

        return $response;
    }

    private function calculateStatistics(array $data, string $currency): array
    {
        $dataSize = count($data);
        $totalFuelCost = array_sum(array_column($data, 'total_amount'));
        $totalFuelEconomy = array_sum(array_column($data, 'fuel_economy_for_current_user'));

        $response['totalFuelCost'] = "{$currency} {$totalFuelCost}";
        $response['totalVolume'] = array_sum(array_column($data, 'us_gallons'));
        $response['avgFuelEconomy'] = $totalFuelEconomy / $dataSize;
        $response['avgCost'] = "{$currency} ".($totalFuelCost / $dataSize);

        return $response;

    }
}
