@extends('templates.master')

@push('css')
    
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('dkk')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('dkk')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@section('content')
@section('title', 'Toko Andreas | Data Barang')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Database Barang</h3>
              </div>
              <form id="formTabelBarang" method="POST" action="{{route('cekbox_delete')}}">
                <!-- /.card-header -->
                {{ csrf_field() }}
                <div style=" margin-left: 20px; margin-top: 15px">
                <button type="button" class="btn btn-normal far fa-plus-square btn-primary" 
                data-toggle="modal" data-target="#tambah_barang"> Tambah Data</button>
                <button type="submit" disabled name="hapus" class="btn btn-normal far fa-trash-alt btn-danger disabled hapus"> Hapus</button>
                
              </div>
              <div class="card-body">
                <table id="databarang" class="table table-bordered table-striped text-center">
                  <thead>
                <tr>
                  <th >
                    No
                  </th>
                  <th data-orderable="false" class="no_order center">
                    <label>
                    <input type="checkbox" class="minimal" id="pilih_semua">
                  </label>
                </th>
                  <th>Barcode</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual kecil</th>
                  <th>Harga Jual Besar</th>
                  <th>Harga Jual Grosir</th>
                  <th data-orderable="false">Aksi</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
              </form>

              <div class="modal fade" id="tambah_barang">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Barang</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('tambahbarang')}}" method="POST">
                        {{ csrf_field() }}
                        <!-- text input -->
                        <div class="form-group">
                          <label for="barcode">Barcode</label>
                          <input id="barcode"name="barcode" type="number" class="form-control" placeholder="Barcode" required>
                        </div>
                        <div class="form-group">
                          <label for="nama_barang">Nama Barang</label>
                          <input id="nama_barang"name="nama_barang" type="text" class="form-control" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                          <label for="stok">Stok</label>
                          <input id="stok" name="stok" type="number" class="form-control" placeholder="Stok" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_beli">Harga Beli</label>
                          <input id="harga_beli"name="harga_beli" type="number" class="form-control" placeholder="Harga Beli" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_jual_sedikit">Harga Jual Sedikit</label>
                          <input id="harga_jual_sedikit"name="harga_jual_sedikit" type="number" class="form-control" placeholder="Harga Jual Kecil" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_jual_banyak">Harga Jual Banyak</label>
                          <input id="harga_jual_banyak"name="harga_jual_banyak" type="number" class="form-control" placeholder="Harga Jual Besar" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_grosir">Harga Jual Grosir</label>
                          <input id="harga_grosir"name="harga_grosir" type="number" class="form-control" placeholder="Harga Jual Grosir" required>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button style="float:right" type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
              
              <div class="modal fade" id="edit">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Barang</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    
                    <form  id="form_edit">
                      <input type="hidden" name="id_barang" id="edit_id_barang" value="">
                      <div class="modal-body">
                        {{ csrf_field() }}
                        <!-- text input -->
                        <div class="form-group">
                          <label for="barcode">Barcode</label>
                          <input id="barcode" name="barcode" type="number" class="form-control edit_barcode" placeholder="Barcode" required>
                        </div>
                        <div class="form-group">
                          <label for="nama_barang">Nama Barang</label>
                          <input id="nama_barang"name="nama_barang" type="text" class="form-control edit_nama_barang" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                          <label for="stok">Stok</label>
                          <input id="stok" name="stok" type="number" class="form-control edit_stok" placeholder="Stok" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_beli">Harga Beli</label>
                          <input id="harga_beli"name="harga_beli" type="number" class="form-control edit_harga_beli" placeholder="Harga Beli" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_jual_sedikit">Harga Jual Sedikit</label>
                          <input id="harga_jual_sedikit"name="harga_jual_sedikit" type="number" class="form-control edit_harga_jual_sedikit" placeholder="Harga Jual Kecil" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_jual_banyak">Harga Jual Banyak</label>
                          <input id="harga_jual_banyak"name="harga_jual_banyak" type="number" class="form-control edit_harga_jual_banyak" placeholder="Harga Jual Besar" required>
                        </div>
                        <div class="form-group">
                          <label for="harga_grosir">Harga Jual Grosir</label>
                          <input id="harga_grosir"name="harga_grosir" type="number" class="form-control edit_jual_grosir" placeholder="Harga Jual Grosir" required>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button style="float:right" type="submit" class="btn btn-primary">Edit</button>
                      </div>
                      </form>
                    
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
              

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
  </div>
@endsection

