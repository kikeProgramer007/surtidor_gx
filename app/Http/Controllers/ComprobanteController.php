<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use FPDF;
use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    public function generarPDF($venta_id)
    {
      // Obtener la venta desde la base de datos
    $venta = Venta::with(['bomba.tanque.combustible', 'vehiculo', 'empleado'])->findOrFail($venta_id);

    // Nombre del combustible
    $nombreCombustible = $venta->bomba->tanque->combustible->nombre ?? 'No disponible';
    $precio = $venta->bomba->tanque->combustible->precio ?? 'No disponible';

    // Otros datos
    $placaVehiculo = $venta->vehiculo->placa ?? 'No disponible';

    // Datos del empleado (nombre completo)
    $empleadoNombre = isset($venta->empleado)? $venta->empleado->nombre . ' ' . $venta->empleado->paterno . ' ' . $venta->empleado->materno : 'No asignado';

    // Datos del cliente (nombre completo)
    $cliente = isset($venta->vehiculo->cliente) ? $venta->vehiculo->cliente->nombre . ' ' . $venta->vehiculo->cliente->paterno . ' ' . $venta->vehiculo->cliente->materno : 'No disponible';

    // Crear una instancia de FPDF
    $pdf = new FPDF('P', 'mm', [80, 200]); // 80mm de ancho, altura ajustable
    $pdf->AddPage();
    $pdf->SetMargins(5, 5, 5); // Márgenes ajustados
    $pdf->SetFont('Arial', '', 8);

    // Encabezado del ticket
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 5, 'Surtidor MONTERO S.R.L', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(0, 5, 'CASA MATRIZ', 0, 1, 'C');
    $pdf->Cell(0, 5, 'Carr. Santa Cruz-Trinidad KM150 S. Julian', 0, 1, 'C');
    $pdf->Cell(0, 5, 'Telefono: 3-3297021', 0, 1, 'C');
    $pdf->Cell(0, 5, 'Montero - Santa Cruz - Bolivia', 0, 1, 'C');
    $pdf->Ln(2);

    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 5, 'FACTURA', 0, 1, 'C');

    $pdf->Ln(3);

    // Información del cliente y la venta
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(15, 5, 'Fecha:', 0, 0, 'L');
    $pdf->Cell(60, 5, $venta->fecha, 0, 1, 'L');

    $pdf->Cell(15, 5, 'Cliente:', 0, 0, 'L');
    $pdf->Cell(60, 5, $cliente ?? 'No registrado', 0, 1, 'L');

    $pdf->Cell(15, 5, 'Placa:', 0, 0, 'L');
    $pdf->Cell(60, 5, $venta->vehiculo->placa ?? 'No disponible', 0, 1, 'L');
    $pdf->Ln(2);

    // Detalles de la venta
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(25, 5, 'COMBUSTIBLE', 1, 0, 'C');
    $pdf->Cell(15, 5, 'CANT.', 1, 0, 'C');
    $pdf->Cell(15, 5, 'PRECIO', 1, 0, 'C');
    $pdf->Cell(15, 5, 'SUBTOTAL', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(25, 5, $nombreCombustible, 1, 0, 'C');
    $pdf->Cell(15, 5, number_format($venta->cantidad, 2) . ' Lts', 1, 0, 'C');
    $pdf->Cell(15, 5, number_format($precio, 2), 1, 0, 'C');
    $pdf->Cell(15, 5, number_format($venta->monto_total, 2), 1, 1, 'C');
    $pdf->Ln(2);

    // Totales
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(45, 5, 'TOTAL:', 0, 0, 'R');
    $pdf->Cell(25, 5, 'Bs. ' . number_format($venta->monto_total, 2), 0, 1, 'R');
    $pdf->Ln(2);

    // Información adicional
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(20, 5, 'Tipo de Pago:', 0, 0, 'L');
    $pdf->Cell(60, 5, ucfirst($venta->tipo_pago), 0, 1, 'L');

    $pdf->Cell(20, 5, 'Empleado:', 0, 0, 'L');
    $pdf->Cell(60, 5, $empleadoNombre, 0, 1, 'L');
    $pdf->Ln(2);

    // Nota legal
    $pdf->SetFont('Arial', 'I', 6);
    $pdf->Cell(0, 4, '"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS"', 0, 1, 'C');
    $pdf->Cell(0, 4, 'EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY', 0, 1, 'C');
    $pdf->Ln(2);


        // Configurar las cabeceras para PDF
        header('Content-Type: application/pdf'); // Indica que el contenido es un PDF
        header('Content-Disposition: inline; filename="comprobante_venta.pdf"'); // Se mostrará en línea
        header('Cache-Control: private, max-age=0, must-revalidate'); // Evita problemas de caché
       
        // Generar y mostrar el PDF
       $pdf->Output('I', 'comprobante_venta.pdf');
       exit;
    }
}
