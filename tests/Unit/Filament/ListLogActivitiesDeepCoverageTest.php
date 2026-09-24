<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Filament;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use LogicException;
use Modules\Activity\Actions\RestoreActivityAction;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\Fixtures\ActivitySubjectHarness;
use Modules\Activity\Tests\Fixtures\ActivitySubjectNoActivitiesMethodHarness;
use Modules\Activity\Tests\Fixtures\ActivitySubjectWithoutRelationHarness;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesHtmlTitleHarness;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesPageHarness;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesRestorableResource;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesStdClassResourceHarness;
use Modules\Activity\Tests\Fixtures\RestoreActivityActionFails;
use Modules\Activity\Tests\Fixtures\RestoreActivityActionNoOp;
use PHPUnit\Framework\Assert;
use Symfony\Component\HttpKernel\Exception\HttpException;

function activitySubjectForPage(string $id = 'page-subj'): ActivitySubjectHarness
{
<<<<<<< HEAD
    $subject = new ActivitySubjectHarness;
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
    $subject = new ActivitySubjectHarness();
=======
    $subject = new ActivitySubjectHarness;
>>>>>>> .merge_file_euJqNR
=======
    $subject = new ActivitySubjectHarness();
>>>>>>> a95e8f36 (.)
=======
    $subject = new ActivitySubjectHarness;
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $subject->forceFill(['id' => $id, 'name' => 'S']);
    $subject->exists = true;

    return $subject;
}

test('ListLogActivities getTitle e breadcrumb con Htmlable', function (): void {
<<<<<<< HEAD
    $page = new ListLogActivitiesPageHarness;
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
    $page = new ListLogActivitiesPageHarness();
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_euJqNR
=======
    $page = new ListLogActivitiesPageHarness();
>>>>>>> a95e8f36 (.)
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $page->setRecordForTest(activitySubjectForPage());

    Assert::assertNotEmpty($page->getBreadcrumb());
    Assert::assertStringContainsString('Record Titolo', $page->getTitle());

<<<<<<< HEAD
    $htmlPage = new ListLogActivitiesHtmlTitleHarness;
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
    $htmlPage = new ListLogActivitiesHtmlTitleHarness();
=======
    $htmlPage = new ListLogActivitiesHtmlTitleHarness;
>>>>>>> .merge_file_euJqNR
=======
    $htmlPage = new ListLogActivitiesHtmlTitleHarness();
>>>>>>> a95e8f36 (.)
=======
    $htmlPage = new ListLogActivitiesHtmlTitleHarness;
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $htmlPage->setRecordForTest(activitySubjectForPage('html-subj'));
    Assert::assertStringContainsString('HTML', $htmlPage->getTitle());
});

