<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Feature;
<<<<<<< HEAD
=======

>>>>>>> 2d6a374 (.)
use Filament\Actions\Action;
use Modules\Activity\Events\ActivityEvent;
use Modules\Activity\Filament\Actions\ListLogActivitiesAction;
use Modules\Activity\Filament\Pages\Concerns\CanPaginate;
use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\EditActivity;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\ListActivities;
use Modules\Activity\Filament\Resources\SnapshotResource;
use Modules\Activity\Filament\Resources\SnapshotResource\Pages\ListSnapshots;
use Modules\Activity\Filament\Resources\StoredEventResource;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\ListStoredEvents;
use Modules\Activity\Models\Activity;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Filament\Actions\XotBaseAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use function Safe\class_uses;
=======
>>>>>>> 2d6a374 (.)

uses(\Modules\Activity\Tests\TestCase::class);

<<<<<<< HEAD
describe('ActivityEvent', function (): void {
<<<<<<< HEAD
    test('can be instantiated', function (): void {
=======
describe('ActivityEvent', function(): void {
    it('can be instantiated', function(): void {
>>>>>>> 2b6968d (.)
        $event = new ActivityEvent;
        Assert::assertInstanceOf(ActivityEvent::class, $event);
    });

<<<<<<< HEAD
    test('uses correct traits', function (): void {
=======
    it('uses correct traits', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('can be instantiated', function (): void {
        $event = new ActivityEvent;
        expect($event)->toBeInstanceOf(ActivityEvent::class);
    });

    it('uses correct traits', function (): void {
>>>>>>> 2d6a374 (.)
        $event = new ActivityEvent;

        // Verify the event has the traits
        $traits = class_uses($event);
        Assert::assertArrayHasKey('Illuminate\Broadcasting\InteractsWithSockets', $traits);
        Assert::assertArrayHasKey('Illuminate\Foundation\Events\Dispatchable', $traits);
        Assert::assertArrayHasKey('Illuminate\Queue\SerializesModels', $traits);
    });
});

<<<<<<< HEAD
describe('ListLogActivitiesAction', function (): void {
<<<<<<< HEAD
    test('extends XotBaseAction', function (): void {
=======
describe('ListLogActivitiesAction', function(): void {
    it('extends XotBaseAction', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('extends XotBaseAction', function (): void {
>>>>>>> 2d6a374 (.)
        $action = new class('list_log_activities') extends XotBaseAction
        {
            protected function setUp(): void
            {
                parent::setUp();
            }
        };
        Assert::assertInstanceOf(XotBaseAction::class, $action);
    });

<<<<<<< HEAD
    test('has getDefaultName method that returns list_log_activities', function (): void {
=======
    it('has getDefaultName method that returns list_log_activities', function(): void {
>>>>>>> 2b6968d (.)
        // Use reflection to check the static method
        $reflection = new \ReflectionClass(ListLogActivitiesAction::class);
        $method = $reflection->getMethod('getDefaultName');

        $result = $method->invoke(null);
        Assert::assertSame('list_log_activities', $result);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('is a Filament action', function (): void {
=======
    it('is a Filament action', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('is a Filament action', function (): void {
>>>>>>> 2d6a374 (.)
        $action = new class('list_log_activities') extends XotBaseAction
        {
            protected function setUp(): void
            {
                parent::setUp();
            }
        };

<<<<<<< HEAD
        Assert::assertInstanceOf(Action::class, $action);
=======
        expect($action)->toBeInstanceOf(Action::class);
>>>>>>> 2d6a374 (.)
    });
});

<<<<<<< HEAD
describe('CanPaginate trait', function (): void {
    test('has required methods from trait', function (): void {
=======
describe('CanPaginate trait', function(): void {
    it('has required methods from trait', function(): void {
>>>>>>> 2b6968d (.)
        // Check the trait exists and has the expected methods
        $trait = new \ReflectionClass(CanPaginate::class);

<<<<<<< HEAD
        Assert::assertTrue($trait->hasMethod('getRecordsPerPage'));
        Assert::assertTrue($trait->hasMethod('getPaginationPageName'));
        Assert::assertTrue($trait->hasMethod('getPerPageSessionKey'));
        Assert::assertTrue($trait->hasMethod('getDefaultRecordsPerPageSelectOption'));
        Assert::assertTrue($trait->hasMethod('updatedRecordsPerPage'));
        Assert::assertTrue($trait->hasMethod('getTablePage'));
        Assert::assertTrue($trait->hasMethod('paginateQuery'));
        Assert::assertTrue($trait->hasMethod('getRecordsPerPageSelectOptions'));
    });

<<<<<<< HEAD
    test('trait has recordsPerPage property', function (): void {
=======
    it('trait has recordsPerPage property', function(): void {
>>>>>>> 2b6968d (.)
        $trait = new \ReflectionClass(CanPaginate::class);

        Assert::assertTrue($trait->hasProperty('recordsPerPage'));
    });

<<<<<<< HEAD
    test('trait has defaultRecordsPerPageSelectOption property', function (): void {
=======
    it('trait has defaultRecordsPerPageSelectOption property', function(): void {
>>>>>>> 2b6968d (.)
        $trait = new \ReflectionClass(CanPaginate::class);

        Assert::assertTrue($trait->hasProperty('defaultRecordsPerPageSelectOption'));
    });

<<<<<<< HEAD
    test('trait has getRecordsPerPageSelectOptions method', function (): void {
=======
    it('trait has getRecordsPerPageSelectOptions method', function(): void {
>>>>>>> 2b6968d (.)
        $trait = new \ReflectionClass(CanPaginate::class);

        Assert::assertTrue($trait->hasMethod('getRecordsPerPageSelectOptions'));
=======
        expect($trait->hasMethod('getRecordsPerPage'))->toBeTrue();
        expect($trait->hasMethod('getPaginationPageName'))->toBeTrue();
        expect($trait->hasMethod('getPerPageSessionKey'))->toBeTrue();
        expect($trait->hasMethod('getDefaultRecordsPerPageSelectOption'))->toBeTrue();
        expect($trait->hasMethod('updatedRecordsPerPage'))->toBeTrue();
        expect($trait->hasMethod('getTablePage'))->toBeTrue();
        expect($trait->hasMethod('paginateQuery'))->toBeTrue();
        expect($trait->hasMethod('getRecordsPerPageSelectOptions'))->toBeTrue();
    });

    it('trait has recordsPerPage property', function (): void {
        $trait = new \ReflectionClass(CanPaginate::class);

        expect($trait->hasProperty('recordsPerPage'))->toBeTrue();
    });

    it('trait has defaultRecordsPerPageSelectOption property', function (): void {
        $trait = new \ReflectionClass(CanPaginate::class);

        expect($trait->hasProperty('defaultRecordsPerPageSelectOption'))->toBeTrue();
    });

    it('trait has getRecordsPerPageSelectOptions method', function (): void {
        $trait = new \ReflectionClass(CanPaginate::class);

        expect($trait->hasMethod('getRecordsPerPageSelectOptions'))->toBeTrue();
>>>>>>> 2d6a374 (.)
    });
});

<<<<<<< HEAD
describe('ActivityResource', function (): void {
<<<<<<< HEAD
    test('can be instantiated', function (): void {
=======
describe('ActivityResource', function(): void {
    it('can be instantiated', function(): void {
>>>>>>> 2b6968d (.)
        $resource = new ActivityResource;
        Assert::assertInstanceOf(ActivityResource::class, $resource);
=======
    it('can be instantiated', function (): void {
        $resource = new ActivityResource;
        expect($resource)->toBeInstanceOf(ActivityResource::class);
>>>>>>> 2d6a374 (.)
    });

<<<<<<< HEAD
    test('has correct model', function (): void {
        Assert::assertSame(Activity::class, ActivityResource::getModel());
    });

    test('has required form schema fields', function (): void {
        $schema = ActivityResource::getFormSchema();

        Assert::assertArrayHasKey('log_name', $schema);
        Assert::assertArrayHasKey('description', $schema);
        Assert::assertArrayHasKey('subject_type', $schema);
        Assert::assertArrayHasKey('subject_id', $schema);
        Assert::assertArrayHasKey('causer_type', $schema);
        Assert::assertArrayHasKey('causer_id', $schema);
        Assert::assertArrayHasKey('properties', $schema);
        Assert::assertArrayHasKey('batch_uuid', $schema);
    });
});

describe('EditActivity page', function (): void {
    test('can be instantiated', function (): void {
=======
    it('has correct model', function(): void {
        expect(ActivityResource::getModel())->toBe(Activity::class);
    });

    it('has required form schema fields', function(): void {
        $schema = ActivityResource::getFormSchema();

        expect($schema)->toHaveKey('log_name');
        expect($schema)->toHaveKey('description');
        expect($schema)->toHaveKey('subject_type');
        expect($schema)->toHaveKey('subject_id');
        expect($schema)->toHaveKey('causer_type');
        expect($schema)->toHaveKey('causer_id');
        expect($schema)->toHaveKey('properties');
        expect($schema)->toHaveKey('batch_uuid');
    });

    it('has relations method', function(): void {
        expect(method_exists(ActivityResource::class, 'getRelations'))->toBeTrue();
    });

    it('has pages method', function(): void {
        expect(method_exists(ActivityResource::class, 'getPages'))->toBeTrue();
    });
});

<<<<<<< HEAD
describe('EditActivity page', function(): void {
    it('can be instantiated', function(): void {
>>>>>>> 2b6968d (.)
        $page = new EditActivity;
        Assert::assertInstanceOf(EditActivity::class, $page);
=======
describe('EditActivity page', function (): void {
    it('can be instantiated', function (): void {
        $page = new EditActivity;
        expect($page)->toBeInstanceOf(EditActivity::class);
>>>>>>> 2d6a374 (.)
    });

<<<<<<< HEAD
    test('uses correct resource via getResource', function (): void {
=======
    it('uses correct resource via getResource', function(): void {
>>>>>>> 2b6968d (.)
        // Use reflection to access protected static $resource
        $reflection = new \ReflectionClass(EditActivity::class);
        $property = $reflection->getProperty('resource');
        $property->setAccessible(true);

        $resource = $property->getValue();
        Assert::assertSame(ActivityResource::class, $resource);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('extends XotBaseEditRecord', function (): void {
=======
    it('extends XotBaseEditRecord', function(): void {
>>>>>>> 2b6968d (.)
        $page = new EditActivity;
        Assert::assertInstanceOf(XotBaseEditRecord::class, $page);
=======
    it('extends XotBaseEditRecord', function (): void {
        $page = new EditActivity;
        expect($page)->toBeInstanceOf(XotBaseEditRecord::class);
>>>>>>> 2d6a374 (.)
    });
});

<<<<<<< HEAD
describe('ListActivities page', function (): void {
<<<<<<< HEAD
    test('can be instantiated', function (): void {
=======
describe('ListActivities page', function(): void {
    it('can be instantiated', function(): void {
>>>>>>> 2b6968d (.)
        $page = new ListActivities;
        Assert::assertInstanceOf(ListActivities::class, $page);
=======
    it('can be instantiated', function (): void {
        $page = new ListActivities;
        expect($page)->toBeInstanceOf(ListActivities::class);
>>>>>>> 2d6a374 (.)
    });

<<<<<<< HEAD
    test('uses correct resource via getResource', function (): void {
=======
    it('uses correct resource via getResource', function(): void {
>>>>>>> 2b6968d (.)
        $reflection = new \ReflectionClass(ListActivities::class);
        $property = $reflection->getProperty('resource');
        $property->setAccessible(true);

        $resource = $property->getValue();
        Assert::assertSame(ActivityResource::class, $resource);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('has table columns', function (): void {
=======
    it('has table columns', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('has table columns', function (): void {
>>>>>>> 2d6a374 (.)
        $page = new ListActivities;
        $columns = $page->getTableColumns();

        Assert::assertArrayHasKey('id', $columns);
        Assert::assertArrayHasKey('description', $columns);
        Assert::assertArrayHasKey('subject_type', $columns);
        Assert::assertArrayHasKey('subject_id', $columns);
        Assert::assertArrayHasKey('causer_type', $columns);
        Assert::assertArrayHasKey('causer_id', $columns);
        Assert::assertArrayHasKey('created_at', $columns);
    });
});

<<<<<<< HEAD
describe('SnapshotResource', function (): void {
<<<<<<< HEAD
    test('can be instantiated', function (): void {
=======
describe('SnapshotResource', function(): void {
    it('can be instantiated', function(): void {
>>>>>>> 2b6968d (.)
        $resource = new SnapshotResource;
        Assert::assertInstanceOf(SnapshotResource::class, $resource);
=======
    it('can be instantiated', function (): void {
        $resource = new SnapshotResource;
        expect($resource)->toBeInstanceOf(SnapshotResource::class);
>>>>>>> 2d6a374 (.)
    });

<<<<<<< HEAD
    test('has correct model', function (): void {
        Assert::assertSame(Snapshot::class, SnapshotResource::getModel());
    });

    test('has required form schema fields', function (): void {
=======
    it('has correct model', function(): void {
        expect(SnapshotResource::getModel())->toBe(Snapshot::class);
    });

    it('has required form schema fields', function(): void {
>>>>>>> 2b6968d (.)
        $schema = SnapshotResource::getFormSchema();

        Assert::assertArrayHasKey('model_type', $schema);
        Assert::assertArrayHasKey('model_id', $schema);
        Assert::assertArrayHasKey('state', $schema);
        Assert::assertArrayHasKey('created_by_type', $schema);
        Assert::assertArrayHasKey('created_by_id', $schema);
    });
});

<<<<<<< HEAD
describe('ListSnapshots page', function (): void {
<<<<<<< HEAD
    test('can be instantiated', function (): void {
=======
describe('ListSnapshots page', function(): void {
    it('can be instantiated', function(): void {
>>>>>>> 2b6968d (.)
        $page = new ListSnapshots;
        Assert::assertInstanceOf(ListSnapshots::class, $page);
=======
    it('can be instantiated', function (): void {
        $page = new ListSnapshots;
        expect($page)->toBeInstanceOf(ListSnapshots::class);
>>>>>>> 2d6a374 (.)
    });

<<<<<<< HEAD
    test('uses correct resource via getResource', function (): void {
=======
    it('uses correct resource via getResource', function(): void {
>>>>>>> 2b6968d (.)
        $reflection = new \ReflectionClass(ListSnapshots::class);
        $property = $reflection->getProperty('resource');
        $property->setAccessible(true);

        $resource = $property->getValue();
        Assert::assertSame(SnapshotResource::class, $resource);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('has table columns', function (): void {
=======
    it('has table columns', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('has table columns', function (): void {
>>>>>>> 2d6a374 (.)
        $page = new ListSnapshots;
        $columns = $page->getTableColumns();

        Assert::assertArrayHasKey('id', $columns);
        Assert::assertArrayHasKey('aggregate_uuid', $columns);
        Assert::assertArrayHasKey('aggregate_version', $columns);
        Assert::assertArrayHasKey('state', $columns);
        Assert::assertArrayHasKey('created_at', $columns);
        Assert::assertArrayHasKey('updated_at', $columns);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('has table filters', function (): void {
=======
    it('has table filters', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('has table filters', function (): void {
>>>>>>> 2d6a374 (.)
        $page = new ListSnapshots;
        $filters = $page->getTableFilters();

        Assert::assertNotEmpty($filters);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('has table actions', function (): void {
=======
    it('has table actions', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('has table actions', function (): void {
>>>>>>> 2d6a374 (.)
        $page = new ListSnapshots;
        $actions = $page->getTableActions();

        Assert::assertArrayHasKey('view', $actions);
        Assert::assertArrayHasKey('edit', $actions);
        Assert::assertArrayHasKey('delete', $actions);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('has bulk actions', function (): void {
=======
    it('has bulk actions', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('has bulk actions', function (): void {
>>>>>>> 2d6a374 (.)
        $page = new ListSnapshots;
        $bulkActions = $page->getTableBulkActions();

        Assert::assertNotEmpty($bulkActions);
    });
});

<<<<<<< HEAD
describe('StoredEventResource', function (): void {
<<<<<<< HEAD
    test('can be instantiated', function (): void {
=======
describe('StoredEventResource', function(): void {
    it('can be instantiated', function(): void {
>>>>>>> 2b6968d (.)
        $resource = new StoredEventResource;
        Assert::assertInstanceOf(StoredEventResource::class, $resource);
=======
    it('can be instantiated', function (): void {
        $resource = new StoredEventResource;
        expect($resource)->toBeInstanceOf(StoredEventResource::class);
>>>>>>> 2d6a374 (.)
    });

<<<<<<< HEAD
    test('has correct model', function (): void {
        Assert::assertSame(StoredEvent::class, StoredEventResource::getModel());
    });

    test('has required form schema fields', function (): void {
=======
    it('has correct model', function(): void {
        expect(StoredEventResource::getModel())->toBe(StoredEvent::class);
    });

    it('has required form schema fields', function(): void {
>>>>>>> 2b6968d (.)
        $schema = StoredEventResource::getFormSchema();

        Assert::assertArrayHasKey('event_class', $schema);
        Assert::assertArrayHasKey('event_properties', $schema);
        Assert::assertArrayHasKey('aggregate_uuid', $schema);
        Assert::assertArrayHasKey('aggregate_version', $schema);
        Assert::assertArrayHasKey('meta_data', $schema);
        Assert::assertArrayHasKey('created_at', $schema);
    });
});

<<<<<<< HEAD
describe('ListStoredEvents page', function (): void {
<<<<<<< HEAD
    test('can be instantiated', function (): void {
=======
describe('ListStoredEvents page', function(): void {
    it('can be instantiated', function(): void {
>>>>>>> 2b6968d (.)
        $page = new ListStoredEvents;
        Assert::assertInstanceOf(ListStoredEvents::class, $page);
    });

<<<<<<< HEAD
    test('uses correct resource via getResource', function (): void {
=======
    it('uses correct resource via getResource', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('can be instantiated', function (): void {
        $page = new ListStoredEvents;
        expect($page)->toBeInstanceOf(ListStoredEvents::class);
    });

    it('uses correct resource via getResource', function (): void {
>>>>>>> 2d6a374 (.)
        $reflection = new \ReflectionClass(ListStoredEvents::class);
        $property = $reflection->getProperty('resource');
        $property->setAccessible(true);

        $resource = $property->getValue();
        Assert::assertSame(StoredEventResource::class, $resource);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('has table columns', function (): void {
=======
    it('has table columns', function(): void {
>>>>>>> 2b6968d (.)
=======
    it('has table columns', function (): void {
>>>>>>> 2d6a374 (.)
        $page = new ListStoredEvents;
        $columns = $page->getTableColumns();

        Assert::assertArrayHasKey('id', $columns);
        Assert::assertArrayHasKey('event_class', $columns);
        Assert::assertArrayHasKey('event_properties', $columns);
    });
});
