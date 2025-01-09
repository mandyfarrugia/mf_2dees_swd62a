@php
    $platforms = array('github' => 'https://github.com/mandyfarrugia',
        'discord' => 'https://discord.com/users/1130040838899118120',
        'instagram' => 'https://www.instagram.com/eshalx01/',
        'linkedin' => 'https://www.linkedin.com/in/mandy-farrugia-b2868528b/',
        'spotify' => 'https://open.spotify.com/user/31kw6t434h5hkyylan44lksvnhfu'
    );
@endphp
<div class="mb-3">
    @foreach($platforms as $platform => $link)
        <a href="{{ $link }}" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-{{ $platform }}"></i>
        </a>
    @endforeach
</div>