test('ListLogActivities getActivities paginate e errori record', function (): void {
    $subject = activitySubjectForPage('act-subj');
    Activity::create([
        'log_name' => 'default',
        'description' => 'd',
        'subject_type' => ActivitySubjectHarness::class,
        'subject_id' => $subject->id,
        'event' => 'touch',
        'properties' => ['old' => ['name' => 'a']],
    ]);

<<<<<<< HEAD
    $page = new ListLogActivitiesPageHarness;
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
    $page = new ListLogActivitiesPageHarness();
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_euJqNR
=======
    $page = new ListLogActivitiesPageHarness();
>>>>>>> a95e8f36 (.)
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $page->setRecordForTest($subject);

    $paginator = $page->getActivities();
    Assert::assertInstanceOf(LengthAwarePaginator::class, $paginator);
    Assert::assertGreaterThanOrEqual(1, $paginator->total());

<<<<<<< HEAD
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
=======
>>>>>>> a95e8f36 (.)
    $pageNoRecord = new ListLogActivitiesPageHarness();
    expect(fn (): mixed => $pageNoRecord->getActivities())
        ->toThrow(\Error::class);

    $pageNoMethod = new ListLogActivitiesPageHarness();
    $pageNoMethod->setRecordForTest(new ActivitySubjectNoActivitiesMethodHarness());
    expect(fn (): mixed => $pageNoMethod->getActivities())
        ->toThrow(LogicException::class);

    $pageBadRel = new ListLogActivitiesPageHarness();
    $pageBadRel->setRecordForTest(new ActivitySubjectWithoutRelationHarness());
    expect(fn (): mixed => $pageBadRel->getActivities())
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $pageNoRecord = new ListLogActivitiesPageHarness;
    expect(fn (): \Illuminate\Contracts\Pagination\LengthAwarePaginator => $pageNoRecord->getActivities())
        ->toThrow(\Error::class);

    $pageNoMethod = new ListLogActivitiesPageHarness;
    $pageNoMethod->setRecordForTest(new ActivitySubjectNoActivitiesMethodHarness);
    expect(fn (): \Illuminate\Contracts\Pagination\LengthAwarePaginator => $pageNoMethod->getActivities())
        ->toThrow(LogicException::class);

    $pageBadRel = new ListLogActivitiesPageHarness;
    $pageBadRel->setRecordForTest(new ActivitySubjectWithoutRelationHarness);
    expect(fn (): \Illuminate\Contracts\Pagination\LengthAwarePaginator => $pageBadRel->getActivities())
<<<<<<< HEAD
=======
<<<<<<< .merge_file_tAwYr5
>>>>>>> .merge_file_euJqNR
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
        ->toThrow(\InvalidArgumentException::class);
});

test('ListLogActivities canRestore e restoreActivity percorsi', function (): void {
    $subject = activitySubjectForPage('restore-subj');
    $activity = Activity::create([
        'log_name' => 'default',
        'description' => 'restore me',
        'subject_type' => ActivitySubjectHarness::class,
        'subject_id' => $subject->id,
        'event' => 'updated',
        'properties' => ['old' => ['name' => 'prima']],
    ]);

<<<<<<< HEAD
    $page = new ListLogActivitiesPageHarness;
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
    $page = new ListLogActivitiesPageHarness();
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_euJqNR
=======
    $page = new ListLogActivitiesPageHarness();
>>>>>>> a95e8f36 (.)
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $page->setRecordForTest($subject);
    ListLogActivitiesRestorableResource::$restoreAllowed = true;
    Assert::assertTrue($page->canRestoreActivity());

<<<<<<< HEAD
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionNoOp);
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionNoOp());
=======
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionNoOp);
>>>>>>> .merge_file_euJqNR
=======
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionNoOp());
>>>>>>> a95e8f36 (.)
=======
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionNoOp);
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $page->restoreActivity((int) $activity->id);

    ListLogActivitiesRestorableResource::$restoreAllowed = false;
    Assert::assertFalse($page->canRestoreActivity());

    try {
        $page->restoreActivity((int) $activity->id);
        Assert::fail('Expected 403 abort');
    } catch (HttpException $e) {
        Assert::assertSame(403, $e->getStatusCode());
    }

    ListLogActivitiesRestorableResource::$restoreAllowed = true;
<<<<<<< HEAD
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionFails);
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionFails());
=======
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionFails);
>>>>>>> .merge_file_euJqNR
=======
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionFails());
>>>>>>> a95e8f36 (.)
=======
    app()->instance(RestoreActivityAction::class, new RestoreActivityActionFails);
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $page->restoreActivity((int) $activity->id);
});

