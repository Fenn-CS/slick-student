@foreach($courses as $course)
<div class="external-event @if($course->status=='C')
bg-green @elsif($course->status=='B') bg-red @elseif($course->status=='B') bg-red @endif available-course"  data-coursecode="{{$course->code}}">{{$course->code}}</div>
<!-- <div class="external-event bg-yellow">EEC093</div>
<div class="external-event bg-red">EEC215</div> -->
@endforeach