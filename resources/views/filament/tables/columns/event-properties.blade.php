<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
<?php

declare(strict_types=1);
?>
<<<<<<< HEAD
=======
=======
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
@foreach($getState() as $variable => $value)
    <p>
        {{$variable}}={{$value}}
        @if(!$loop->last),
        @endif
    </p>
@endforeach
