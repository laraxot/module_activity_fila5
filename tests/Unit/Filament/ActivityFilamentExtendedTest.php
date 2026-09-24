<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Filament;

use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\Column;
use Mockery;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\EditActivity;
use Modules\Activity\Filament\Resources\ActivityResource\Schemas\ActivityInfolist;
use Modules\Activity\Filament\Resources\ActivityResource\Tables\ActivitiesTable;
use Modules\Activity\Filament\Resources\SnapshotResource\Schemas\SnapshotForm;
use Modules\Activity\Filament\Resources\SnapshotResource\Schemas\SnapshotInfolist;
use Modules\Activity\Filament\Resources\SnapshotResource\Tables\SnapshotsTable;
use Modules\Activity\Filament\Resources\StoredEventResource\Schemas\StoredEventForm;
use Modules\Activity\Filament\Resources\StoredEventResource\Schemas\StoredEventInfolist;
use Modules\Activity\Filament\Resources\StoredEventResource\Tables\StoredEventsTable;
use PHPUnit\Framework\Assert;
use ReflectionMethod;

afterEach(function (): void {
    Mockery::close();
});

test('EditActivity espone DeleteAction in header', function (): void {
    $method = new ReflectionMethod(EditActivity::class, 'getHeaderActions');
    $method->setAccessible(true);

    /** @var array<string, DeleteAction> $actions */
<<<<<<< HEAD
    $actions = $method->invoke(new EditActivity);
=======
<<<<<<< .merge_file_HFipzE
<<<<<<< HEAD
<<<<<<< .merge_file_onJQbq
    $actions = $method->invoke(new EditActivity());
=======
    $actions = $method->invoke(new EditActivity);
>>>>>>> .merge_file_gheLFX
=======
    $actions = $method->invoke(new EditActivity());
>>>>>>> a95e8f36 (.)
=======
    $actions = $method->invoke(new EditActivity);
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev

    Assert::assertArrayHasKey('delete', $actions);
    Assert::assertInstanceOf(DeleteAction::class, $actions['delete']);
});

test('ActivitiesTable espone colonne complete', function (): void {
<<<<<<< HEAD
    $tabella = new ActivitiesTable;
=======
<<<<<<< .merge_file_HFipzE
<<<<<<< HEAD
<<<<<<< .merge_file_onJQbq
    $tabella = new ActivitiesTable();
=======
    $tabella = new ActivitiesTable;
>>>>>>> .merge_file_gheLFX
=======
    $tabella = new ActivitiesTable();
>>>>>>> a95e8f36 (.)
=======
    $tabella = new ActivitiesTable;
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev

    Assert::assertSame(
        [
            'id', 'log_name', 'description', 'event', 'subject_type', 'subject_id',
            'causer_type', 'causer_id', 'properties', 'batch_uuid', 'created_at', 'updated_at',
        ],
        array_keys($tabella->getTableColumns()),
    );
    Assert::assertContainsOnlyInstancesOf(Column::class, $tabella->getTableColumns());
});

test('ActivityInfolist espone schema infolist', function (): void {
<<<<<<< HEAD
    $instance = app(ActivityInfolist::class);
=======
<<<<<<< .merge_file_HFipzE
<<<<<<< HEAD
<<<<<<< .merge_file_onJQbq
    $instance = app(\Modules\Activity\Filament\Resources\ActivityResource\Schemas\ActivityInfolist::class);
=======
    $instance = app(ActivityInfolist::class);
>>>>>>> .merge_file_gheLFX
=======
    $instance = app(\Modules\Activity\Filament\Resources\ActivityResource\Schemas\ActivityInfolist::class);
>>>>>>> a95e8f36 (.)
=======
    $instance = app(ActivityInfolist::class);
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev
    $schema = $instance->getInfolistSchema();

    Assert::assertSame(
        [
            'id', 'log_name', 'description', 'event', 'subject_type', 'subject_id',
            'causer_type', 'causer_id', 'batch_uuid', 'created_at',
        ],
        array_keys($schema),
    );
});

test('SnapshotsTable espone colonne attese', function (): void {
<<<<<<< HEAD
    $tabella = new SnapshotsTable;
=======
<<<<<<< .merge_file_HFipzE
<<<<<<< HEAD
<<<<<<< .merge_file_onJQbq
    $tabella = new SnapshotsTable();
=======
    $tabella = new SnapshotsTable;
>>>>>>> .merge_file_gheLFX
=======
    $tabella = new SnapshotsTable();
>>>>>>> a95e8f36 (.)
=======
    $tabella = new SnapshotsTable;
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev

    Assert::assertSame(
        ['id', 'aggregate_uuid', 'aggregate_version', 'state', 'created_at', 'updated_at'],
        array_keys($tabella->getTableColumns()),
    );
});

