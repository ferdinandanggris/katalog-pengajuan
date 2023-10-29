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
  th.rotate {
  /* Something you can count on */
  height:20px;
  white-space: nowrap;
}

.row-bordered{
  border: 1px solid black !important;
}
.row-border-left{
  border-left: 1px solid black !important;
}
.row-border-right{
  border-right: 1px solid black !important;
}
.row-border-top{
  border-top: 1px solid black !important;
}

.row-border-bottom{
  border-bottom: 1px solid black !important;
}
.row-double-bordered{
  border : double !important;
}

.rotate {
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  width: 1.5em;
}
.rotate div {
     -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
       -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
  -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
         -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
         margin-left: -10em;
         margin-right: -10em;
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
            <table class="table-borderless w-100">
              <tr>
                <th colspan="7"></th>
                <th class="row-bordered" colspan="2">No.: {{$data->no}}</th>
              </tr>
              <tr>
                <th rowspan="23" class="rotate row-bordered" ><div>USER TERKAIT</div></th>
                <th class="green row-border-top row-border-left" colspan="5">
                  1. Deskripsi dari Item Material : 
                </th>
                <th class="gray row-border-top row-border-left row-border-right" colspan="3">
                  2. Informasi Equipment :
                </th>
              </tr>
              <tr>
                <td rowspan="2" class="row-border-left row-border-bottom row-border-right" colspan="5">
                  Nama Item Material : {{$data->item}}
                </td>
                <td colspan="3" class="row-border-left row-border-bottom row-border-right">
                  EGI : {{$data->egi}}
                </td>
              </tr>
              <tr>
                <td colspan="3" class="row-bordered">Component Code : {{$data->component_code}}</td>
              </tr>
              <tr>
                <td rowspan="4" class="row-bordered" colspan="5">
                  Deskripsi Detail : 
                  <ul>
                  @foreach ($data->deskripsi_detail as $detail)
                        <li class="my-0 py-0">{{$detail['label']}} : {{$detail['value']}}</li>
                  @endforeach
                  </ul>
                </td>
                <th colspan="3" class="row-border-left row-border-right green">
                  Informasi Part Number :
                </th>
              </tr>
              <tr>
                <td colspan="3" class="row-border-bottom row-border-right">Manufacture : {{$data->manufacturer}}</td>
              </tr>
              <tr>
                <td colspan="3" class="row-bordered">Part Number : {{$data->part_number}}</td>
              </tr>
              <tr>
                <td colspan="3" class="row-bordered"> Mand/Recd Part No : {{$data->recd_part_no}}</td>
              </tr>
              <tr>
                <td rowspan="3" class="row-bordered" colspan="5">
                  Nama Colloquial / Istilah lain : ....
                </td>
                <th class="green row-border-left row-border-right" colspan="2">
                  4. Stock type :
                </th>
                <th class="green row-border-left row-border-right">
                  Check (v)
                </th>
              </tr>
              <tr>
                <td colspan="2" class="row-border-left row-border-bottom row-border-right">(C) Chemical</td>
                <td class="row-border-bottom row-border-right text-center">{{$list_stock_type["(C) Chemical"] == $data->stock_type ? 'V' : ''}}</td>
              </tr>
              <tr>
                <td colspan="2" class="row-bordered">(F) Fuel & Oil</td>
                <td class="row-bordered text-center">{{$list_stock_type["(F) Fuel & Oil"] == $data->stock_type ? 'V' : ''}}</td>
              </tr>
              <tr>
                <th class="gray" class="row-bordered" colspan="5">5. Sumber Informasi :</th>
                <td colspan="2">(M) Suku cadang Mesin</td>
                <td class="row-bordered text-center">{{$list_stock_type["(M) Suku cadang Mesin"] == $data->stock_type ? 'V' : ''}}</td>
              </tr>
              <tr>
                <td colspan="5" class="row-bordered">Penyedia yang disarankan : {{$data->penyedia_yang_disarankan}}</td>
                <td colspan="2" class="row-bordered">(E) Suku cadang Listrik</td>
                <td class="row-bordered text-center">{{$list_stock_type["(E) Suku cadang Listrik"] == $data->stock_type ? 'V' : ''}}</td>
              </tr>
              <tr>
                <td colspan="5" class="row-bordered">Harga perkiraan : {{"Rp " . number_format($data->harga_perkiraan,2,',','.');}}</td>
                <td colspan="2" class="row-bordered">(I) Suku cadang Instrument/Control</td>
                <td class="row-bordered text-center">{{$list_stock_type["(I) Suku cadang Instrument/Control"] == $data->stock_type ? 'V' : ''}}</td>
              </tr>
              <tr>
                <td colspan="3" class="row-bordered">Pemakaian per tahun : {{$data->pemakaian_per_tahun}}</td>
                <td rowspan="2" class="row-bordered" colspan="2">Gudang yang diperlukan : {{$data->gudang_yang_diperlukan}}</td>
                <td colspan="2" class="row-bordered">(G) General/Consumables</td>
                <td class="row-bordered text-center">{{$list_stock_type["(G) General/Consumables"] == $data->stock_type ? 'V' : ''}}</td>
              </tr>
              <tr>
                <td colspan="3" class="row-bordered">Satuan : {{$data->satuan}}</td>
                <td colspan="2" class="row-bordered"></td>
                <td class="row-bordered"></td>
              </tr>
              <tr>
                <th colspan="8" class="gray row-border-left row-border-right">
                  6. Control Factor
                </th>
              </tr>
              <tr>
                <td colspan="3" class="row-border-left row-border-bottom row-border-right">
                  Dibatasi untuk : {{$data->dibatasi_untuk}}
                </td>
                <td rowspan="2" colspan="3" class="row-border-left row-border-bottom row-border-right">
                  Inspeksi khusus : {{$data->inspeksi_khusus}}
                </td>
                <td class="green" colspan="2" class="row-border-left row-border-bottom row-border-right">
                  Kritikalitas (A/B/C) : {{$data->kritikalitas}}
                </td>
              </tr>
              <tr>
                <td class="row-bordered" colspan="3">
                  Cross Reff : {{$data->cross_reff}}
                </td>
                <td class="row-bordered" colspan="2">
                  Berbahaya : {{$data->berbahaya}}
                </td>
              </tr>
              <tr>
                <th class="row-border-left row-border-right gray" colspan="8">7. Catatan :</th>
              </tr>
              <tr>
                <td class="row-border-left row-border-right row-border-bottom" colspan="8">......</td>
              </tr>
              <tr>
                <th class="row-border-left row-border-right gray" colspan="8">8. Informasi Detail User Terkait :</th>
              </tr>
              <tr>
                <td class="row-border-left row-border-bottom row-border-right" colspan="3">Nama : {{$data->nama_pengaju}}</td>
                <td class="row-border-left row-border-bottom row-border-right" colspan="3">Tanggal : {{$data->tanggal_pengajuan}}</td>
                <td rowspan="2" class="row-border-left row-border-bottom row-border-right" colspan="2">TTD : ....</td>
              </tr>
              <tr>
                <td class="row-bordered" colspan="3">NID : ....</td>
                <td class="row-bordered" colspan="3"> Exp Elemen : ....</td>
              </tr>
              <tr>
                <th rowspan="9" class="rotate row-bordered"><div>CATALOGUER</div></th>
                <th class="row-border-left row-border-right gray" colspan="8">9. Informasi Cataloguer :</th>
              </tr>
              <tr>
                <td class="row-border-left row-border-right row-border-bottom" colspan="2" style="height: 50px;">PLN Group Class : ....</td>
                <td class="row-border-left row-border-right row-border-bottom" colspan="6">Nama Item Material :</td>
              </tr>
              <tr>
                <td class="row-bordered">INC :</td>
                <td class="row-bordered" colspan="2">Stock Type :</td>
                <td class="row-bordered" colspan="2">Stock Class :</td>
                <th class="row-border-left row-border-right gray" colspan="3">11. Informasi Aktivasi :</th>
              </tr>
              <tr>
                <td class="row-bordered" colspan="3">Cross Reff : ...</td>
                <td>ROP : ....</td>
                <td>ROQ : ....</td>
                <td class="row-border-left row-border-bottom row-border-right" colspan="3" rowspan="2">Catatan : ....</td>
              </tr>
              <tr>
                <td class="row-bordered" colspan="5">Master list No :</td>
              </tr>
              <tr>
                <th class="gray row-border-left row-border-right row-border-top" colspan="8"> 10. Persediaan Multi Gudang :</th>
              </tr>
              <tr>
                <td class="row-border-bottom row-border-left row-border-right" colspan="2">Gudang : ....</td>
                <td class="row-border-bottom row-border-left row-border-right">Bin : ....</td>
                <td class="row-border-bottom row-border-left row-border-right">Min : ....</td>
                <td class="row-border-bottom row-border-left row-border-right">Max : ....</td>
                <td colspan="3" class="row-border-bottom row-border-left row-border-right" >Lead Time : ....</td>
              </tr>
              <tr>
                <td class="row-bordered" colspan="3" rowspan="2">Nama Cataloguer : ....</td>
                <td class="row-border-right row-border-bottom" colspan="2">Tanggal : ....</td>
                <td class="row-border-bottom row-border-right row-border-left" colspan="3" rowspan="2">Nomor Helpdesk : ....</td>
              </tr>
              <tr>
                <td class="row-border-right row-border-left row-border-bottom row-border-top" colspan="2" style="height: 50px">TTD : .....</td>
              </tr>
              <tr>
                <td colspan="5"></td>
                <th class="row-bordered" colspan="4">12. Stock Code : ....</th>
              </tr>
            </table>

          </td>
          <td width="120px" style="padding-left: 10px">
              <div class="m-auto">
                <button class="green" style="width: 40px;height:10px"></button> Mandatory
              </div>
              <div class="m-auto">
                <button class="gray" style="width: 40px;height:10px"></button> Optional
              </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>