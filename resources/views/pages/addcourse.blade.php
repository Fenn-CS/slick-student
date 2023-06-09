  <div class="col-md-offset-2 col-md-8">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Add to course list.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-add-course">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="code">Course Code</label>
                  <input type="text" class="form-control" id="code" placeholder="EEC206" name="code">
                </div>
                <div class="form-group col-md-6">
                  <label for="title">Course Title</label>
                  <input type="text" class="form-control" id="title" placeholder="MATHEMATICS 1" name="title">
                </div>
                <div class="form-group col-md-6">
                  <label >Program</label>
                  <select class="form-control" name="program">
                  @foreach($programs as $program)
                  <option>{{$program->name}}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label >Level</label>
                  <select class="form-control" name="level">
                  <option>200</option>
                   <option>300</option>
                    <option>400</option>
                  
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label >Credit Value</label>
                  <select class="form-control" name="creditvalue">
                  <option>1</option>
                   <option>2</option>
                    <option>3</option>
                     <option>4</option>
                  </select>
                </div>
                 <div class="form-group col-md-6">
                  <label >Semester</label>
                  <select class="form-control" name="semester">
                  <option>1st Semester</option>
                   <option>2nd Semester</option>
                  </select>
                </div>
                 <div class="form-group col-md-6">
                  <label >Status</label>
                  <select class="form-control" name="status">
                  <option>A</option>
                   <option>B</option>
                    <option>C</option>
                     <option>D</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value={{Session::token()}}>
                <button type="submit" class="btn btn-lg btn-slick col-md-4 col-md-offset-4" id="save-new-course">Validate</button>

              </div>
            </form>
          </div>
          <!-- /.box -->

        