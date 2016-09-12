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
                  <th>NID</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                  <tr>
                  <td>#</td>
                  <td>{{$teacher->reg_number}}</td>
                  <td>{{$teacher->name}}</td>
                  <td>null</td>
                  <td>{{$teacher->teacher->nid}}</td>
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
s