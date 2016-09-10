  <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student Broad Sheet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="student-list-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Matricule</th>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Program</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                  <tr>
                  <td>#</td>
                  <td>{{$student->reg_number}}</td>
                  <td>{{$student->name}}</td>
                  <td>null</td>
                  <td>{{$student->student->program}}</td>
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
