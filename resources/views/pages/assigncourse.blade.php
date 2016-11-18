  <div class="col-md-offset-3 col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Assign courses to  teachers.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-course-assignment">
              <div class="box-body">

              <div class="form-group">
                  <label >Course Code</label>
                  <select class="form-control" name="course">
                    @foreach($courses as $course)
                    <option>{{$course->code}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <label>Class</label>
                  <select class="form-control" name="class">
                  @foreach($classes as $class)
                    <option>{{$class->name}}</option>
                  @endforeach
                   
                  </select>
                </div>
               
                <div class="form-group">
                  <label >Assign Teacher</label>
                  <select class="form-control"  name="teacher">
                    @foreach($teachers as $teacher)
                <option> {{$teacher->name}} </option>
                @endforeach
                  </select>
                
                </div>
               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-slick" id="save-course-assignment">Validate</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        