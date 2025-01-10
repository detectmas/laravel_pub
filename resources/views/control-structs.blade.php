@include('inner-blade')
<h4>Learning Control Structures</h4>
{{"On this page, the user can experiment with the blade engine!"}}
@if(true)
<h4>Hello World</h4>
@endif

@for($i=0;$i<10;$i++)
<h4>{{$i}}</h4>
@endfor

@foreach ($users as $user)
<li>Hi {{$user}}!</li>   
@endforeach

{{-- Using php in js --}}
<script>
    var data = @json($users);
    console.warn(data[0]);
</script>