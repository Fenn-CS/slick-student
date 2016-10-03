  <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Course Broad Sheet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Code</th>
                  <th>Title</th>
                  <th>Credit Val</th>
                  <th>Status</th>
                  <th>Level</th>
                  <th>Semester</th>
                  <th>Instructors</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                <tr>
                  <td>#</td>
                  <td>{{$course->code}} </td>
                  <td>{{$course->title}}</td>
                  <td>{{$course->credit_value}}</td>
                  <td>{{$course->status}}</td>
                  <td>{{$course->level}}</td>
                  <td>{{$course->semester}}</td>
                  <td>null</td>
                  <td>
                  <a class="actions"><i class="fa fa-edit"></i></a>
                  <a class="actions"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
               
               <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
