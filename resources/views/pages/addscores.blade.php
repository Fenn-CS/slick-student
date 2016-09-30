
  <div class="col-xs-12">
          <div class="box">
            <div class="box-header ">
            <div class="col-md-6">
              <h3 class="box-title">{{$type}} Mark Registrations for {{$course_name}}</h3> 
            </div>
              <div class="col-md-6">
              <input type="file" name="" class="col-md-6"> 
              <button class="btn btn-slick col-md-4" style="float:right;">Import scores</button>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Stud. Matricule</th>
                  <th>Name</th>
                  <th>Score</th>
                 <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($students as $student)
                 <tr>
                 <td>{{$student->matricule}}</td>
                  <td>{{$student->name}}</td>
                  <td><input type=""  class="score-box" data-student="{{$student->matricule}}-{{$student->id}}" data-settings="{{$settings}}" id="{{$student->matricule}}"></td>
                  <td>
                  <a ><i class="fa fa-unlock-alt score-action" data-input="{{$student->matricule}}"></i></a>
                  <!-- <a class="score-action"><i class="fa fa-save"></i></a> -->
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
