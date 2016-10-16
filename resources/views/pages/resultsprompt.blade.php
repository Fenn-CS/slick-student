  <div class="col-md-offset-3 col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Check Results</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-score-prompt">
              <div class="box-body">
                <div class="form-group">
                  <label for="semester">Semester</label>
                   <select class="form-control" name="semester">
                  <option>1st Semester</option>
                   <option>2nd Semester</option>
                    <option>Resit</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="title">Type</label>
              
                  <select class="form-control" name="course">
                  <option>CA</option>
                  <option>FINAL</option>
                  </select>
              
                </div>
              
              
                <div class="form-group">
                  <label >Year</label>
                  <select class="form-control" name="class">
                  @foreach($academicyears as $academicyear)
                  <option>{{$academicyear->name}}</option>
                  @endforeach
                  </select>
                </div>
              
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="_token" value="{{Session::token()}}">
                <button  class="btn btn-slick col-md-4 col-md-offset-4" id="">Validate</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>

        