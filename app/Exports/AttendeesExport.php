<?php

namespace App\Exports;

use App\Models\Attendee;
use Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class AttendeesExport implements FromQuery, ShouldAutoSize, WithColumnFormatting, WithHeadings
{
    use Exportable;

    /**
     * AttendeesExport constructor.
     *
     * @param int $event_id Event ID
     */
    public function __construct(int $event_id)
    {
        $this->event_id = $event_id;
    }

    /**
     * Headers
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email',
            'Order Reference',
            'Ticket Type',
            'Purchase Date',
            'Has Arrived',
            'Arrival Time',
        ];
    }

    /**
     * Formatting
     *
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_DATE_DATETIME,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    public function query()
    {
        return Attendee::query()
            ->where('attendees.event_id', '=', $this->event_id)
            ->where('attendees.is_cancelled', '=', 0)
            ->where('attendees.account_id', '=', Auth::user()->account_id)
            ->join('events', 'events.id', '=', 'attendees.event_id')
            ->join('orders', 'orders.id', '=', 'attendees.order_id')
            ->join('tickets', 'tickets.id', '=', 'attendees.ticket_id')
            ->select([
                'attendees.first_name',
                'attendees.last_name',
                'attendees.email',
                'orders.order_reference',
                'tickets.title',
                'orders.created_at',
                DB::raw("(CASE WHEN attendees.has_arrived THEN 'YES' ELSE 'NO' END) AS has_arrived"),
                'attendees.arrival_time',
            ]);
    }

    private function oldquery()
    {

        Excel::create('attendees-as-of-' . date('d-m-Y-g.i.a'), function ($excel) use ($event_id) {

            $excel->setTitle('Attendees List');

            // Chain the setters
            $excel->setCreator(config('attendize.app_name'))
                ->setCompany(config('attendize.app_name'));

            $excel->sheet('attendees_sheet_1', function ($sheet) use ($event_id) {
                DB::connection();
                $data = DB::table('attendees')
                    ->where('attendees.event_id', '=', $event_id)
                    ->where('attendees.is_cancelled', '=', 0)
                    ->where('attendees.account_id', '=', Auth::user()->account_id)
                    ->join('events', 'events.id', '=', 'attendees.event_id')
                    ->join('orders', 'orders.id', '=', 'attendees.order_id')
                    ->join('tickets', 'tickets.id', '=', 'attendees.ticket_id')
                    ->select([
                        'attendees.first_name',
                        'attendees.last_name',
                        'attendees.email',
                        'orders.order_reference',
                        'tickets.title',
                        'orders.created_at',
                        DB::raw("(CASE WHEN attendees.has_arrived THEN 'YES' ELSE 'NO' END) AS has_arrived"),
                        'attendees.arrival_time',
                    ])->get();

                $data = array_map(function ($object) {
                    return (array)$object;
                }, $data->toArray());

                $sheet->fromArray($data);
                $sheet->row(1, [
                    'First Name',
                    'Last Name',
                    'Email',
                    'Order Reference',
                    'Ticket Type',
                    'Purchase Date',
                    'Has Arrived',
                    'Arrival Time',
                ]);

                // Set gray background on first row
                $sheet->row(1, function ($row) {
                    $row->setBackground('#f5f5f5');
                });
            });
        })->export($export_as);

    }
}
