  <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Fee Operations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Fee Name</th>
                  <th># Installments</th>
                  <th>Installment Minimum</th>
                  <th>Total</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fees as $fee)
                <tr>
                <td>#</td>
                  <td>{{$fee->name}}</td>
                  <td> {{$fee->installments}}</td>
                  <td>{{$fee->minimum}}</td>
                  <td>{{$fee->total}}</td>
                  <td>
                  <a class="actions"><i class="fa fa-edit"></i></a>
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
              <h3 class="box-title">Add a Fee</h3>
            </div>
            <div class="box-body">
            <form id="form-add-new-fee">
           <div class="form-group ">
              <label>Fee Name</label>
              	<input type="text" name="name" class="form-control" placeholder="Medical Fee"> 
             </div>
             <div class="form-group ">
              <label>Allowed Number of Installments</label>
                <input type="text" name="installments" class="form-control" placeholder="4"> 
             </div>
             <div class="form-group ">
              <label>Installment Minimum</label>
                <input type="text" name="minimum" class="form-control" placeholder="25000"> 
             </div>
              <div class="form-group ">
              <label>Total Fee</label>
                <input type="text" name="total" class="form-control" placeholder="100000"> 
             </div>
             <input type="hidden" name="_token" value="{{Session::token()}}">
             <button id="add-new-fee" class="btn btn-slick col-md-offset-4 col-md-4">Add</button>
            </form>
            
              	
             </div>
             </div>
       </div>
