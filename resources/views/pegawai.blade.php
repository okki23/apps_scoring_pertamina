@extends('layouts.app')

@section('content')

<div class="card card-statistics widget-blog-contant">
  <div class="card-header">
      <div class="card-heading">
          <h4 class="card-title">Pegawai</h4>
      </div>
  </div>
  <div class="card-body">
    <button class="btn btn-primary" onclick="openModal();">Tambah Data</button>
    {{-- <a href="#" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modal-large" data-backdrop="static" data-keyboard="false">
      Tambah Data
    </a> --}}
    <br>
    &nbsp;

    <div class="modal modal-blur fade"  data-bs-keyboard="false" data-bs-backdrop="static" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Form Tambah / Ubah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal-large" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-md-6 col-xl-12">
              <form method="POST" enctype="multipart/form-data" id="my-form">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                  <label class="form-label">Nopek</label>
                  <input type="text" name="nopek" id="nopek" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control onlytext" >
                </div>
                <div class="mb-3">
                  <label class="form-label">Nomor WA</label>
                  <input type="text" name="no_wa" id="no_wa" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                </div>

                <div class="mb-3">
                  <div class="form-label">Jenis Pekerjaan</div>
                  
                  <select class="form-control" name="id_jenis_pekerjaan" id="id_jenis_pekerjaan"> 
                    <option value="" selected="selected">--Pilih Jenis Pekerjaan</option>
                    @foreach($jenis_pekerjaan as $kjp => $vjp)
                    <option value="{{ $vjp->id }}"> {{ $vjp->nama_jenis_pekerjaan }} </option>
                    @endforeach 
                  </select>
                </div>

                <div class="mb-3">
                  <div class="form-label">Fungsi</div>
                  <select class="form-control" name="id_fungsi" id="id_fungsi"> 
                    <option value="" selected="selected">--Pilih Fungsi Pekerjaan</option>
                    {{-- {{ dd($fungsi_pekerjaan)n }} --}}
                    @foreach($fungsi_pekerjaan as $fjp => $vfp)
                    <option value="{{ $vfp->id }}"> {{ $vfp->nama_fungsi_pekerjaan }} </option>
                    @endforeach 
                  </select>
                </div>

                <div class="mb-3">
                  <div class="form-label">Lokasi Kerja</div>
                  <select class="form-control" name="id_lokasi_kerja" id="id_lokasi_kerja"> 
                    <option value="" selected="selected">--Pilih Lokasi Pekerjaan</option>
                    {{-- {{ dd($fungsi_pekerjaan)n }} --}}
                    @foreach($lokasi_pekerjaan as $lkp => $vkp)
                    <option value="{{ $vkp->id }}"> {{ $vkp->nama_lokasi_pekerjaan }} </option>
                    @endforeach 
                  </select>
                </div>
                
                <div class="mb-3">
                  <div class="form-label">Kategori</div>
                  <select class="form-control" name="id_kategori" id="id_kategori"> 
                    <option value="" selected="selected">--Pilih Kategori</option>
                    {{-- {{ dd($fungsi_pekerjaan)n }} --}}
                    @foreach($kategori as $kpk => $vpk)
                    <option value="{{ $vpk->id }}"> {{ $vpk->nama_kategori }} </option>
                    @endforeach 
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Tinggi Badan (cm) </label>
                  <input type="text" name="tinggi_badan" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" id="tinggi_badan" class="form-control" >
                </div>
                <div class="mb-3">
                  <label class="form-label">Berat Badan (kg) </label>
                  <input type="text" name="berat_badan" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" id="berat_badan" class="form-control" >
                </div>
                <div class="mb-3">
                  <label class="form-label">Size Baju</label>
                  <select name="size_baju" id="size_baju" class="form-control">
                    <option value="" selected="selected">--Pilih Ukuran--</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                  </select>
                 {{-- <div class="mb-3">
                  <label class="form-label">Foto</label>
                  <input type="file" name="foto" id="foto">
                 </div> --}}
              
                </div>  
               </form>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal" onclick="closeModal();">Tutup</button>
            <button type="button" onclick="savebtn();" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
          </div>
        </div>
      </div>
    </div>


    <div class="table-responsive"> 
      <table id="example" class="table table-bordered table-hovered" style="width:100%">
        <thead>
            <tr>
                <th>Nopek</th>
                <th>Nama</th> 
                <th>No Wa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
        </tbody>
      </table>
        
  </div>
</div>

 
<script> 
  
  $(".onlytext").keypress(function(e) {
        var key = e.keyCode;
          if (key >= 48 && key <= 57) {
             e.preventDefault();
          } 
  });

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

  function clearinput(){
        $("input").val("");
  }

  function closeModal(){
     $('#modal-large').modal('hide'); 
  }

  function openModal(){
    clearinput();
    $('#modal-large').modal({ show: true });
  }


  function savebtn(){   
        var form = $('#my-form')[0]; 
        var data = new FormData(form);    
            $.ajax({ 
            type: "POST", 
            enctype: 'multipart/form-data', 
            url:"{{ route('pegawai_save') }}", 
            data: data, 
            processData: false, 
            contentType: false, 
            cache: false, 
            timeout: 800000, 
            success: function (data) { 
                console.log("SUCCESS : ", data);  
                closeModal();
                $('#example').DataTable().ajax.reload(); 
                clearinput();
            },

            error: function (e) { 
                console.log("ERROR : ", e);   
                closeModal();
                $('#example').DataTable().ajax.reload();
                clearinput();
            } 
        });   
  }

  function DeleteData(id){ 
        let token = $('meta[name="csrf_token"]').attr('content');
        $.ajax({ 
        url: "{{ route('pegawai_destroy') }}",
        data: {_token: token, id: id},
        type: "POST",
        dataType:"json",
        success: function(res){ 
          console.log("SUCCESS : ", data);  
          $('#example').DataTable().ajax.reload();
        },
        error: function (e) { 
          console.log("ERROR : ", e);   
          $('#example').DataTable().ajax.reload() 
        } 
       });
    }
    function UbahData(id){
        
        $.ajax({
          url:  "{{ route('pegawai_put') }}",
          data: {id:id},
          type: "POST",
          success: function(result){
            console.log(result);
            $id = $("#id").val(result.id);
            $nopek = $("#nopek").val(result.nopek);
            $nama = $("#nama").val(result.nama);
            $id_jenis_pekerjaan = $("#id_jenis_pekerjaan").val(result.id_jenis_pekerjaan);
            $id_fungsi = $("#id_fungsi").val(result.id_fungsi);
            $id_lokasi_kerja = $("#id_lokasi_kerja").val(result.id_lokasi_kerja);
            $id_kategori = $("#id_kategori").val(result.id_kategori);
            $no_wa = $("#no_wa").val(result.no_wa);
            $tinggi_badan = $("#tinggi_badan").val(result.tinggi_badan);
            $berat_badan = $("#berat_badan").val(result.berat_badan);
            $size_baju = $("#size_baju").val(result.size_baju);

   
          }
        })
        $('#modal-large').modal({ show: true });
    }
  
  $(function () { 
      var table = $('#example').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('pegawai_all') }}",
          columns: [
              {data: 'nopek', name: 'nopek'},
              {data: 'nama', name: 'nama'},
              {data: 'no_wa', name: 'no_wa'}, 
              {data: 'action', name: 'action', orderable: false, searchable: false}, 
          ]
      });  
      
  });
  
</script>
@endsection
