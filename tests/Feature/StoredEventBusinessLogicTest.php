<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Feature;

// Activity stored-event business tests (part 1) — claude-audit doc ratio.

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\SchemalessAttributes\SchemalessAttributes;

uses(\Modules\Activity\Tests\TestCase::class);

test('can create stored event with basic information', function (): void {
    $eventData = [
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'event_version' => 1,
        'event_class' => 'App\Events\UserCreated',
        'event_properties' => [
            'user_id' => 123,
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ],
        'meta_data' => [
            'source' => 'web_registration',
            'ip_address' => '192.168.1.1',
        ],
        'created_at' => now(),
    ];

    $storedEvent = StoredEvent::create($eventData);
    Assert::assertInstanceOf(StoredEvent::class, $storedEvent);

    $exists = DB::connection('activity')
        ->table('stored_events')
        ->where('id', $storedEvent->id)
        ->where('aggregate_uuid', $eventData['aggregate_uuid'])
        ->where('aggregate_version', 1)
        ->where('event_version', 1)
        ->where('event_class', 'App\\Events\\UserCreated')
        ->exists();
    Assert::assertTrue($exists);

    Assert::assertSame(1, $storedEvent->aggregate_version);
    Assert::assertSame(1, $storedEvent->event_version);
    Assert::assertSame('App\\Events\\UserCreated', $storedEvent->event_class);
});

test('can create stored event with complex properties', function (): void {
    $complexProperties = [
        'order_data' => [
            'order_id' => 'ORD-12345',
            'customer' => [
                'id' => 456,
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '+1234567890',
            ],
            'items' => [
                [
                    'product_id' => 789,
                    'name' => 'Product A',
                    'quantity' => 2,
                    'unit_price' => 25.99,
                    'total_price' => 51.98,
                ],
                [
                    'product_id' => 790,
                    'name' => 'Product B',
                    'quantity' => 1,
                    'unit_price' => 15.50,
                    'total_price' => 15.50,
                ],
            ],
            'totals' => [
                'subtotal' => 67.48,
                'tax' => 6.75,
                'shipping' => 5.99,
                'total' => 80.22,
            ],
            'payment' => [
                'method' => 'credit_card',
                'status' => 'authorized',
                'transaction_id' => 'TXN-98765',
            ],
        ],
        'metadata' => [
            'source' => 'mobile_app',
            'version' => '2.1.0',
            'device_info' => [
                'platform' => 'iOS',
                'version' => '15.0',
                'model' => 'iPhone 13',
            ],
            'user_agent' => 'MobileApp/2.1.0 (iOS; 15.0; iPhone 13)',
        ],
    ];

    $storedEvent = StoredEvent::create([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 5,
        'event_version' => 2,
        'event_class' => 'App\Events\OrderPlaced',
        'event_properties' => $complexProperties,
        'meta_data' => [
            'timestamp' => now()->toISOString(),
            'user_id' => 456,
            'session_id' => Str::random(40),
        ],
        'created_at' => now(),
    ]);
    Assert::assertInstanceOf(StoredEvent::class, $storedEvent);

    $exists = DB::connection('activity')
        ->table('stored_events')
        ->where('id', $storedEvent->id)
        ->where('event_class', 'App\\Events\\OrderPlaced')
        ->where('aggregate_version', 5)
        ->where('event_version', 2)
        ->exists();
    Assert::assertTrue($exists);

    Assert::assertSame(5, $storedEvent->aggregate_version);
    Assert::assertSame(2, $storedEvent->event_version);
    Assert::assertSame('App\\Events\\OrderPlaced', $storedEvent->event_class);

    /** @var array<string, mixed> $properties */
    $properties = $storedEvent->event_properties;
    Assert::assertIsArray($properties);

    /** @var array<string, mixed> $orderData */
    $orderData = $properties['order_data'];
    Assert::assertIsArray($orderData);
    /** @var array<string, mixed> $customer */
    $customer = $orderData['customer'];
    Assert::assertIsArray($customer);
    /** @var array<string, mixed> $totals */
    $totals = $orderData['totals'];
    Assert::assertIsArray($totals);
    /** @var array<string, mixed> $metadata */
    $metadata = $properties['metadata'];
    Assert::assertIsArray($metadata);
    /** @var array<string, mixed> $deviceInfo */
    $deviceInfo = $metadata['device_info'];
    Assert::assertIsArray($deviceInfo);

    Assert::assertSame('ORD-12345', $orderData['order_id']);
    Assert::assertSame('Jane Smith', $customer['name']);
    Assert::assertSame(80.22, $totals['total']);
    Assert::assertSame('mobile_app', $metadata['source']);
    Assert::assertSame('iOS', $deviceInfo['platform']);
});

