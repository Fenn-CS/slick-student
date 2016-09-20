  <div class="col-md-offset-3 col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Assign courses to  teachers.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">

              <div class="form-group">
                  <label >Course Code</label>
                  <select class="form-control" name="creditvalue">
                    @foreach($courses as $course)
                    <option>{{$course->code}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <label>Class</label>
                  <select class="form-control" name="class">
                  <option>LEVEL 300 TELECOM</option>
                   
                  </select>
                </div>
               
                <div class="form-group">
                  <label >Assign Teacher</label>
                  <select class="form-control" name="teacher">
                    @foreach($teachers as $teacher)
                <option> {{$teacher->name}} </option>
                @endforeach
                  </select>
                  <input type="hidden" name="teacherid" value="">
                </div>
               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-slick">Validate</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        