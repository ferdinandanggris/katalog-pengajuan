<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
  <?php echo 
    file_get_contents("https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css")
  ?>

  html, body {
    font-size: 12px;
  }

  .green{
    background-color: #9BBB59;
  }

  .gray{
    background-color: #C0C0C0;
  }

  td{
    vertical-align: top;
  }

  </style>
    
</head>
<body>
  <header>
    <div class="container">
      <div class="row">
        <img src="img/pln.png" width="150px" style="position:absolute;margin-left:-40px" >
        <div class="col-12">
         <h4 class="text-center">Formulir Pendaftaran Katalog</h4>
        </div>
      </div>
    </div>
  </header>
  <div class="container-fluid mt-3">
    <div class="row">
      <table class="table-borderless w-100">
        <tr>
          <td >
            <table class="table-bordered w-100">
              <tr>
                <th></th>
                <th></th>
                <th>No.:</th>
              </tr>
              <tr>
                <th class="green" colspan="5">
                  1. Deskripsi dari Item Material : 
                </th>
                <th class="gray" colspan="3">
                  2. Informasi Equipment :
                </th>
              </tr>
              <tr>
                <td rowspan="2" colspan="5">
                  Nama Item Material : ....
                </td>
                <td colspan="3">
                  EGI : 
                </td>
              </tr>
              <tr>
                <td colspan="3">Component Code : ....</td>
              </tr>
              <tr>
                <td rowspan="4" colspan="5">
                  Deskripsi Detail
                </td>
                <th colspan="3">
                  Informasi Part Number :
                </th>
              </tr>
              <tr>
                <td colspan="3">Manufacture : .....</td>
              </tr>
              <tr>
                <td colspan="3">Part Number : ....</td>
              </tr>
              <tr>
                <td colspan="3"> Mand/Recd Part No : ....</td>
              </tr>
              <tr>
                <td rowspan="3" colspan="5">
                  Nama Colloquial / Istilah lain : ....
                </td>
                <th class="green" colspan="2">
                  4. Stock type :
                </th>
                <th class="green">
                  Check (v)
                </th>
              </tr>
              <tr>
                <td colspan="2">(C) Chemical</td>
                <td>.....</td>
              </tr>
              <tr>
                <td colspan="2">(F) Fuel & Oil</td>
                <td>.....</td>
              </tr>
              <tr>
                <th class="gray" colspan="5">5. Sumber Informasi :</th>
                <td colspan="2">(M) Suku cadang Mesin</td>
                <td>.....</td>
              </tr>
              <tr>
                <td colspan="5">Penyedia yang disarankan : .....</td>
                <td colspan="2">(E) Suku cadang Listrik</td>
                <td>.....</td>
              </tr>
              <tr>
                <td colspan="5">Harga perkiraan : .....</td>
                <td colspan="2">(I) Suku cadang Instrument/Control</td>
                <td>.....</td>
              </tr>
              <tr>
                <td colspan="3">Pemakaian per tahun : ....</td>
                <td rowspan="2" colspan="2">Gudang yang diperlukan : ....</td>
                <td colspan="2">(G) General/Consumables</td>
                <td>.....</td>
              </tr>
              <tr>
                <td colspan="3">Satuan :</td>
                <td colspan="2"></td>
                <td></td>
              </tr>
              <tr>
                <th colspan="8" class="gray">
                  6. Control Factor
                </th>
              </tr>
              <tr>
                <td colspan="3">
                  Dibatasi untuk : ....
                </td>
                <td rowspan="2" colspan="3">
                  Inspeksi khusus : ....
                </td>
                <td class="green" colspan="2">
                  Kritikalitas (A/B/C) : ....
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  Cross Reff : ....
                </td>
                <td colspan="2">
                  Berbahaya : ....
                </td>
              </tr>
              <tr>
                <th class="gray" colspan="8">7. Catatan :</th>
              </tr>
              <tr>
                <td colspan="8">......</td>
              </tr>
              <tr>
                <th class="gray" colspan="8">8. Informasi Detail User Terkait :</th>
              </tr>
              <tr>
                <td colspan="3">Nama : ....</td>
                <td colspan="3">Tanggal : ....</td>
                <td rowspan="2" colspan="2">TTD : ....</td>
              </tr>
              <tr>
                <td colspan="3">NID : ....</td>
                <td colspan="3"> Exp Elemen : ....</td>
              </tr>
              <tr>
                <td colspan="8" class="gray">9. Informasi Cataloguer :</td>
              </tr>
              <tr>
                <td colspan="2">PLN Group Class :</td>
                <td colspan="6">Nama Item Material :</td>
              </tr>
              <tr>
                <td>INC :</td>
                <td colspan="2">Stock Type :</td>
                <td colspan="2">Stock Class :</td>
                <th colspan="3">11. Informasi Aktivasi :</th>
              </tr>
              <tr>
                <td colspan="3">Cross Reff : ...</td>
                <td>ROP : ....</td>
                <td>ROQ : ....</td>
                <td colspan="3" rowspan="3">Catatan : ....</td>
              </tr>
              <tr>
                <td colspan="5">Master list No :</td>
              </tr>
              <tr>
                <th class="gray"> 10. Persediaan Multi Gudang :</th>
              </tr>
            </table>

          </td>
          <td width="120px" style="padding-left: 10px">
                <button class="green" style="width: 40px;height:10px"></button> Mandatory
                <button class="gray" style="width: 40px;height:10px"></button> Optional
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>