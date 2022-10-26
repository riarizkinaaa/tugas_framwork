@extends('layouts.template')
@section('content')


<!-- modal tambah data -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/kategori/tambah" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" class="form-control" placeholder="nama kategori">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="keterangan / deskripsi">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end-modal tambah data -->

<!-- modal edit data -->
@foreach($kategori as $val)
<div class="modal fade" id="modalEdit<?= $val->kategori_id ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/kategori/update" method="post">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="kategori_id" value="<?= $val->kategori_id ?>" class="form-control" placeholder="nama kategori">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" value="<?= $val->kategori ?>" class="form-control" placeholder="nama kategori">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" value="<?= $val->keterangan ?>" class="form-control" placeholder="keterangan / deskripsi">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
<!-- end-modal edit data -->

<!-- modal hapus data -->
@foreach($kategori as $row)
<div class="modal fade" id="modalHapus<?= $row->kategori_id ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="kategori_id" id="kategori_id" value="<?= $row->kategori_id ?>">
                <p>Yakin ingin menghapus data ini...?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <a href="/kategori/destroy/{{$row->kategori_id}}" class="btn btn-warning">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>

    <!-- /.modal-dialog -->
</div>
@endforeach
<!-- end-modal hapus data -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="text-center">Data kategori</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- modal add-data -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
                                <i class="fas fa-plus"></i>
                                <span class="ml-2">Tambah</span>
                            </button>
                            <!-- end-modal add-data -->
                        </div>
                        <!-- /.card-header -->
                        <div class="table-responsive">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $i = 1 ?>
                                        @foreach($kategori as $ktgr)
                                        <tr>
                                            <td><b><?= $i++ ?></b></td>
                                            <td><?= $ktgr->kategori ?></td>
                                            <td><?= $ktgr->keterangan ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- modal add-data -->
                                                    <button type="button" class="btn btn-info mr-1" data-toggle="modal" data-target="#modalEdit<?= $ktgr->kategori_id ?>">
                                                        <i class="far fa-edit">Edit</i>
                                                    </button>
                                                    <!-- end-modal add-data -->
                                                    <!-- modal hapus data -->
                                                    <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#modalHapus<?= $ktgr->kategori_id ?>">
                                                        <i class="far fa-trash-alt">Delete</i>
                                                    </button>
                                                    <!-- end-modal hapus data -->
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- /.card -->
<script>
    $(document).on('click', '.delete', function() {
        let id = $(this).attr('data-id');
        $('#kategorI_id').val(id);
    });
</script>
@endsection