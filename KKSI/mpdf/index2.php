<?php
//Define relative path from this script to mPDF
$nama_file = 'Penjualan'; //Beri nama file PDF hasil.
define('_MPDF_PATH', '../mpdf60/');
//define("_JPGRAPH_PATH", '../mpdf60/graph_cache/src/');

//define("_JPGRAPH_PATH", '../jpgraph/src/'); 

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
//include(_MPDF_PATH . "graph.php");

//include(_MPDF_PATH . "graph_cache/src/");

$mpdf = new mPDF('utf-8', 'A4',  0, '', 0, 0, 0, 0, 0, 'L'); // Create new mPDF Document


//Beginning Buffer to save PHP variables and HTML tags
ob_start();

$mpdf->useGraphs = true;

?>
<!DOCTYPE html>
<html>

<head>
    <title>POS (Point Of Sales) Version 1.0.0</title>
    <style>
        {
            margin: 0;
            padding: 0;
            font-family: arial;
            font-size: 6pt;
            color: #000;
        }

        body {
            width: 100%;
            font-family: arial;
            font-size: 6pt;
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
            margin-left: 0px;
        }

        #wrapper {
            width: 44mm;
            margin: 0 0mm;
        }

        #main {
            float: left;
            width: 0mm;
            background: #ffffff;
            padding: 0mm;
        }

        #sidebar {
            float: right;
            width: 0mm;
            background: #ffffff;
            padding: 0mm;
        }

        .page {
            height: 200mm;
            width: 44mm;
            page-break-after: always;
        }

        table {
            /** border-left: 1px solid #fff;
            border-top: 1px solid #fff; **/
            font-family: arial;
            border-spacing: 0;
            border-collapse: collapse;

        }

        table td {
            /**border-right: 1px solid #fff;
            border-bottom: 1px solid #fff;**/
            padding: 2mm;

        }

        table.heading {
            height: 0mm;
            margin-bottom: 1px;
        }

        h1.heading {
            font-size: 6pt;
            color: #000;
            font-weight: normal;
            font-style: italic;


        }

        h2.heading {
            font-size: 6pt;
            color: #000;
            font-weight: normal;
        }

        hr {
            color: #ccc;
            background: #ccc;
        }

        #invoice_body {
            height: auto;
        }

        #invoice_body,
        #invoice_total {
            width: 100%;
        }

        #invoice_body table,
        #invoice_total table {
            width: 100%;
            /** border-left: 1px solid #ccc;
            border-top: 1px solid #ccc; **/

            border-spacing: 0;
            border-collapse: collapse;

            margin-top: 0mm;
        }

        #invoice_body table td,
        #invoice_total table td {
            text-align: center;
            font-size: 8pt;
            /** border-right: 1px solid black;
            border-bottom: 1px solid black;**/
            padding: 0 0;
            font-weight: normal;
        }

        #invoice_head table td {
            text-align: left;
            font-size: 8pt;
            /** border-right: 1px solid black;
            border-bottom: 1px solid black;**/
            padding: 0 0;
            font-weight: normal;
        }

        #invoice_body table td.mono,
        #invoice_total table td.mono {
            text-align: right;
            padding-right: 0mm;
            font-size: 6pt;
            border: 1px solid white;
            font-weight: normal;
        }

        #footer {
            width: 44mm;
            margin: 0 2mm;
            padding-bottom: 1mm;
        }

        #footer table {
            width: 100%;
            /** border-left: 1px solid #ccc;
            border-top: 1px solid #ccc; **/

            background: #eee;

            border-spacing: 0;
            border-collapse: collapse;
        }

        #footer table td {
            width: 25%;
            text-align: center;
            font-size: 8pt;
            /** border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;**/
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <?php include "session.php"; ?>

        <div id="invoice_head">
            <table style="width:100%; border-spacing:0;">
                <tr>
                    <td style="font-size: 6pt; font-weight: bold;">
                        <!-- <img src="<?php // echo $_SESSION['gambar']; 
                                        ?>" height="40" width="160" />--> <b><?php echo $_SESSION['nama_toko']; ?></b></td>
                    <td style="text-align:right;">
                        <p style="text-align:right; font-size: 14px; font-weight:bold; border-bottom: black; border-top: black; border-right: black; border-left: black; "></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p style="text-align:left; font-size: 6pt; font-weight: bold;">Alamat : <?php echo $_SESSION['alamat']; ?> </p>
                    </td>
                    <!--<td style="text-align:right;" rowspan="2" ><p style="font-size: 6pt; font-weight: bold;"><u></u></p> </td>-->
                </tr>
                <tr>
                    <td>
                        <p style="text-align:left; font-size: 6pt; font-weight: bold; font-family: sans-serif;;">Telp : <?php echo $_SESSION['no_hp']; ?></p>
                    </td>

                </tr>
                <tr style="margin-top: 1px;">
                    <td>
                        <p style="text-align:left; font-size: 6pt; margin-top: 1px; font-weight: bold;"></p>
                    </td>
                    <td style="text-align:right;">
                        <p style="font-size: 6pt; font-weight: bold;">
                            <!--<img style="margin-top: 5px;" alt="<?php //$data['no_invoice'];
                                                                    ?>" src="<?php //echo "barcode.php?size=15&text=DLV$_GET[id]"; 
                                                                                                        ?>" /> </td>-->
                </tr>
                <tr>
                    <td style="border-bottom: 2px solid black;" colspan="2"></td>
                </tr>

            </table>
        </div>

        <table class="heading" style="width:100%;">
            <tr>
                <td>
                    <center>
                        <p style="text-align:center; font-size: 6pt; font-weight:bold;">NOTA PENJUALAN</p>
                    </center>
                </td>
            </tr>
            <!--<tr>
        <td> <center><p style="text-align:center; font-size: 14px; font-weight:bold;">Aplikasi Point Of Sales</p></center></td>
        </tr>-->
        </table>
        <?php
        $query = mysqli_query($koneksi, "SELECT SUM(profit) AS pro, SUM(total) AS tot, no_trans, tanggal_trans FROM transaksi WHERE no_trans='$_GET[id]'");
        $data  = mysqli_fetch_array($query);
        ?>
        <table>
            <tr>
                <td>
                <td>
                    <p style="text-align:left; font-size: 6pt; font-weight:bold;">No Transaksi : <?php echo $data['no_trans']; ?> </p>
                </td>
                </td>
                <td>
                <td>
                    <p style="text-align:left; font-size: 6pt; font-weight:bold;">Tanggal : <?php echo $data['tanggal_trans']; ?> </p>
                </td>
                </td>
            </tr>
        </table>

        <div id="content">

            <div id="invoice_body">
                <?php
                $query1 = "SELECT detail_transaksi.*, produk.* 
                    FROM detail_transaksi 
                    LEFT JOIN produk ON detail_transaksi.kd_produk=produk.kd_produk
                    WHERE detail_transaksi.no_trans='$_GET[id]'";

                $tampil = mysqli_query($koneksi, $query1) or die(mysqli_error());
                ?>
                <table border="1">

                    <tr>
                        <!--<td style="width:10%; font-size: 6pt;"><b>No</b></td>-->
                        <!--<td style="width:15%;"><b>Kode</b></td>-->
                        <td style="width:40%; font-size: 6pt;"><b>Nama Produk</b></td>
                        <td style="width:25%; font-size: 6pt;"><b>Harga</b></td>
                        <td style="width:10%; font-size: 6pt;"><b>Qty</b></td>
                        <td style="width:25%; font-size: 6pt;"><b>Jumlah</b></td>
                    </tr>
                    <?php
                    $no = 0;
                    while ($data1 = mysqli_fetch_array($tampil)) {
                        $no++;
                        $a = $data1['harga_jual'];
                        $b = $data1['qty'];
                        $total = $a * $b;
                    ?>
                        <tr border="0">
                            <!--<td style="width:10%; text-align: center;" class="mono"><b><?php //echo $no; 
                                                                                            ?></b></td>-->
                            <!--<td style="width:15%; text-align: center;" class="mono"><b><?php //echo $data1['kd_produk']; 
                                                                                            ?></b></td>-->
                            <td style="width:40%; text-align: left;" class="mono"><b><?php echo $data1['nama_produk']; ?></b></td>
                            <td style="width:25%;" class="mono"><b>Rp.<?php echo number_format($data1['harga_jual'], 0, ",", "."); ?></b></td>
                            <td style="width:10%; text-align: center;" class="mono"><b><?php echo $data1['qty']; ?></b></td>
                            <td style="width:25%;" class="mono"><b>Rp.<?php echo number_format($total, 0, ",", "."); ?></b></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <div id="invoice_total">
                <table border="1">
                    <tr>
                        <td colspan="3" style="width:10%; font-size: 6pt;" class="mono"><b>
                                <center>Total
                            </b></center>
                        </td>
                        <td colspan="2" style="width:15%; font-size: 6pt;" class="mono"><b>Rp.<?php echo number_format($data['tot'], 0, ",", "."); ?></b></td>
                    </tr>
                </table>
            </div>

            <div id="invoice_total">
                <table border="1">
                    <tr>
                        <td style="text-align: left; border: 1px solid white;"><b></b></td>
                        <td style="width:20%; border: 1px solid white;" class="mono"><b>
                                <center>
                            </b></center>
                        </td>
                        <td style="width:15%; border: 1px solid white;" class="mono"><b></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; font-size: 6pt; border: 1px solid white;"><b>PERHATIAN : 1. Nota ini adalah bukti pembelian barang</b></td>
                        <td colspan="2" style="width:10%; font-size: 6pt; border: 1px solid white;" class="mono"><b>
                                <center>Kasir : <?php echo $_SESSION['fullname']; ?>
                            </b></center>
                        </td>

                    </tr>
                    <?php
                    $tot1 = $data['tot'];
                    $tot2 = $data['diskon'];
                    $tot3 = $tot1 - $tot2;
                    ?>
                    <tr>
                        <td style="text-align: left; font-size: 6pt; border: 1px solid white;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Barang yang sudah dibeli tidak dapat di tukar atau dikembalikan.</b></td>
                        <td style="width:10%; font-size: 6pt; border-left: 1px solid white; border-right: 1px solid white; border-bottom: 1px solid white; border-top: 1px solid white;" class="mono"><b>
                                <center>
                            </b></center>
                        </td>
                        <td style="width:15%; border: 1px solid white;" class="mono"><b></b></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left; border: 1px solid white;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td style="text-align:left; font-size: 6pt; font-weight: bold;"><b>Terima kasih sudah berbelanja di "<?php echo $_SESSION['nama_toko']; ?>" </b></td>
                        <td style="text-align:left; font-size: 6pt; font-weight: bold;"></td>
                        <td colspan="2" style="text-align:center; font-size: 10px; font-weight: bold;"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left; font-size: 6pt; font-weight: normal;"><i></i></td>
                        <td style="text-align:left; font-size: 6pt; font-weight: bold;"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:left; font-size: 6pt;"><b></b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:center; font-size: 6pt; font-weight: bold;"></td>
                    </tr>
                </table>
            </div>

        </div>
        <br />
    </div>

    <?php

    $html = ob_get_contents(); //Proses untuk mengambil data
    ob_end_clean();
    //Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
    $mpdf->WriteHTML(utf8_encode($html));
    // LOAD a stylesheet
    $stylesheet = file_get_contents('mpdfstyletables.css');
    $mpdf->WriteHTML($stylesheet, 1);    // The parameter 1 tells that this is css/style only and no body/html/text

    $mpdf->WriteHTML($html, 1);

    $mpdf->Output($nama_file . "-" . date("Y/m/d H:i:s") . ".pdf", 'I');




    exit;
    ?>
</body>

</html>