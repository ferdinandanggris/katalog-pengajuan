@extends('layouts.main')
@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengajuan Material</h1>
    @if (session('success'))
        <div class="row">
            <div class="col-lg-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
            </div>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Material</h6>
            @if (auth()->user()->role->slug == 'pegawai')
                <div>
                    <a href="{{ url('/approval/baru') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"
                            aria-hidden="true"></i>&nbsp;Baru</a>
                    <a href="{{ url('/approval/modifikasi') }}" class="btn btn-sm btn-warning text-dark"><i
                            class="fa fa-plus" aria-hidden="true"></i>&nbsp;Mondifikasi</a>
                </div>
            @endcan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Pengaju</th>
                        <th>Jenis Pengajuan</th>
                        <th>Material</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Pengaju</th>
                        <th>Jenis Pengajuan</th>
                        <th>Material</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($approvals as $approval)
                        @if ($approval->setuju)
                            <tr style="background: #1cc88a45">
                                <td>{{ $approval->nama_pengaju }}</td>
                                <td>{{ $approval->jenis_pengajuan }}</td>
                                <td>{{ $approval->item }}</td>
                                <td>{!! $approval->deskripsi !!}</td>
                                <td>{{ $approval->status_pengajuan }}</td>
                                <td>
                                    <a href="/approval/{{ $approval->id }}/export"
                                        class="btn btn-sm btn-secondary mr-2 mb-2"> <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $approval->nama_pengaju }}</td>
                                <td>{{ $approval->jenis_pengajuan }}</td>
                                <td>{{ $approval->item }}</td>
                                <td>{!! $approval->deskripsi !!}</td>
                                <td>{{ $approval->status_pengajuan }}</td>
                                <td>
                                    @if (auth()->user()->role->slug == 'kataloger' || auth()->user()->role->slug == 'admin')
                                        <a href="{{ route('approval.approve', $approval) }}"
                                            class="btn btn-sm btn-warning mr-2 mb-2"
                                            onclick="return confirm('Yakin ingin menjalankan aksi ini ?')">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @endif
                                    <a href="/approval/{{ $approval->id }}/export"
                                        class="btn btn-sm btn-secondary mr-2 mb-2"> <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
