  <div class="col-md-offset-3 col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Score prompt(Addition/Retrieval)</h3>
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
                  
                  </select>
                </div>
                <div class="form-group">
                  <label for="title">Course</label>
              
                  <select class="form-control" name="course">
                  @foreach($courses as $course)
                  <option>{{$course->title}}</option>
                  @endforeach
                  </select>
              
                </div>
                 <div class="form-group">
                  <label for="title">Type</label>
              
                  <select class="form-control" name="type">
                  <option>CA</option>
                  <option>EXAM</option>
                  </select>
           
                </div>
              
                <div class="form-group">
                  <label >Class</label>
                  <select class="form-control" name="class">
                  @foreach($classes as $class)
                  <option>{{$class->name}}</option>
                  @endforeach
                  </select>
                </div>
              
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="_token" value="{{Session::token()}}">
                <button  class="btn btn-slick" id="{{$id}}">Validate</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        