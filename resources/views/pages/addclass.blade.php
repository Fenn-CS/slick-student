  <div class="col-md-offset-3 col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Add to classes.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-add-class">
              <div class="box-body">
                <div class="form-group">
                  <label for="classname">Class Name</label>
                  <input type="text" class="form-control" id="classname" placeholder="LEVEL 200 Computer Software" name="name" readonly>
                </div>
                <div class="form-group">
                  <label for="level">Level</label>
              
                  <select class="form-control" name="level" id="classlevel">
                  <option>Select</option>
                  <option>200</option>
                   <option>300</option>
                    <option>400</option>
                     <option>450</option>
                  </select>
                
                </div>
                <div class="form-group">
                  <label for="program">Program</label>
              
                  <select class="form-control" name="program" id="classprogram">
                  <option>Select</option>
                  @foreach($programs as $program)
                  <option>{{$program->name}}</option>
                  @endforeach
                 <!-- -->
                  </select>
                
                </div>
            
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-lg btn-slick col-md-offset-4 col-md-4" id="save-new-class">Validate</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        