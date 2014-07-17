<?php
if($channel = Channel::where('category_id',1)->with('images')->get()):
    $channel = $channel->toArray();
endif;
?>
@if(count($channel))
<div class="about-docs">
    <div class="wrapper">
        <div class="us-title mar-title">Документы</div>
        <ul class="documents">
            @foreach($channel as $doc)
            <li>
                <div class="doc-photo">
                    <div class="doc-img" style="background-image: url(uploads/galleries/{{ $doc['images']['name'] }})"></div>
                    <div class="doc-type"><span>{{ File::extension(public_path($doc['file'])) }}</span></div>
                </div>
                <a href="{{ $doc['file'] }}" class="doc-name">{{ $doc['title'] }}</a>
                <div class="doc-size">{{ $doc['short'] }}</div>
            @endforeach
        </ul>
    </div>
</div>
@endif