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
                  <th>Name</th>
                  <th>Programs</th>
                  <th>Head</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                <tr>
                  <td></td>
                  <td>{{$department->name}}</td>
                  <td>
                  <ul>
                   @foreach($department->programs as $program) 
                   <li> {{$program->name}} </li>
                   @endforeach
                   </ul>
                  </td>
                  <td> 4</td>
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
