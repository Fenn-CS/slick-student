  <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">FINAL RESULTS [Hihi :), Hope you worked hard]</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Course Code</th>
                  <th>Course Title</th>
                  <th>CV</th>
                  <th>CA</th>
                  <th>EXAM</th>
                  <th>FINAL</th>
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
                  <td>{{$score->course_cv}}</td>
                  <td>{{$score->ca}}</td>
                  <td>{{$score->exam}}</td>
                  <td>{{$score->final}}</td>
                  <td>{{$score->grade}}</td>
                  <td>
                  <a class="actions"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                @endforeach

           @if(count($scores)===0)
            <tr><b><em>
              None of your scores have been recorded yet! please check later.
            </em></b></tr>
                @endif
              </tbody>
               
               <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
