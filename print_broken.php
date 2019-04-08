<?php
	function generateRow(){
		$contents = '';
		include_once('connect.php');
		$sql = "SELECT * FROM broken";

		//use for MySQLi OOP
		$query = $connect->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td>".$row['product_id']."</td>
				<td>".$row['type']."</td>
				<td>".$row['quantity']."</td>
				<td>".$row['broken_by']."</td>
				<td>".$row['description']."</td>
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center"> Elab Broken Equipments</h2>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="10%">Product ID</th>
				<th width="20%">Type</th>
				<th width="20%">Quantity</th>
				<th width="20%">Description</th>
				<th width="30%">Date</th>  
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('returned.pdf', 'I');
	

?>