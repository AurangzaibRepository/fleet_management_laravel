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
                formatNumber($row->total_amount, $currency),
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

        $response['totalFuelCost'] = formatNumber($totalFuelCost, $currency);
        $response['totalVolume'] = formatNumber(array_sum(array_column($data, 'us_gallons')));
        $response['avgFuelEconomy'] = formatNumber($totalFuelEconomy / $dataSize);
        $response['avgCost'] = formatNumber(($totalFuelCost / $dataSize), $currency);

        return $response;

    }

    public function transformDetails(array $data): array
    {
        $response['details'] = [
            'id' => $data['id'],
            'vehicle' => $data['vehicle_name'],
            'vendor' => $data['vendor_name'],
            'fuel_type' => $data['fuel_type_name'],
            'odometer' => $data['meter_entry']->value,
        ];
    }
}
