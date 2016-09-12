<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Student Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-register-student">
              <div class="box-body">
              <div class="col-md-4">
               <div class="form-group col-md-6">
                <label for="matricule">Matricule Number</label>
                <input type="text" class="form-control" name="matricule" placeholder="CT15HNDA15">

              </div>
               <div class="form-group col-md-6">
                <label for="automatricule">Auto Generated</label>
                <input type="text" class="form-control" name="automatricule" placeholder="CT16HNDA11" readonly>
                
              </div>
              <div class="form-group">
                <label for="nid">NID/Passport No</label>
                <input type="text" class="form-control" name="nid" placeholder="154865212331">
              </div>
              <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" class="form-control" name="name" placeholder="MOKI ROBERT SAMA">
              </div>
              <div class="form-group">
                <label for="birthplace">Place of Birth</label>
                <input type="text" class="form-control" name="birthplace" placeholder="Douala 2">
              </div>
              <div class="form-group">
                <label for="birthdate">Date of Birth</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="birthdate">
                </div>
                <!-- /.input group -->
              </div>

            </div>
            <div class="col-md-3">
              <div class="form-group">
              <label for="program">Admission Program</label>
              <select name="program" id="sex" class="form-control">
              @foreach($programs as $program)
              <option>{{$program->name}}</option>
              @endforeach
            </select>
            </div>
              <div class="form-group">
              <label for="sex">Sex</label>
              <select name="sex" id="sex" class="form-control">
              <option>Male</option>
              <option>Female</option>
                
              </select>
              </div>
               <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                 <div class="form-group">
                <label>Phone Number</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask='"mask": "999-999-999"' data-mask name="number">
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" readonly>
                </div>
            
              </div>
            
            
              <div class="col-md-5">
              <div class="row">
               <div class="form-group col-md-6">
                  <label for="photo">Select Photo</label>
                  <input type="file" id="photo">
                </div>
                <div class="col-md-6" style="height:180px; width:200px; border:1px solid black;">
                  
                </div>
                <div>
                </div>
               <div class="form-group">
               <label >Admission Year</label>
              <select class="form-control" name="admissionyear">
              <option>2015/2016</option>
              <option>2016/2017</option>
              <option>2017/2018</option>
                
            </select>
               </div>
                <div class="box-footer">
                <input type="hidden" name="_token" value={{Session::token()}}>
                <button type="submit" class="btn btn-lg btn-slick" id="register-student">Submit</button>
              </div>
              </div>
              <!-- /.box-body -->

             
          
             </div>
            </form>
          </div>
          <!-- /.box -->
  <script>
 $(function () {
   
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
     $("[data-mask]").inputmask();
    });
    </script>
</div>