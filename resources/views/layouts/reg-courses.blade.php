
@foreach($courses as $course)
<div class="external-event col-md-9 @if($course->status=='C')
bg-green @elsif($course->status=='B') bg-red @elseif($course->status=='B') bg-red @endif available-course"  data-coursecode="{{$course->code}}">{{$course->code}}</div>
<!-- <div class="external-event bg-yellow">EEC093</div>
<div class="external-event bg-red">EEC215</div> -->
<button class="btn btn-sm btn-slick col-md-3 drop-course" data-courseid="{{$course->id}}">DROP</button>

@endforeach
                
               
              