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

.title{
  font-weight: bold !important;
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

.vertical-middle{
  vertical-align: middle !important;
}
  </style>
    
</head>
<body>
  <header>
    <div class="container">
      <div class="row">
        <img src="img/pln.png" width="150px" style="position:absolute;margin-left:-40px" >
        <div class="col title" style="margin-left:110px">
         <p class="text-left fw-bold mb-0" style="font-size:14px">PT PEMBANGKITAN JAWA BALI</p>
         <p class="text-left fw-bold my-0 py-0" style="font-size:14px">FORMULIR MODIFIKASI KATALOG</p>
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
                <th colspan="6"></th>
                <th class="row-bordered" colspan="3">1. Stock Code : {{$data->stock_code}}</th>
              </tr>
              <tr>
                <th rowspan="24" class="rotate row-bordered" ><div>USER TERKAIT</div></th>
                <th class="row-bordered text-center" colspan="8"><i>Masukkan Data hanya pada kolom yang akan diubah !</i></th>
              </tr>
              <tr>
                <th class="green row-border-top row-border-left" colspan="8">
                  2. Catatan Penghapusan Item Material :
                </th>
              </tr>
              <tr>
                <th class="row-border-bottom row-border-right row-border-left vertical-middle align-middle" colspan="5">
                  &nbsp;&nbsp;<input type="checkbox" name="" id="" {{$data->catatan_penghapusan == 'A' ? 'checked' : ''}} style="transform: scale(1.9)">&nbsp;&nbsp;&nbsp;&nbsp; <span>a. Dipakai sampai habis, lalu dihapus</span>
                </th>
                <th class="row-border-bottom row-border-left row-border-right" colspan="3">
                  &nbsp;&nbsp;<input type="checkbox" name="" id="" {{$data->catatan_penghapusan == 'C' ? 'checked' : ''}} style="transform: scale(1.9)">&nbsp;&nbsp;&nbsp;&nbsp; <span> c. Dihapuskan tanpa catatan  
                </th>
              </tr>
              <tr>
                <th class="row-border-top row-bordered" colspan="8">
                  &nbsp;&nbsp;<input type="checkbox" name="" id="" {{$data->catatan_penghapusan == 'B' ? 'checked' : ''}} style="transform: scale(1.9)">&nbsp;&nbsp;&nbsp;&nbsp;<span> b. {{$data->catatan_penghapusan == 'B' ?  $data->catatan_penghapusan_teks :"Dipindah ke..       , dengan pembebanan.. "}}
                </th>
              </tr>
              <tr>
                <th class="green row-border-top row-border-left" colspan="5">
                  3. Deskripsi dari Item Material : 
                </th>
                <th class="gray row-border-top row-border-left row-border-right" colspan="2">
                  4. Informasi Equipment :
                </th>
                <th class="gray row-border-top row-border-left row-border-right" colspan="1">
                  Add/Del
                </th>
              </tr>
              <tr>
                <td rowspan="2" class="row-border-left row-border-bottom row-border-right" colspan="5">
                  Nama Item Material : {{$data->item}}
                </td>
                <td colspan="2" class="row-border-left row-border-bottom row-border-right">
                  EGI : {{$data->egi}}
                </td>
                <td colspan="1" class="row-border-left row-border-bottom row-border-right">
                  
                </td>
              </tr>
              <tr>
                <td colspan="2" class="row-bordered">Component Code : {{$data->component_code}}</td>
                <td colspan="1" class="row-border-left row-border-bottom row-border-right">
                </td>
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
                <td colspan="2" class="row-border-left row-border-bottom row-border-right">
                  EGI : ...
                </td>
                <td colspan="1" class="row-border-left row-border-bottom row-border-right">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="row-bordered">Component Code : ....</td>
                <td colspan="1" class="row-border-left row-border-bottom row-border-right">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="row-border-left row-border-bottom row-border-right">
                  EGI : ...
                </td>
                <td colspan="1" class="row-border-left row-border-bottom row-border-right">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="row-bordered">Component Code : ....</td>
                <td colspan="1" class="row-border-left row-border-bottom row-border-right">
                </td>
              </tr>
              <tr>
                <td rowspan="2" class="row-bordered" colspan="5">
                  Nama Colloquial / Istilah lain : ....
                </td>
                <th class="green row-border-left row-border-right" colspan="2">
                  5. Informasi Part Number :  
                </th>
                <th class="green row-border-top row-border-right" colspan="1">
                  Add/Del
                </th>
              </tr>
              <tr>
                <td class="row-border-left row-border-bottom row-border-right" style="height: 50px;"> Manufacture : {{$data->manufacturer}}</td>
                <td class="row-border-left row-border-bottom row-border-right" style="height: 50px;"> Part Number : {{$data->part_number}}</td>
                <th class="row-border-bottom row-border-left row-border-right" colspan="1" >
                  ....
                </th>
              </tr>
              <tr>
                <th class="gray" class="row-bordered" colspan="5">5. Sumber Informasi :</th>
                <td class="row-border-left row-border-bottom row-border-right" rowspan="2" style="height: 50px;">....</td>
                <td class="row-border-left row-border-bottom row-border-right" rowspan="2" style="height: 50px;">....</td>
                <th class="row-border-bottom row-border-left row-border-right" rowspan="2" colspan="1" >
                  ....
                </th>
              </tr>
              <tr>
                <td class="row-border-left row-border-bottom row-border-right" colspan="5"> Pemakaian per tahun : {{$data->pemakaian_per_tahun}}</td>
              </tr>
              <tr>
                <td class="row-bordered" colspan="5">Satuan : {{$data->satuan}}</td>
                <td class="row-border-left row-border-bottom row-border-right" rowspan="2" style="height: 50px;"> ...</td>
                <td class="row-border-left row-border-bottom row-border-right" rowspan="2" style="height: 50px;"> ....</td>
                <th class="row-border-bottom row-border-left row-border-right" rowspan="2" colspan="1" >
                  ....
                </th>
              </tr>
              <tr>
                <td class="row-bordered" colspan="5"> Gudang yang diperlukan : {{$data->gudang_yang_diperlukan}}</td>
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
                <th class="row-border-left row-border-right green" colspan="8">7. Catatan :</th>
              </tr>
              <tr>
                <td class="row-border-left row-border-right row-border-bottom" colspan="8" style="height: 50px;">......</td>
              </tr>
              <tr>
                <th class="row-border-left row-border-right green" colspan="8">8. Informasi Detail User Terkait :</th>
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
                <th rowspan="5" class="rotate row-bordered"><div>CATALOGUER</div></th>
                <th class="row-border-left row-border-right gray" colspan="8">9. Informasi Cataloguer :</th>
              </tr>
              <tr>
                <td class="row-border-left row-border-right row-border-bottom" colspan="5" rowspan="2">Catatan : ....</td>
                <td class="row-border-left row-border-right row-border-bottom" colspan="3">No Helpdesk : ....</td>
              </tr>
              <tr>
                <td class="row-bordered" rowspan="3"> Tanggal Approval :</td>
                <td class="row-bordered" colspan="2" rowspan="3"> TTD :</td>
              </tr>
              <tr>
                <td class="row-bordered" colspan="5"> Nama Cataloguer :</td>
              </tr>
              <tr>
                <td class="row-bordered" colspan="5"> Tanggal Modifikasi : {{$data->tanggal_pengajuan}}</td>
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