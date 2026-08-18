<?php

declare(strict_types=1);

namespace Modules\Activity\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> 0a02158a (.)
use Modules\Activity\Models\Activity;

/**
 * @extends Factory<Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * @var class-string<Activity>
     */
    protected $model = Activity::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'log_name' => $this->faker->randomElement(['default', 'auth', 'system']),
            'description' => $this->faker->sentence(),
            'subject_type' => $this->faker->randomElement(['Modules\User\Models\User', 'App\Models\Appointment']),
<<<<<<< HEAD
            // User model uses UUID; subject_id/causer_id are string(36) in activity_log
            'subject_id' => $this->faker->uuid(),
            'causer_type' => 'Modules\User\Models\User',
            'causer_id' => $this->faker->uuid(),
=======
            'subject_id' => Str::uuid()->toString(),
            'causer_type' => 'Modules\User\Models\User',
            'causer_id' => Str::uuid()->toString(),
>>>>>>> 0a02158a (.)
            'properties' => ['key' => 'value'],
            'batch_uuid' => $this->faker->uuid(),
            'event' => $this->faker->randomElement(['created', 'updated', 'deleted']),
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
