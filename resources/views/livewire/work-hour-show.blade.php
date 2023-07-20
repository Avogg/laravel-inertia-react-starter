<div>
  @foreach([1,2,3,4,5,6] as $work)

    @if($workHours->where('day', $work)->first() != null)

    <livewire:edit-work-hour :workingHour="$workHours->where('day', $work)->first()" day="{{$work}}" />
    @else
    <livewire:work-hour day="{{$work}}" />

    @endif

  @endforeach

</div>