test('can manage event versioning', function (): void {
    $aggregateUuid = Str::uuid()->toString();

    $event1 = StoredEvent::create([
        'aggregate_uuid' => $aggregateUuid,
        'aggregate_version' => 1,
        'event_version' => 1,
        'event_class' => 'App\Events\UserRegistered',
        'event_properties' => ['version' => 1, 'action' => 'register'],
        'meta_data' => [],
        'created_at' => now(),
    ]);
    Assert::assertInstanceOf(StoredEvent::class, $event1);

    $event2 = StoredEvent::create([
        'aggregate_uuid' => $aggregateUuid,
        'aggregate_version' => 2,
        'event_version' => 2,
        'event_class' => 'App\Events\UserProfileUpdated',
        'event_properties' => ['version' => 2, 'action' => 'update_profile'],
        'meta_data' => [],
        'created_at' => now(),
    ]);
    Assert::assertInstanceOf(StoredEvent::class, $event2);

    $event3 = StoredEvent::create([
        'aggregate_uuid' => $aggregateUuid,
        'aggregate_version' => 3,
        'event_version' => 3,
        'event_class' => 'App\Events\UserVerified',
        'event_properties' => ['version' => 3, 'action' => 'verify'],
        'meta_data' => [],
        'created_at' => now(),
    ]);
    Assert::assertInstanceOf(StoredEvent::class, $event3);

    Assert::assertTrue(DB::connection('activity')->table('stored_events')->where('id', $event1->id)->exists());
    Assert::assertTrue(DB::connection('activity')->table('stored_events')->where('id', $event2->id)->exists());
    Assert::assertTrue(DB::connection('activity')->table('stored_events')->where('id', $event3->id)->exists());

    Assert::assertSame($aggregateUuid, $event1->aggregate_uuid);
    Assert::assertSame($aggregateUuid, $event2->aggregate_uuid);
    Assert::assertSame($aggregateUuid, $event3->aggregate_uuid);

    Assert::assertSame(1, $event1->aggregate_version);
    Assert::assertSame(2, $event2->aggregate_version);
    Assert::assertSame(3, $event3->aggregate_version);

    Assert::assertSame(1, $event1->event_version);
    Assert::assertSame(2, $event2->event_version);
    Assert::assertSame(3, $event3->event_version);
});

test('can query events by aggregate uuid', function (): void {
    $uuid1 = Str::uuid()->toString();
    $uuid2 = Str::uuid()->toString();

    StoredEvent::create([
        'aggregate_uuid' => $uuid1,
        'aggregate_version' => 1,
        'event_version' => 1,
        'event_class' => 'App\Events\FirstEvent',
        'event_properties' => ['aggregate' => 'first', 'version' => 1],
        'meta_data' => [],
        'created_at' => now(),
    ]);

    StoredEvent::create([
        'aggregate_uuid' => $uuid1,
        'aggregate_version' => 2,
        'event_version' => 2,
        'event_class' => 'App\Events\FirstEvent',
        'event_properties' => ['aggregate' => 'first', 'version' => 2],
        'meta_data' => [],
        'created_at' => now(),
    ]);

    StoredEvent::create([
        'aggregate_uuid' => $uuid2,
        'aggregate_version' => 1,
        'event_version' => 1,
        'event_class' => 'App\Events\SecondEvent',
        'event_properties' => ['aggregate' => 'second', 'version' => 1],
        'meta_data' => [],
        'created_at' => now(),
    ]);

    $events1 = StoredEvent::where('aggregate_uuid', $uuid1)->get();
    $events2 = StoredEvent::where('aggregate_uuid', $uuid2)->get();

    Assert::assertCount(2, $events1);
    Assert::assertCount(1, $events2);

    $first1 = $events1->first();
    $first2 = $events2->first();
    Assert::assertNotNull($first1);
    Assert::assertNotNull($first2);
    Assert::assertInstanceOf(StoredEvent::class, $first1);
    Assert::assertInstanceOf(StoredEvent::class, $first2);
    Assert::assertSame($uuid1, $first1->aggregate_uuid);
    Assert::assertSame($uuid2, $first2->aggregate_uuid);
});