@push('js')
<script src="{{asset('dkk')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('dkk')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('dkk')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('dkk')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  // fungsi cekbox
  $(document).on('click','#pilih_semua',function(e){
    $(".pilih").prop("checked", $(this).prop("checked"));
    let cbxlength = $('#databarang tbody input:checkbox:checked').length;
    if (cbxlength == 0){
      $('.hapus').addClass('disabled').prop({'disabled':true});
    } else {
      $('.hapus').removeClass('disabled').prop({'disabled':false});
    }
  });


  $(document).on('click','.pilih',function(e){
    let cbxlength = $('#databarang tbody input:checkbox:checked').length;
    let allCbx = $('#databarang tbody input:checkbox').length;
    if (cbxlength == 0){
      $('.hapus').addClass('disabled').prop({'disabled':true});
    } else {
      $('.hapus').removeClass('disabled').prop({'disabled':false});
    }
    if (cbxlength == allCbx){
      $('#pilih_semua').prop({'checked':true});
    } else {
      $('#pilih_semua').prop({'checked':false});
    }
  });

</script>
{{--cekbox

fungsi datatable --}}
<script>
  var table = $('#databarang').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax"    : {
      type : 'post',
      url : "{{route('tabel.barang')}}"
    },
    columns : [
      {"data":"no"},
      {"data":"cbx",render : function(a,b,c){
        return '<input type="checkbox" name="id_barang[]" value="'+c.id+'" class="minimal pilih">';
      }},
      {"data":"barcode"},
      {"data":"nama_barang"},
      {"data":"stok"},
      {"data":"harga_beli"},
      {"data":"harga_jual_sedikit"},
      {"data":"harga_jual_banyak"},
      {"data":"harga_grosir"},
      {"data":"aksi", render : function(a,b,c){
        //console.log(JSON.stringify(c))
        return '<button id="edit_barang" type="button" class="btn btn-xs btn-primary" ' +
                    'data-id="'+c.id+'"' +
                    'data-barcode="'+c.barcode+'"' +
                    'data-nama-barang="'+c.nama_barang+'"' +
                    'data-stok="'+c.stok+'"' +
                    'data-harga_beli="'+c.harga_beli+'"' +
                    'data-harga_jual_sedikit="'+c.harga_jual_sedikit+'"' +
                    'data-harga_jual_banyak="'+c.harga_jual_banyak+'"' +
                    'data-harga_jual_grosir="'+c.harga_grosir+'"' +
                    'data-toggle="modal" data-target="#edit"> Edit ' +
               '</button>';
      }},
    ]
  });
</script>
{{-- datatable

hapus data --}}
@if(Session::has("hapus"))
<script>
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "Data berhasil dihapus !"
})
</script>
@endif

<script>
  $('#formTabelBarang').submit(function(){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value == true) {
        $.ajax({
          url : $(this).attr('action'),
          type : $(this).attr('method'),
          data : $(this).serialize(),
          dataType: 'JSON',
          error : function(e){
            Swal.fire('error')
          },
          success : function(e){
            if (e.code == 1000){
              Swal.fire({
                icon : 'success',
                text : e.msg
              });
              table.draw();
            } else {
              Swal.fire({
                icon : 'error',
                text : e.msg
              })
            }
            //Swal.fire('sukses');
          }
        })
      }
    })
    return false;
  })
</script>
{{-- hapus data

tambah data --}}
@if(Session::has('tambah'))
<script>
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "Data berhasil ditambahkan !"
})
</script>
@endif
{{-- //tambah data --}}

@if(Session::has("kosong"))
<script>
Swal.fire(
  'Data yang ingin dihapus tidak ada',
  'ceklis dulu data yang ingin dihapus !',
  'error'
)
</script>
@endif

<script>
  $(document).on('click', '#edit_barang',function(){
    let meta_data = $(this).attr('data-meta');
    console.log(meta_data)
    $('#edit_id_barang').val($(this).attr('data-id'));
    $('.edit_barcode').val($(this).attr('data-barcode'));
    $('.edit_nama_barang').val($(this).attr('data-nama-barang'));
    $('.edit_stok').val($(this).attr('data-stok'));
    $('.edit_harga_beli').val($(this).attr('data-harga_beli'));
    $('.edit_harga_jual_sedikit').val($(this).attr('data-harga_jual_sedikit'));
    $('.edit_harga_jual_banyak').val($(this).attr('data-harga_jual_banyak'));
    $('.edit_jual_grosir').val($(this).attr('data-harga_jual_grosir'));

  })
  </script>

@endpush