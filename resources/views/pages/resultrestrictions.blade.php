  <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Result Publications</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Year Name</th>
                  <th>Semester</th>
                  <th>Type</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result) 
                <tr>
                <td>#</td>
                  <td>{{$result->academicYear->name}}</td>
                  <td>{{$result->semester}}</td>
                  <td>{{$result->type}}</td>
                  <td>{{$result->status}}</td>
                  <td>
                  <a class="actions"><i class="fa fa-check result-activate" data-name=""></i></a>
                  <a class="actions"><i class="fa fa-trash-o "></i></a>

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
    <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Add Result Publication</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-add-result">
              <div class="box-body">
                <div class="form-group">
                  <label for="semester">Semester</label>
                   <select class="form-control" name="semester">
                  <option>1st Semester</option>
                   <option>2nd Semester</option>
                    <option>Resit</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="title">Type</label>
              
                  <select class="form-control" name="type">
                  <option>CA</option>
                  <option>FINAL</option>
                  </select>
              
                </div>
              
              
                <div class="form-group">
                  <label >Year</label>
                  <select class="form-control" name="year">
                  @foreach($academicyears as $academicyear)
                  <option>{{$academicyear->name}}</option>
                  @endforeach
                  </select>
                </div>
              
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="hidden" name="_token" value="{{Session::token()}}">
                <button  class="btn btn-slick col-md-4 col-md-offset-4" id="result-publish">Publish</button>
              </div>
            </form>
          </div>
       </div>