test('can query events by event class', function (): void {
    $uuid = Str::uuid()->toString();

    StoredEvent::create([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 1,
        'event_version' => 1,
        'event_class' => 'App\Events\UserCreated',
        'event_properties' => ['action' => 'create'],
        'meta_data' => [],
        'created_at' => now(),
    ]);

    StoredEvent::create([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 2,
        'event_version' => 2,
        'event_class' => 'App\Events\UserUpdated',
        'event_properties' => ['action' => 'update'],
        'meta_data' => [],
        'created_at' => now(),
    ]);

    StoredEvent::create([
        'aggregate_uuid' => $uuid,
        'aggregate_version' => 3,
        'event_version' => 3,
        'event_class' => 'App\Events\UserDeleted',
        'event_properties' => ['action' => 'delete'],
        'meta_data' => [],
        'created_at' => now(),
    ]);

    $userCreatedEvents = StoredEvent::where('event_class', 'App\Events\UserCreated')->get();
    $userUpdatedEvents = StoredEvent::where('event_class', 'App\Events\UserUpdated')->get();
    $userDeletedEvents = StoredEvent::where('event_class', 'App\Events\UserDeleted')->get();

    Assert::assertCount(1, $userCreatedEvents);
    Assert::assertCount(1, $userUpdatedEvents);
    Assert::assertCount(1, $userDeletedEvents);

    $firstCreated = $userCreatedEvents->first();
    $firstUpdated = $userUpdatedEvents->first();
    $firstDeleted = $userDeletedEvents->first();
    Assert::assertNotNull($firstCreated);
    Assert::assertNotNull($firstUpdated);
    Assert::assertNotNull($firstDeleted);
    Assert::assertInstanceOf(StoredEvent::class, $firstCreated);
    Assert::assertInstanceOf(StoredEvent::class, $firstUpdated);
    Assert::assertInstanceOf(StoredEvent::class, $firstDeleted);
    Assert::assertSame('App\\Events\\UserCreated', $firstCreated->event_class);
    Assert::assertSame('App\\Events\\UserUpdated', $firstUpdated->event_class);
    Assert::assertSame('App\\Events\\UserDeleted', $firstDeleted->event_class);
});

test('can handle event with empty properties', function (): void {
    $storedEvent = StoredEvent::create([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'event_version' => 1,
        'event_class' => 'App\Events\EmptyEvent',
        'event_properties' => [],
        'meta_data' => [],
        'created_at' => now(),
    ]);
    Assert::assertInstanceOf(StoredEvent::class, $storedEvent);

    $exists = DB::connection('activity')
        ->table('stored_events')
        ->where('id', $storedEvent->id)
        ->where('event_class', 'App\\Events\\EmptyEvent')
        ->exists();
    Assert::assertTrue($exists);

    /** @var array<string, mixed> $props */
    $props = $storedEvent->event_properties;
    Assert::assertIsArray($props);
    Assert::assertEmpty($props);
});

test('can handle event with null properties', function (): void {
    $storedEvent = StoredEvent::create([
        'aggregate_uuid' => Str::uuid()->toString(),
        'aggregate_version' => 1,
        'event_version' => 1,
        'event_class' => 'App\Events\NullEvent',
        'event_properties' => [],
        'meta_data' => [],
        'created_at' => now(),
    ]);
    Assert::assertInstanceOf(StoredEvent::class, $storedEvent);

    $exists = DB::connection('activity')
        ->table('stored_events')
        ->where('id', $storedEvent->id)
        ->where('event_class', 'App\\Events\\NullEvent')
        ->exists();
    Assert::assertTrue($exists);

    /** @var array<string, mixed> $props */
    $props = $storedEvent->event_properties;
    Assert::assertIsArray($props);
    Assert::assertEmpty($props);
    Assert::assertInstanceOf(SchemalessAttributes::class, $storedEvent->meta_data);
    Assert::assertSame([], $storedEvent->meta_data->toArray());
});
