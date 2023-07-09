@extends('layouts.app')

@section('content')

<div class="card card-statistics widget-blog-contant">
  <div class="card-header">
      <div class="card-heading">
          <h4 class="card-title">Transaksi Pekerjaan</h4>
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
                  <div class="form-label">Nopek Pegawai</div>
                  
                  <select class="form-control" name="nopek" id="nopek"> 
                    <option value="" selected="selected">--Pilih Nopek--</option>
                    @foreach($pegawai as $nop => $vnop)
                    <option value="{{ $vnop->nopek }}"> {{ $vnop->nopek }} - {{ $vnop->nama }} </option>
                    @endforeach 
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Tanggal</label>
                  <input type="date" name="tanggal" id="tanggal" class="form-control" >
                </div>

                <div class="mb-3">
                  <label class="form-label">Wilayah</label>
                  <input type="text" name="wilayah" id="wilayah" class="form-control" >
                </div>

                <div class="mb-3">
                  <label class="form-label">Jarak Tempuh</label>
                  <input type="text" name="jarak_tempuh" id="jarak_tempuh" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                </div>

                <div class="mb-3">
                  <label class="form-label">Menit</label>
                  <input type="text" name="menit" id="menit" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                </div>

                <div class="mb-3">
                  <label class="form-label">Menit Lebih dari 50 *Minutes</label>
                  <input type="text" name="menit_k50" id="menit_k50" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                </div>

                <div class="mb-3">
                  <label class="form-label">Point Healthy Talk </label>
                  <input type="text" name="pht" id="pht" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                </div>

                <div class="mb-3">
                  <label class="form-label">Point Konsultasi dr. Gizi </label>
                  <input type="text" name="pkg" id="pkg" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                </div>

                <div class="mb-3">
                  <label class="form-label"> Point Konsultasi dr. Kesehatan Olahraga </label>
                  <input type="text" name="pko" id="pko" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
                </div>

                <div class="mb-3">
                  <label class="form-label"> Pengurangan Point </label>
                  <input type="text" name="minus_point" id="minus_point" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" >
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
                <th>Tanggal</th>
                <th>Nopek</th>
                <th>Nama Pegawai</th>
                <th>Wilayah</th>
                <th>Jarak Tempuh</th>
                <th>Menit</th>
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
            url:"{{ route('transaksi_save') }}", 
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
        url: "{{ route('transaksi_destroy') }}",
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
          url:  "{{ route('transaksi_put') }}",
          data: {id:id},
          type: "POST",
          success: function(result){
            console.log(result);
            $("#id").val(result.id); 
            $("#nopek").val(result.nopek);
            $("#tanggal").val(result.tanggal);   
            $("#wilayah").val(result.wilayah); 
            $("#jarak_tempuh").val(result.jarak_tempuh);
            $("#menit").val(result.menit);   
            $("#menit_k50").val(result.menit_k50);  
            $("#pht").val(result.pht);  
            $("#pkg").val(result.pkg);   
            $("#pko").val(result.pko); 
            $("#minus_point").val(result.minus_point);   
          }
        })
        $('#modal-large').modal({ show: true });
    }
  
  $(function () { 
      var table = $('#example').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('transaksi_all_data') }}",
          columns: [ 
              {data: 'tanggal', name: 'tanggal'},
              {data: 'nopek', name: 'nopek'},
              {data: 'nama_pegawai', name: 'nama_pegawai'},
              {data: 'wilayah', name: 'nopek'},
              {data: 'jarak_tempuh', name: 'jarak_tempuh'},
              {data: 'menit', name: 'menit'},
              {data: 'action', name: 'action', orderable: false, searchable: false}, 
          ]
      });  
      
  });
  
</script>
@endsection
