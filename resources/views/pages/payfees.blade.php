  <div class="col-md-offset-3 col-md-6">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Pay a Fees.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-course-assignment">
              <div class="box-body">

              <div class="form-group">
                  <label>Fee Name</label>
                  <select class="form-control" name="course" id="available-fees">
                    @foreach($fees as $fee)
                    <option>{{$fee->name}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <label>Installment</label>
                  <select class="form-control" name="class">
                 
                   
                  </select>
                </div>
               
                <div class="form-group">
                  <label >Mode of payment</label>
                  <select class="form-control"  name="teacher">
                    <option>Mobile Money</option>
                    <option>Credit Card</option>
                  </select>
                
                </div>
               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-slick col-md-4 col-md-offset-4" id="pay-fee">Pay</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        