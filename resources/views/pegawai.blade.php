@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">

        <h1> Pegawai </h1> 
         
        {{-- <button class="btn btn-primary">Add Data</button> --}}
        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-large">
          Tambah Data
        </a>
        <br>
        <div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Form Tambah / Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="col-md-6 col-xl-12">
                   
                  <div class="mb-3">
                    <label class="form-label">Nopek</label>
                    <input type="text" name="nopek" id="nopek" class="form-control" >
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" >
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nomor WA</label>
                    <input type="text" name="no_wa" id="no_wa" class="form-control" >
                  </div>

                  <div class="mb-3">
                    <div class="form-label">Jenis Pekerjaan</div>
                    {{ $jenis_pekerjaan }}
                    {{-- <select class="form-select">
                      @foreach($jenis_pekerjaan as $kjp $vjp)

                      @endforeach
                       
                    </select> --}}
                  </div>

                  <div class="mb-3">
                    <div class="form-label">Fungsi</div>
                    <select class="form-select">
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <div class="form-label">Lokasi Kerja</div>
                    <select class="form-select">
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                   
                  <div class="mb-3">
                    <div class="form-label">Kategori</div>
                    <select class="form-select">
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Tinggi Badan</label>
                    <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control" >
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Berat Badan</label>
                    <input type="text" name="berat_badan" id="berat_badan" class="form-control" >
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Size Baju</label>
                    <input type="text" name="size_baju" id="size_baju" class="form-control">
                  </div>
                 
                  
                     
                  
                </div> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        &nbsp;
        <div class="card">
          <div class="table-responsive">
            

            <table id="example" class="display" style="width:100%">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011-04-25</td>
                      <td>$320,800</td>
                  </tr>
                  <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011-07-25</td>
                      <td>$170,750</td>
                  </tr>
                  <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009-01-12</td>
                      <td>$86,000</td>
                  </tr>
                  <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012-03-29</td>
                      <td>$433,060</td>
                  </tr>
                  <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008-11-28</td>
                      <td>$162,700</td>
                  </tr>
                  <tr>
                      <td>Brielle Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012-12-02</td>
                      <td>$372,000</td>
                  </tr>
                  <tr>
                      <td>Herrod Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>59</td>
                      <td>2012-08-06</td>
                      <td>$137,500</td>
                  </tr>
                  <tr>
                      <td>Rhona Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010-10-14</td>
                      <td>$327,900</td>
                  </tr>
                  <tr>
                      <td>Colleen Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009-09-15</td>
                      <td>$205,500</td>
                      <tr>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>2009-09-15</td>
                        <td>$205,500</td>
                    </tr>
                    <tr>
                      <td>Colleen Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009-09-15</td>
                      <td>$205,500</td>
                  </tr>
                  <tr>
                    <td>Colleen Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009-09-15</td>
                    <td>$205,500</td>
                </tr></tr>
                  <tr>
                    <td>Colleen Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009-09-15</td>
                    <td>$205,500</td>
                </tr>
                <tr>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>39</td>
                  <td>2009-09-15</td>
                  <td>$205,500</td>
              </tr>
              <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009-09-15</td>
                <td>$205,500</td>
            </tr>
            <tr>
              <td>Colleen Hurst</td>
              <td>Javascript Developer</td>
              <td>San Francisco</td>
              <td>39</td>
              <td>2009-09-15</td>
              <td>$205,500</td>
          </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });
</script>
@endsection
