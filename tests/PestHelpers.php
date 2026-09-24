<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Activity\Models\Activity;
use Modules\User\Contracts\UserContract;
=======
<<<<<<< .merge_file_SvOLxX
<<<<<<< HEAD
<<<<<<< .merge_file_DMWnAZ

use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Activity\Models\Activity;
=======
use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Activity\Models\Activity;
use Modules\User\Contracts\UserContract;
>>>>>>> .merge_file_ZzYkfE
=======

use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Activity\Models\Activity;
>>>>>>> a95e8f36 (.)
=======
use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Activity\Models\Activity;
use Modules\User\Contracts\UserContract;
>>>>>>> .merge_file_Kz9jMl
>>>>>>> laraxot/dev
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;

/**
 * Helper Pest/PHPStan — modulo Activity.
 *
 * @see Modules/Platform/tests/PestHelpers.php
 */

/**
 * @param  array<string, mixed>  $attributes
 */
function activityCreateUser(array $attributes = []): User
{
    $user = UserFactory::new()->createOne($attributes);
<<<<<<< HEAD
    assert($user instanceof User);
=======
<<<<<<< .merge_file_SvOLxX
<<<<<<< HEAD
<<<<<<< .merge_file_DMWnAZ
    assert($user instanceof User);
=======
    assert($user instanceof UserContract);
>>>>>>> .merge_file_ZzYkfE
=======
    assert($user instanceof User);
>>>>>>> a95e8f36 (.)
=======
    assert($user instanceof User);
>>>>>>> .merge_file_Kz9jMl
>>>>>>> laraxot/dev

    return $user;
}

/**
 * @param  array<string, mixed>  $attributes
 */
function activityCreateActivity(array $attributes = []): Activity
{
    $activity = ActivityFactory::new()->createOne($attributes);
    assert($activity instanceof Activity);

    return $activity;
}
