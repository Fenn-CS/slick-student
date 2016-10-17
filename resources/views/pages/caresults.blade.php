  <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">CA RESULTS [Hihi :), Hope you worked hard]</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Course Code</th>
                  <th>Course Title</th>
                  <th>Score</th>
                  <th>GRADE</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($scores as $score)
                <tr>
                  <td></td>
                  <td>{{$score->course_code}}</td>
                  <td>{{$score->course_title}}</td>
                  <td>{{$score->value}}</td>
                  <td>{{$score->grade}}</td>
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
