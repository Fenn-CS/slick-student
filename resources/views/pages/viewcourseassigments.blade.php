  <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Broad sheet for course responsibilities</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Course Title</th>
                  <th>Teacher</th>
                  <th>Class</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($assignments as $assignment)
                <tr>
                <td>#</td>
                  <td>{{$assignment->course}}</td>
                  <td>#</td>
                  <td>#</td>
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
