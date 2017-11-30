<?php
$this->load->view('studentPanel/html2fpdf');
$pdf=new HTML2FPDF();
$pdf->AddPage();

ob_start();
$this->load->view('studentPanel/pdfReceptViewPage');
$content = ob_get_contents();
ob_end_clean();

$pdf->WriteHTML($content);
$pdf->Output('./resource/stu_fee_pdf/recept_'.$recetno.'.pdf');

$redirect_url = str_replace('.html', '', site_url('resource/stu_fee_pdf/recept_'.$recetno.'.pdf'));
?>
<script type="text/javascript">location.replace("<?php echo $redirect_url; ?>");</script>