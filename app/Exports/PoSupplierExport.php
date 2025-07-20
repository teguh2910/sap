<?php

namespace App\Exports;

use App\Models\DetailPoSupplier;
use App\Models\PoSupplier;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PoSupplierExport
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function export()
    {
        $po = PoSupplier::with('vendor')->find($this->id);
        $detail_pos = DetailPoSupplier::with('material')->where('id_po', $this->id)->get();

        if (!$po) {
            abort(404, 'Purchase Order not found');
        }

        $templatePath = public_path('template_po.xlsx');
        $spreadsheet = IOFactory::load($templatePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Sheet manipulation
        $sheet->setCellValue('B8', $po->vendor->nama_vendor);
        $sheet->setCellValue('E7', $po->tgl_po);
        $sheet->setCellValue('E8', $po->id_po);
        $sheet->setCellValue('B11', $po->top);
        $sheet->setCellValue('I11', $po->delivery_by);
        $sheet->setCellValue('B16', $po->delivery_date);
        $sheet->setCellValue('E16', $po->quot_no);
        $sheet->setCellValue('I16', $po->pr_no);
        $sheet->setCellValue('B46', $po->note_po);
        $i = 18;
        foreach ($detail_pos as $d) {
            $sheet->setCellValue('B' . $i, $d->id_detail_po);
            $sheet->setCellValue('C' . $i, $d->uom);
            $sheet->setCellValue('D' . $i, $d->qty_po);
            if ($d->material) {
                $sheet->setCellValue('E' . $i, $d->material->part_name);
            }
            $sheet->setCellValue('I' . $i, $d->harga_po);
            $i++;
        }

        $response = new StreamedResponse(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="po_supplier.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}