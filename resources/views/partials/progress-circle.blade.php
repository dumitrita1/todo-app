@php
    $radius ??= 25;
    $thickness ??= 7;
    $percentage ??= 0;

    $width = 2 * $radius + $thickness;
    $height = 2 * $radius + $thickness;
@endphp

<svg class="progress-circle" viewBox="0 0 {{ $width }} {{ $height }}" width="{{ $width }}" height="{{ $height }}"> 
    <a href='/list/java-project'>
    <circle class="progress-circle__total" cx="{{ $width / 2 }}" cy="{{ $height / 2 }}" r="{{ $radius }}" fill="none" stroke-width="{{ $thickness }}" stroke="#D9D9D9"/> 
    <circle class="progress-circle__value" cx="{{ $width / 2 }}" cy="{{ $height / 2 }}" r="{{ $radius }}" fill="none" stroke-width="{{ $thickness }}" stroke=`${randomBorderColor}` data-percentage="{{ $percentage }}" transform="rotate(-90, {{ $width / 2 }}, {{ $height / 2 }})"/>

    <text class="progress-circle__text" x="{{ $width / 2 }}" y="{{ $height / 2 }}" text-anchor="middle">
        {{ round($percentage * 100) }}%
    </text>
</svg>