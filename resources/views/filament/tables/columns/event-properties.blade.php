<<<<<<< HEAD
<?php

declare(strict_types=1);
?>
=======
>>>>>>> a95e8f36 (.)
@foreach($getState() as $variable => $value)
    <p>
        {{$variable}}={{$value}}
        @if(!$loop->last),
        @endif
    </p>
@endforeach
