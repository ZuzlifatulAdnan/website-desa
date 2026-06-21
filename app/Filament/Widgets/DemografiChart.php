<?php

namespace App\Filament\Widgets;

use App\Models\Demografi;
use Filament\Widgets\ChartWidget;

class DemografiChart extends ChartWidget
{
    protected ?string $heading = 'Demografi Penduduk (Pekerjaan)';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Demografi::query()
            ->where('kategori', 'pekerjaan')
            ->orderBy('order')
            ->get();

        if ($data->isEmpty()) {
            $data = Demografi::query()->where('kategori', 'pendidikan')->orderBy('order')->get();
            $this->heading = 'Demografi Penduduk (Pendidikan)';
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => $data->pluck('jumlah')->all(),
                    'backgroundColor' => [
                        '#22c55e', '#16a34a', '#84cc16', '#10b981',
                        '#0ea5e9', '#f59e0b', '#ef4444', '#8b5cf6',
                    ],
                ],
            ],
            'labels' => $data->pluck('label')->all(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
