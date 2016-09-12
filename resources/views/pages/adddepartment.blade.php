  <div class="col-md-offset-3 col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Add to departments.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-add-department">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Department Name</label>
                  <input type="text" class="form-control" id="name" placeholder="COMPUTER ENGINERING" name="name">
                </div>
                <div class="form-group">
                  <label for="title">Program/ Programs Offered</label>
                 
                  <input type="text" class="form-control col-md-6" id="program-title" placeholder="COMPUTER HARDWARE">
                  <input type="hidden" name="programs" value='' id="programs">
                  <button class="col-md-2" id="add-program">Add</button>
                </div>
                <div class="box" style="margin-top:70px;">
                  <ul class="" id="program-list">
                  </ul>
               </div>
                <div class="form-group">
                  <label >Head of Department</label>
                  <select class="form-control" name="creditvalue" name="head">
                  <option>MR XXX</option>
                   <option>MR YYY</option>
                    <option>MRS ZZZ</option>
                     <option>MR KKK</option>
                  </select>
                </div>
              
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-slick" id="save-new-department">Validate</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        