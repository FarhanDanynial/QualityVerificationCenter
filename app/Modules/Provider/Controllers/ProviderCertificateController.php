<?php

namespace App\Modules\Provider\Controllers;

use TCPDF;
use Mpdf\Mpdf;
use setasign\Fpdi\Fpdi;
use App\Models\SamcModel;
use Spatie\PdfToImage\Pdf;
use App\Models\ProviderModel;
use App\Controllers\BaseController;

class ProviderCertificateController extends BaseController
{

    protected $provider_model;
    protected $samc_model;
    protected $mpdf;

    public function __construct()
    {
        $this->session = service('session');
        $this->provider_model                   = new ProviderModel();
        $this->samc_model                       = new SamcModel();
        // $this->mpdf                             = new Mpdf(['format' => 'A4', 'orientation' => 'P']);
    }
    // Handle form submission (Submit)
    // public function sgenerate_certificate()
    // {

    //     // Path to the PDF template
    //     $pdfPath = ROOTPATH . 'public/assets/pdf/certificate.pdf';

    //     // Initialize FPDI
    //     $pdf = new Fpdi();
    //     $pdf->AddPage();
    //     $pdf->setSourceFile($pdfPath);

    //     // Import the first page of the PDF
    //     $tplIdx = $pdf->importPage(1);
    //     $pdf->useTemplate($tplIdx, 0, 0, 210, 297); // A4 size (210mm x 297mm)

    //     // Set font
    //     $pdf->SetFont('Arial', 'B', 16);
    //     $pdf->SetTextColor(0, 0, 0); // Black color

    //     // Position and write text
    //     $pdf->SetXY(80, 150);
    //     $pdf->Cell(50, 10, 'John Doe', 0, 1, 'C');

    //     // Output the PDF
    //     return $this->response
    //         ->setHeader('Content-Type', 'application/pdf')
    //         ->setBody($pdf->Output('certificate.pdf', 'I'));
    // }

    public function generate_certificate()
    {
        $pdfPath = ROOTPATH . 'public/assets/pdf/certificate.pdf';
        $imagePath = ROOTPATH . 'public/assets/images/certificate.png';

        // Convert PDF to PNG
        $pdf = new Pdf($pdfPath);
        $pdf->saveImage($imagePath);

        echo "PDF converted to PNG: <a href='" . base_url('assets/images/certificate.png') . "'>View Image</a>";
    }
}
