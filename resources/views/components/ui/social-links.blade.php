@props(['links' => []])

@foreach($links as $link)
    <a href="{{ $link['href'] }}"
       aria-label="{{ $link['label'] }}"
       @if(!empty($link['blank'])) target="_blank" rel="noopener" @endif>
        <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
    </a>
@endforeach
