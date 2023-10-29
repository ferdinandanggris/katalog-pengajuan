@extends('layouts.main')
@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Katalog</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Katalog</h6>
        </div>
        <div class="card-body">
            <form id="form-add" method="post">
                @csrf
                <div class="form-group row">
                    <label for="category_id" class="col-sm-2 col-form-label required">Kategori Item</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category_id" name="jenis_item">
                            <option value="">-- PILIH KATEGORI ITEM --</option>
                            @foreach ($categories as $index => $value)
                                <option value="{{ $index }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sub_category_id" class="col-sm-2 col-form-label required">Sub Kategori Item</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="sub_category_id" name="item">
                            <option value="">-- PILIH SUB KATEGORI ITEM --</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6>Informasi Item</h6>
                            <div id="tambah-item" class="btn btn-primary" data-toggle="modal" data-target="#modalAddItem">
                                <i class="fa fa-plus" aria-hidden="true"></i> Tambah Item
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="form-container"></div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="no">No</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-no" name="no" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="stock_code">Kode Stok</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-stock_code" name="stock_code" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="egi">Egi</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-egi" name="egi" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="component_code">Component Code</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-component_code" name="component_code" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="manufacturer">Manufacturer</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-manufacturer" name="manufacturer" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="part_number">Part Number</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-part_number" name="part_number" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="recd_part_no">Recd Part No</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-recd_part_no" name="recd_part_no" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="stock_type">Jenis Stok</label>
                            <div class="col-sm-12">
                                <select name="stock_type" id="input-stock_type" required class="form-control">
                                    @foreach ($stockType as $st)
                                        <option value="{{ $st }}">{{ $st }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="penyedia_yang_disarankan">Penyedia yang
                                disarankan</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-penyedia_yang_disarankan" name="penyedia_yang_disarankan"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="harga_perkiraan">Harga perkiraan</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-harga_perkiraan" name="harga_perkiraan"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="pemakaian_per_tahun">Pemakaian per tahun</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-pemakaian_per_tahun" name="pemakaian_per_tahun"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="gudang_yang_diperlukan">Gudang yang
                                diperlukan</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-gudang_yang_diperlukan" name="gudang_yang_diperlukan"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="satuan">Satuan</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-satuan" name="satuan" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="dibatasi_untuk">Dibatasi Untuk</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-dibatasi_untuk" name="dibatasi_untuk"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="cross_reff">Cross Reff</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-cross_reff" name="cross_reff" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="inspeksi_khusus">Inspeksi Khusus</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-inspeksi_khusus" name="inspeksi_khusus"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="kritikalitas">Kritikalitas</label>
                            <div class="col-sm-12">
                                <select name="kritikalitas" id="input-kritikalitas" class="form-control">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="berbahaya">Berbahaya</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-berbahaya" name="berbahaya" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="catatan_penghapusan">Catatan Penghapusan</label>
                            <div class="col-sm-12">
                                <select name="catatan_penghapusan" id="input-catatan_penghapusan" class="form-control">
                                    <option value="">-- PILIH --</option>
                                    <option value="A">Dipakai sampai habis, lalu dihapus</option>
                                    <option value="B">Dipindahkan</option>
                                    <option value="C">Dihapuskan tanpa catatan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label required" for="catatan_penghapusan_teks">Redaksional
                                Penghapusan</label>
                            <div class="col-sm-12">
                                <input type="text" id="input-catatan_penghapusan_teks" name="catatan_penghapusan_teks"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="form-container"></div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="modalAddItem" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="form-group">
                            <label for="addItem-inputName" class="col-form-label required">Nama Inputan</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="addItem-inputName"
                                    placeholder="Nama Inputan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="addItem-btnSubmit" type="button" class="btn btn-primary">Tambahkan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let listCategories = {!! json_encode($items, JSON_PRETTY_PRINT) !!}
        let categoryValue = null;
        let categoryItems = [];
        let subCategoryValue = null;
        let subCategoryItems = [];

        $('#category_id').on('change', function() {
            categoryValue = $('#category_id').val();
            categoryItems = listCategories[categoryValue];

            let keySubCategories = Object.keys(categoryItems);
            let templateHtml = `<option value=''>-- PILIH SUB KATEGORI ITEM --</option>`
            for (let i = 0; i < keySubCategories.length; i++) {
                templateHtml += `<option value='${keySubCategories[i]}'>${keySubCategories[i]}</option>`
            }

            $('#sub_category_id').html(templateHtml);
        })

        $('#sub_category_id').on('change', function() {
            if (!categoryValue) return alert('Kategori tidak boleh kosong');

            subCategoryValue = $('#sub_category_id').val();
            subCategoryItems = listCategories[categoryValue][subCategoryValue];

            let templateHtml = ``;

            for (let i = 0; i < subCategoryItems.length; i++) {
                templateHtml += `
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label required">${subCategoryItems[i].name}</label>
                        <div class="col-sm-10">
                            <input type="${subCategoryItems[i].type}" class="form-control" id="name" placeholder="${subCategoryItems[i].sample}" name="json_data[${subCategoryItems[i].name}] ${subCategoryItems[i].required === 'required' ? 'required' : ''}">
                        </div>
                    </div>
                `;
            }
            $('#form-container').html(templateHtml);
        });

        $('#addItem-btnSubmit').on('click', function() {
            let value = $('#addItem-inputName').val();

            if (!value) return alert('Nama Inputan tidak boleh kosong');


            $('#form-container').append(`
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label required">${value}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="" name="json_data[${value}]">
                        </div>
                    </div>
                `);
        });

        $("#input-catatan_penghapusan").on('change', function(event) {
            event.preventDefault();

            let value = $(this).val();

            if (value === 'A' || value === 'C') {
                $('#input-catatan_penghapusan_teks').val($("#input-catatan_penghapusan option:selected").text());
                $('#input-catatan_penghapusan_teks').attr('readonly', 1);
            } else {
                $('#input-catatan_penghapusan_teks').val("Dipindah ke.. dengan pembebanan ....")
                $('#input-catatan_penghapusan_teks').removeAttr('readonly');
            }
        })


        $('#form-add').on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            console.log(formData)

            fetch("{{ route('approval.store-modifikasi') }}", {
                    method: 'POST',
                    body: formData
                }).then(response => response.json())
                .then(response => {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = "{{ route('approval.index') }}"
                        return;
                    }

                    alert(response.message);
                }).catch(e => {
                    alert('Terjadi kesalahan yang tidak terduga');
                })
        })
    </script>
@endsection
