<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Filament;

<<<<<<< HEAD
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
=======
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
>>>>>>> .merge_file_6yPwXo
=======
>>>>>>> a95e8f36 (.)
=======
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
use Illuminate\Support\Collection;
use Modules\Activity\Actions\ActivityLogger as ActivityLoggerAction;
use Modules\Activity\Filament\Actions\ListLogActivitiesAction;
use Modules\Activity\Filament\Pages\ListLogActivities;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\Fixtures\ActivitySubjectHarness;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesActionTestPage;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesActionTestRecord;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesActionTestResourceSimple;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesBadPaginatorPage;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesMountablePage;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesNestedFormPage;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesNonSchemaFormPage;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesPageHarness;
use PHPUnit\Framework\Assert;
use ReflectionProperty;

test('ListLogActivitiesAction url closure genera log-activity', function (): void {
    $action = ListLogActivitiesAction::make();
    $livewire = ListLogActivitiesActionTestPage::usingResource(ListLogActivitiesActionTestResourceSimple::class);
<<<<<<< HEAD
    $record = new ListLogActivitiesActionTestRecord();
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
    $record = new ListLogActivitiesActionTestRecord();
=======
    $record = new ListLogActivitiesActionTestRecord;
>>>>>>> .merge_file_6yPwXo
=======
    $record = new ListLogActivitiesActionTestRecord();
>>>>>>> a95e8f36 (.)
=======
    $record = new ListLogActivitiesActionTestRecord();
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev

    $action->livewire($livewire);
    $action->record($record);

    $url = $action->getUrl();

    Assert::assertNotNull($url);
    Assert::assertStringContainsString('log-activity', (string) $url);
});

test('ActivityLogger getStatistics copre branch event null in by_type', function (): void {
    Activity::create([
        'log_name' => 'default',
        'description' => 'null evt',
        'event' => null,
    ]);

<<<<<<< HEAD
    $stats = (new ActivityLoggerAction())->getStatistics();
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
    $stats = (new ActivityLoggerAction())->getStatistics();
=======
    $stats = (new ActivityLoggerAction)->getStatistics();
>>>>>>> .merge_file_6yPwXo
=======
    $stats = (new ActivityLoggerAction())->getStatistics();
>>>>>>> a95e8f36 (.)
=======
    $stats = (new ActivityLoggerAction())->getStatistics();
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev

    Assert::assertArrayHasKey('by_type', $stats);
    Assert::assertIsArray($stats['by_type']);
});

test('ListLogActivities mount e branch record non Model', function (): void {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
    $page = new ListLogActivitiesMountablePage();
    $page->mount('mount-id-1');
    Assert::assertInstanceOf(ActivitySubjectHarness::class, $page->getRecord());

    $bad = new ListLogActivitiesPageHarness();
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
=======
    $page = new ListLogActivitiesMountablePage;
    $page->mount('mount-id-1');
    Assert::assertInstanceOf(ActivitySubjectHarness::class, $page->getRecord());

    $bad = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_6yPwXo
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
    $prop = new ReflectionProperty($bad, 'record');
    $prop->setAccessible(true);
    $prop->setValue($bad, 'not-a-model');

<<<<<<< HEAD
    expect(fn (): mixed => $bad->getActivities())
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
    expect(fn (): mixed => $bad->getActivities())
=======
    expect(fn (): LengthAwarePaginator => $bad->getActivities())
>>>>>>> .merge_file_6yPwXo
=======
    expect(fn (): mixed => $bad->getActivities())
>>>>>>> a95e8f36 (.)
=======
    expect(fn (): mixed => $bad->getActivities())
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
        ->toThrow(\InvalidArgumentException::class);
});

test('ListLogActivities getFieldLabel con valore non stringa in map', function (): void {
<<<<<<< HEAD
    $page = new ListLogActivitiesPageHarness();
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
    $page = new ListLogActivitiesPageHarness();
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_6yPwXo
=======
    $page = new ListLogActivitiesPageHarness();
>>>>>>> a95e8f36 (.)
=======
    $page = new ListLogActivitiesPageHarness();
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
    $mapProp = new ReflectionProperty(ListLogActivities::class, 'fieldLabelMap');
    $mapProp->setAccessible(true);
    $mapProp->setValue(null, Collection::make(['x' => 123]));

    Assert::assertSame('x', $page->getFieldLabel('x'));
});