test('SnapshotForm e SnapshotInfolist espongono schema', function (): void {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_HFipzE
<<<<<<< HEAD
<<<<<<< .merge_file_onJQbq
=======
>>>>>>> a95e8f36 (.)
    Assert::assertSame(['aggregate_uuid', 'aggregate_version', 'state'], array_keys(app(\Modules\Activity\Filament\Resources\SnapshotResource\Schemas\SnapshotForm::class)->getFormSchema()));
    Assert::assertSame(
        ['id', 'model_type', 'model_id', 'created_by_type', 'created_by_id', 'created_at'],
        array_keys(app(\Modules\Activity\Filament\Resources\SnapshotResource\Schemas\SnapshotInfolist::class)->getInfolistSchema()),
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev
    Assert::assertSame(['aggregate_uuid', 'aggregate_version', 'state'], array_keys(app(SnapshotForm::class)->getFormSchema()));
    Assert::assertSame(
        ['id', 'model_type', 'model_id', 'created_by_type', 'created_by_id', 'created_at'],
        array_keys(app(SnapshotInfolist::class)->getInfolistSchema()),
<<<<<<< HEAD
=======
<<<<<<< .merge_file_HFipzE
>>>>>>> .merge_file_gheLFX
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev
    );
});

test('StoredEventsTable StoredEventForm StoredEventInfolist espongono schema', function (): void {
<<<<<<< HEAD
    $tabella = new StoredEventsTable;
=======
<<<<<<< .merge_file_HFipzE
<<<<<<< HEAD
<<<<<<< .merge_file_onJQbq
    $tabella = new StoredEventsTable();
=======
    $tabella = new StoredEventsTable;
>>>>>>> .merge_file_gheLFX
=======
    $tabella = new StoredEventsTable();
>>>>>>> a95e8f36 (.)
=======
    $tabella = new StoredEventsTable;
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev
    Assert::assertSame(
        ['id', 'event_class', 'properties', 'created_at', 'updated_at'],
        array_keys($tabella->getTableColumns()),
    );

    Assert::assertSame(
        ['event_class', 'event_properties', 'aggregate_uuid', 'aggregate_version', 'meta_data', 'created_at'],
<<<<<<< HEAD
        array_keys(app(StoredEventForm::class)->getFormSchema()),
=======
<<<<<<< .merge_file_HFipzE
<<<<<<< HEAD
<<<<<<< .merge_file_onJQbq
        array_keys(app(\Modules\Activity\Filament\Resources\StoredEventResource\Schemas\StoredEventForm::class)->getFormSchema()),
=======
        array_keys(app(StoredEventForm::class)->getFormSchema()),
>>>>>>> .merge_file_gheLFX
=======
        array_keys(app(\Modules\Activity\Filament\Resources\StoredEventResource\Schemas\StoredEventForm::class)->getFormSchema()),
>>>>>>> a95e8f36 (.)
=======
        array_keys(app(StoredEventForm::class)->getFormSchema()),
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev
    );

    Assert::assertSame(
        ['id', 'event_class', 'aggregate_uuid', 'aggregate_version', 'created_at'],
<<<<<<< HEAD
        array_keys(app(StoredEventInfolist::class)->getInfolistSchema()),
=======
<<<<<<< .merge_file_HFipzE
<<<<<<< HEAD
<<<<<<< .merge_file_onJQbq
        array_keys(app(\Modules\Activity\Filament\Resources\StoredEventResource\Schemas\StoredEventInfolist::class)->getInfolistSchema()),
=======
        array_keys(app(StoredEventInfolist::class)->getInfolistSchema()),
>>>>>>> .merge_file_gheLFX
=======
        array_keys(app(\Modules\Activity\Filament\Resources\StoredEventResource\Schemas\StoredEventInfolist::class)->getInfolistSchema()),
>>>>>>> a95e8f36 (.)
=======
        array_keys(app(StoredEventInfolist::class)->getInfolistSchema()),
>>>>>>> .merge_file_g4efdc
>>>>>>> laraxot/dev
    );
});
