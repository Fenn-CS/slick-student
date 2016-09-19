 <div class="">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Information for {{$user->name}}</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
               <!-- form start -->
            <form id="form-register-student">
              <div class="col-md-4">
               <div class="form-group">
                <label for="matricule">REG Number</label>
                <input type="text" class="form-control" value="{{$user->reg_number}}" readonly>

              </div>
               <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{$user->name}}" readonly>
              </div>
               
              <div class="form-group">
                <label for="nid">NID/Passport No</label>
                <input type="text" class="form-control"  value="{{$model->nid}}" readonly>
              </div>
             
              <div class="form-group">
                <label for="birthplace">Place of Birth</label>
                <input type="text" class="form-control" value="{{$model->place_of_birth}}" readonly>
              </div>
              <div class="form-group">
                <label for="birthdate">Date of Birth</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 <input type="text" class="form-control" value="{{$model->date_of_birth}}" readonly>
                </div>
                <!-- /.input group -->
              </div>

            </div>
            <div class="col-md-3">
              
              <div class="form-group">
              <label for="sex">Sex</label>
              <input type="text" class="form-control" value="{{$model->sex}}" readonly>
              </div>
               <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="text" class="form-control" value="{{$user->email}}" readonly>
                </div>
                 <div class="form-group">
                <label>Phone Number</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="password" class="form-control" id="password" value="" readonly>
                </div>
                <!-- /.input group -->
              </div>
             @if($user->personality==='Student')
              <div class="form-group">
              <label for="program">Admission Year</label>
              <input type="text" class="form-control"  value="{{$model->admission_year}}" readonly>
            </div>
            @endif
               
                
               <div class="form-group">
               <label >REG Date/Year</label>
            
             <input type="password" class="form-control" id="password" value="" readonly>
                
               </div>
            
              </div>
            
            
              <div class="col-md-3">
              <div class="form-group">
              <label for="password">Reset your password</label>
               <div class="form-group">
                 <input type="password" class="form-control"  placeholder="Type in password" id="password-update1">
               </div>
                <div class="form-group">
              <input type="password" class="form-control"  placeholder="Repeat password" id="password-update2">
              </div>
              <button class="btn btn-slick">Reset</button>
                  
            </div>
               
          
             </div>
             </form>
             </div>
            
          <div class="box-footer">
               
          </div>
          </div>
          <!-- /.box -->

        