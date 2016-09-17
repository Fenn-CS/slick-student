 <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Registered</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="registered-courses">
              @include('layouts.reg-courses')
              
              </div>
            </div>
            <!-- /.box-body -->
            </div>
            </div>

             <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Selected Courses</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="selected-courses"> 
              </div>
              <button class="btn btn-sm btn-success" id="save-registered-courses">Save</button>
              <button class="btn btn-sm btn-slick" id="clear">Clear</button>
            </div>
            <!-- /.box-body -->
            </div>
            </div>
            <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Available Courses</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
            <div class="form-group">
             <select class="form-control" name="creditvalue" id="level-courses">
                <option>...</option>
                  <option>Level 200</option>
                   <option>Level 300</option>
                    <option>Level 400</option>
                  </select>
              </div>
              <div id="available-courses">
                
               
            </div>
            <!-- /.box-body -->
          </div>
            </div>
            </div>
            <div class="col-md-3">
             <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Color Code</h4>
            </div>
             <div class="box-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-red" href="#"><i class="fa fa-square"></i>Compulsory</a></li>
                  <li><a class="text-green" href="#"><i class="fa fa-square"></i>Elective</a></li>
                    <li><a class="text-yellow" href="#"><i class="fa fa-square"></i>Reciet</a></li>
                
                </ul>
              </div>
              
            </div>
            </div>
            </div>