test('ListLogActivities createFieldLabelMap nested e schema invalido', function (): void {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
    $nested = new ListLogActivitiesNestedFormPage();
    $map = $nested->exposeCreateFieldLabelMap();
    Assert::assertInstanceOf(Collection::class, $map);

    $bad = new ListLogActivitiesNonSchemaFormPage();
    expect(fn (): mixed => $bad->exposeCreateFieldLabelMap())
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
=======
    $nested = new ListLogActivitiesNestedFormPage;
    $map = $nested->exposeCreateFieldLabelMap();
    Assert::assertInstanceOf(Collection::class, $map);

    $bad = new ListLogActivitiesNonSchemaFormPage;
    expect(fn (): Collection => $bad->exposeCreateFieldLabelMap())
>>>>>>> .merge_file_6yPwXo
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
        ->toThrow(\InvalidArgumentException::class);
});

test('ListLogActivities rifiuta paginator non LengthAware', function (): void {
<<<<<<< HEAD
    $okSubject = new ActivitySubjectHarness();
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
    $okSubject = new ActivitySubjectHarness();
=======
    $okSubject = new ActivitySubjectHarness;
>>>>>>> .merge_file_6yPwXo
=======
    $okSubject = new ActivitySubjectHarness();
>>>>>>> a95e8f36 (.)
=======
    $okSubject = new ActivitySubjectHarness();
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
    $okSubject->forceFill(['id' => 'pag-subj', 'name' => 'p']);
    $okSubject->exists = true;
    Activity::create([
        'log_name' => 'default',
        'description' => 'p',
        'subject_type' => ActivitySubjectHarness::class,
        'subject_id' => $okSubject->id,
        'event' => 'e',
    ]);

<<<<<<< HEAD
    $badPag = new ListLogActivitiesBadPaginatorPage();
    $badPag->setRecordForTest($okSubject);
    expect(fn (): mixed => $badPag->getActivities())
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
    $badPag = new ListLogActivitiesBadPaginatorPage();
    $badPag->setRecordForTest($okSubject);
    expect(fn (): mixed => $badPag->getActivities())
=======
    $badPag = new ListLogActivitiesBadPaginatorPage;
    $badPag->setRecordForTest($okSubject);
    expect(fn (): LengthAwarePaginator => $badPag->getActivities())
>>>>>>> .merge_file_6yPwXo
=======
    $badPag = new ListLogActivitiesBadPaginatorPage();
    $badPag->setRecordForTest($okSubject);
    expect(fn (): mixed => $badPag->getActivities())
>>>>>>> a95e8f36 (.)
=======
    $badPag = new ListLogActivitiesBadPaginatorPage();
    $badPag->setRecordForTest($okSubject);
    expect(fn (): mixed => $badPag->getActivities())
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
        ->toThrow(\InvalidArgumentException::class, 'paginateQuery()');
});

test('ListLogActivities resolveActivity Invalid record non-Model', function (): void {
<<<<<<< HEAD
    $page = new ListLogActivitiesPageHarness();
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
    $page = new ListLogActivitiesPageHarness();
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_6yPwXo
=======
    $page = new ListLogActivitiesPageHarness();
>>>>>>> a95e8f36 (.)
=======
    $page = new ListLogActivitiesPageHarness();
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
    $prop = new ReflectionProperty($page, 'record');
    $prop->setAccessible(true);
    $prop->setValue($page, 'string-record');

<<<<<<< HEAD
    expect(fn (): mixed => $page->exposeResolveActivity(1))
=======
<<<<<<< .merge_file_ZDIcjp
<<<<<<< HEAD
<<<<<<< .merge_file_nPdbm0
    expect(fn (): mixed => $page->exposeResolveActivity(1))
=======
    expect(fn (): Activity => $page->exposeResolveActivity(1))
>>>>>>> .merge_file_6yPwXo
=======
    expect(fn (): mixed => $page->exposeResolveActivity(1))
>>>>>>> a95e8f36 (.)
=======
    expect(fn (): mixed => $page->exposeResolveActivity(1))
>>>>>>> .merge_file_aeoNr2
>>>>>>> laraxot/dev
        ->toThrow(\Exception::class, 'Invalid record');
});
