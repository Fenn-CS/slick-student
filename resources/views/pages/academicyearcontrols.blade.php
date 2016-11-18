  <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Academic Year Operations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Year Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($years as $year)
                <tr>
                <td>#</td>
                  <td>{{$year->name}}</td>
                  <td>
                  @if($year->current)
                  Active
                  @else
                  Inactive
                  @endif
                  </td>
                  <td>
                  <a class="actions"><i class="fa fa-check year-activate" data-name="{{$year->name}}"></i></a>
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
            <div class="box">
             <div class="box-header">
              <h3 class="box-title">Add new academic year</h3>
            </div>
            <div class="box-body">
            <form id="form-add-new-year">
           <div class="form-group ">
              <div class="col-md-8">
              	<input type="text" name="name" class="form-control" placeholder="Example 2016/2017"> 
              </div>
               <input type="hidden" name="_token" value="{{Session::token()}}">
              <button id="add-new-academic-year" class="btn btn-slick col-md-4">Add</button>
             </div>
            </form>
            
              	
             </div>
             </div>
       </div>
