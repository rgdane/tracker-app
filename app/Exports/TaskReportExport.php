<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TaskReportExport implements FromArray, WithHeadings, WithStyles, ShouldAutoSize
{
    protected Collection $tasks;

    public function __construct(Collection $tasks)
    {
        $this->tasks = $tasks;
    }

    public function array(): array
    {
        return $this->tasks->map(fn ($task) => [
            'Proyek' => $task->project->name ?? '-',
            'Ditugaskan Kepada' => $task->user->name ?? '-',
            'Judul' => $task->title,
            'Status' => $task->status,
            'Tenggat' => $task->deadline,
        ])->toArray();
    }

    public function headings(): array
    {
        return ['Proyek', 'Ditugaskan Kepada', 'Judul', 'Status', 'Tenggat'];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
