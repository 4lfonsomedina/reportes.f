<?php 
function dame_fecha($datetime){
  return explode(" ", $datetime)[0];
}
function dame_hora($datetime){
  return explode(" ", $datetime)[1];
}
function dame_sucursal($id_sucursal){
  if($id_sucursal==1){ echo "Brasil"; }
  if($id_sucursal==2){ echo "San Marcos"; }
  if($id_sucursal==3){ echo "GastroShop"; }
}
function folio_solicitud($folio){
  return str_pad($folio, 6, "0", STR_PAD_LEFT);
}


function split_pdf($filename, $dir = false) {
	error_reporting(E_ALL ^ E_DEPRECATED);
    require_once(getcwd().'/application/libraries/leerpdf/Fpdf.php');
    require_once(getcwd().'/application/libraries/leerpdf/Fpdi.php');
    
    $dir = $dir ? $dir : './';
	$filename = $dir.$filename;
	$pdf = new FPDI();
	$pagecount = $pdf->setSourceFile($filename);	
	
    // Split each page into a new PDF
    for ($i = 1; $i <= $pagecount; $i++) {
       $new_pdf = new FPDI();
       $new_pdf->AddPage();
       $new_pdf->setSourceFile($filename);
       $new_pdf->useTemplate($new_pdf->importPage($i));		
       try {
          $new_filename = str_replace('.pdf','', $filename).'_'.$i.".pdf";
          $new_pdf->Output($new_filename, "F");
          //echo "Page ".$i." split into ".$new_filename."<br />\n";
       } catch (Exception $e) {
          //echo 'Caught exception: ',  $e->getMessage(), "\n";
       }
    }
}

function html_imagen($html){
  //ImageCall.php -- This script will call a script to produce the image.
for($next = 1;$next < 4; $next++){
print "Image $next:<br>";
print "<img src = 'Image.php?\$text=$next'>";
print "<br><br>";
}
?>

<?php
//Image.php -- This script creates a square image and places the text on it.

// image size and color
$im = ImageCreate(77,77);
$color1 = ImageColorAllocate($im,0x66,0xCC,0x00);
$color2 = ImageColorAllocate($im,0x33,0x66,0x00);
$color3 = ImageColorAllocate($im,0x00,0x99,0x00);
$color4 = ImageColorAllocate($im,0x3D,0x3D,0x3D);

// image creation
ImageFilledRectangle($im,1,1,76,76,$color1);
ImageFilledpolygon($im, array (76,1,1,76,76,76),3,$color2);
ImageFilledRectangle($im,5,5,72,72,$color3);

// determine numeric center of image
$size = ImageTTFBBox(45,0,'impact',$_GET['$text']);
$X = (77 - (abs($size[2]- $size[0])))/2;
$Y = ((77 - (abs($size[5] - $size[3])))/2 + (abs($size[5] - $size[3])));

//places numeric information on image
ImageTTFText($im,45,0,($X-1),$Y,$color4,'impact',$_GET['$text']);

//returns completed image to calling script
Header('Content-Type: image/png');
Imagejpeg($im);
  /*
  error_reporting(E_ALL ^ E_DEPRECATED);
  require_once(getcwd()."/application/libraries/pdfcrowd/pdfcrowd.php");
  
  try{
      // create the API client instance
      $client = new \Pdfcrowd\HtmlToImageClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");
      // configure the conversion
      $client->setOutputFormat("png");
      // run the conversion and write the result to a file
      //$client->convertUrlToFile("http://www.example.com", "example.png");
      $client->convertStringToFile($html, "HelloWorld.png");
  }
  catch(\Pdfcrowd\Error $why){
      // report the error
      error_log("Pdfcrowd Error: {$why}\n");
      // rethrow or handle the exception
      throw $why;
  }
  */
}

function parsePostPDF($ruta)
 {
 	require_once(getcwd().'/application/libraries/leerpdf/PdfToText-master/PdfToText.phpclass');
  //require_once(getcwd().'/application/libraries/class.pdf2text.php');
  require_once(getcwd().'/application/libraries/class.pdf2text.php');
 	$files = glob($ruta.'*');
 	$contador=0;
 	$r = array();

 	foreach($files as $file){
 		$pdf = new PdfToText($file);
    echo strlen((string)$pdf);
    if(strlen((string)$pdf)<100){
      $a = new PDF2Text();
      $a->setFilename($file); 
      $a->decodePDF();var_dump($a);
      echo $a->output();
    }

    $cadena_PDF=(string)$pdf;

 		$r[$contador]['cuenta'] = explode(" ",explode("sito:", (string)$pdf )[1])[0];
 		$r[$contador]['nombre'] = explode("Dato no",explode(" Fecha",explode("cuenta:", (string)$pdf )[4])[0])[0];
 		$r[$contador]['pagina'] = explode("/",$file)[6];
 		$contador++;
 	}
 	return $r;
 }

function limpiar_carpeta($ruta){
	$files = glob($ruta.'*');
	foreach($files as $file){ 
	  if(is_file($file))
	    unlink($file);
	}
}



?>