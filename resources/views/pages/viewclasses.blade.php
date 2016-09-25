  <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Class Broad Sheet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Class Name</th>
                  <th>Program</th>
                  <th>Level</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classes as $class)
                <tr>
                <td>#</td>
                  <td>{{$class->name}}</td>
                  <td>{{$class->program}}</td>
                  <td>{{$class->level}}</td>
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
