<h1>{{$name}}</h1>

{{-- @if(count($listings) == 0)
    <p>There are no listings</p>
@endif --}}


@unless(count($listings) == 0)
<ul>
    @foreach ($listings as $listing) 
        <li>
            <a href="/listing/{{$listing['id']}}"> 
                 {{ $listing['title'] }} 
            </a>
            <h3> {{$listing['body']}}</h3>
        </li>
    @endforeach;
</ul>

@else
    <p>There are no listings</p>
@endunless