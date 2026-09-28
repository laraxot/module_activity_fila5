<<<<<<< HEAD
<?php

declare(strict_types=1);
?>
=======
>>>>>>> laraxot/dev
@foreach($getState() as $variable => $value)
    <p>
        {{$variable}}={{$value}}
        @if(!$loop->last),
        @endif
    </p>
@endforeach