test('ListLogActivities resolveActivity getOldProperties e field label map', function (): void {
    $subject = activitySubjectForPage('resolve-subj');
    $activity = Activity::create([
        'log_name' => 'default',
        'description' => 'r',
        'subject_type' => ActivitySubjectHarness::class,
        'subject_id' => $subject->id,
        'event' => 'updated',
        'properties' => ['old' => ['name' => 'old']],
    ]);

<<<<<<< HEAD
    $page = new ListLogActivitiesPageHarness;
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
    $page = new ListLogActivitiesPageHarness();
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_euJqNR
=======
    $page = new ListLogActivitiesPageHarness();
>>>>>>> a95e8f36 (.)
=======
    $page = new ListLogActivitiesPageHarness;
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $page->setRecordForTest($subject);

    $resolved = $page->exposeResolveActivity((int) $activity->id);
    Assert::assertSame($activity->id, $resolved->id);
    Assert::assertSame(['name' => 'old'], $page->exposeGetOldProperties($resolved));

<<<<<<< HEAD
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
=======
>>>>>>> a95e8f36 (.)
    $badProps = new Activity();
    $badProps->forceFill(['properties' => ['old' => 'not-array']]);
    expect(fn (): mixed => $page->exposeGetOldProperties($badProps))
        ->toThrow(Exception::class);

    expect(fn (): mixed => $page->exposeResolveActivity(999999))
        ->toThrow(Exception::class, 'Activity not found');

    $pageNoRec = new ListLogActivitiesPageHarness();
    expect(fn (): mixed => $pageNoRec->exposeResolveActivity(1))
        ->toThrow(\Error::class);

    $pageNoMethod = new ListLogActivitiesPageHarness();
    $pageNoMethod->setRecordForTest(new ActivitySubjectNoActivitiesMethodHarness());
    expect(fn (): mixed => $pageNoMethod->exposeResolveActivity(1))
        ->toThrow(LogicException::class);

    $pageBadRel = new ListLogActivitiesPageHarness();
    $pageBadRel->setRecordForTest(new ActivitySubjectWithoutRelationHarness());
    expect(fn (): mixed => $pageBadRel->exposeResolveActivity(1))
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $badProps = new Activity;
    $badProps->forceFill(['properties' => ['old' => 'not-array']]);
    expect(fn (): array => $page->exposeGetOldProperties($badProps))
        ->toThrow(Exception::class);

    expect(fn (): Activity => $page->exposeResolveActivity(999999))
        ->toThrow(Exception::class, 'Activity not found');

    $pageNoRec = new ListLogActivitiesPageHarness;
    expect(fn (): Activity => $pageNoRec->exposeResolveActivity(1))
        ->toThrow(\Error::class);

    $pageNoMethod = new ListLogActivitiesPageHarness;
    $pageNoMethod->setRecordForTest(new ActivitySubjectNoActivitiesMethodHarness);
    expect(fn (): Activity => $pageNoMethod->exposeResolveActivity(1))
        ->toThrow(LogicException::class);

    $pageBadRel = new ListLogActivitiesPageHarness;
    $pageBadRel->setRecordForTest(new ActivitySubjectWithoutRelationHarness);
    expect(fn (): Activity => $pageBadRel->exposeResolveActivity(1))
<<<<<<< HEAD
=======
<<<<<<< .merge_file_tAwYr5
>>>>>>> .merge_file_euJqNR
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
        ->toThrow(Exception::class, 'Invalid activities relation');

    Assert::assertSame('campo', $page->getFieldLabel('campo'));
    $map = $page->exposeCreateFieldLabelMap();
    Assert::assertInstanceOf(Collection::class, $map);
});

test('ListLogActivities canRestore senza record o resource invalida', function (): void {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_tAwYr5
<<<<<<< HEAD
<<<<<<< .merge_file_gcxgXd
=======
>>>>>>> a95e8f36 (.)
    $page = new ListLogActivitiesPageHarness();
    Assert::assertFalse($page->canRestoreActivity());

    $stdPage = new ListLogActivitiesStdClassResourceHarness();
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $page = new ListLogActivitiesPageHarness;
    Assert::assertFalse($page->canRestoreActivity());

    $stdPage = new ListLogActivitiesStdClassResourceHarness;
<<<<<<< HEAD
=======
<<<<<<< .merge_file_tAwYr5
>>>>>>> .merge_file_euJqNR
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_MUZocN
>>>>>>> laraxot/dev
    $stdPage->setRecordForTest(activitySubjectForPage('std'));
    Assert::assertFalse($stdPage->canRestoreActivity());
});
