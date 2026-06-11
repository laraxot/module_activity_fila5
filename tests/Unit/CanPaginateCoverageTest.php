<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Filament\Tables\Enums\PaginationMode;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Activity\Filament\Pages\Concerns\CanPaginate;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

class CanPaginateHarness
{
    use CanPaginate;

    public int $pageResetCount = 0;

    private PaginationMode $mode = PaginationMode::Default;

    public function setMode(PaginationMode $mode): void
    {
        $this->mode = $mode;
    }

    public function getPaginationMode(): PaginationMode
    {
        return $this->mode;
    }

    public function getPage(string $pageName): int
    {
        return 2;
    }

    public function resetLivewirePage(): void
    {
        $this->pageResetCount++;
    }

    /**
     * @template TModel of \Illuminate\Database\Eloquent\Model
     *
     * @param  Builder<TModel>  $query
     * @return Paginator<int, TModel>|CursorPaginator<int, TModel>|LengthAwarePaginator<int, TModel>
     */
    public function exposePaginateQuery(Builder $query): Paginator|CursorPaginator|LengthAwarePaginator
    {
        return $this->paginateQuery($query);
    }

    /**
     * @return array<int|string>|null
     */
    public function exposeOptions(): ?array
    {
        return $this->getRecordsPerPageSelectOptions();
    }

    public function setDefaultPerPage(int|string|null $value): void
    {
        $this->defaultRecordsPerPageSelectOption = $value;
    }
}

function makeCanPaginateHarness(): CanPaginateHarness
{
    return new CanPaginateHarness;
}

test('can paginate trait manages session, defaults and page helpers', function (): void {
    $harness = makeCanPaginateHarness();
    $harness->recordsPerPage = 25;

    $harness->updatedRecordsPerPage();

    Assert::assertSame(25, $harness->recordsPerPage);
    Assert::assertSame(1, $harness->pageResetCount);
    Assert::assertSame(25, $harness->getRecordsPerPage());
    Assert::assertSame(2, $harness->getTablePage());
    Assert::assertSame('recordsPerPage', $harness->getPaginationPageName());
    Assert::assertStringStartsWith('pages.', $harness->getPerPageSessionKey());
});

test('can paginate default option fallback behaves correctly', function (): void {
    $harness = makeCanPaginateHarness();
    $harness->setDefaultPerPage(25);

    Assert::assertSame(25, $harness->getDefaultRecordsPerPageSelectOption());
    Assert::assertSame([10, 25, 50], $harness->exposeOptions());
    session()->put([$harness->getPerPageSessionKey() => 999]);

    Assert::assertSame(10, $harness->getDefaultRecordsPerPageSelectOption());
    Assert::assertTrue(session()->has($harness->getPerPageSessionKey()));
});

test('can paginate trait covers default, simple and cursor modes', function (): void {
    Activity::query()->create([
        'log_name' => 'default',
        'description' => 'paginate default',
        'event' => 'paginate-default',
    ]);

    $query = Activity::query()->orderBy('id');

    $defaultHarness = makeCanPaginateHarness();
    $defaultHarness->recordsPerPage = 10;
    $defaultHarness->setMode(PaginationMode::Default);
    $defaultPaginator = $defaultHarness->exposePaginateQuery(clone $query);

    Assert::assertInstanceOf(LengthAwarePaginator::class, $defaultPaginator);

    $simpleHarness = makeCanPaginateHarness();
    $simpleHarness->recordsPerPage = 10;
    $simpleHarness->setMode(PaginationMode::Simple);
    $simplePaginator = $simpleHarness->exposePaginateQuery(clone $query);

    Assert::assertInstanceOf(Paginator::class, $simplePaginator);

    $cursorHarness = makeCanPaginateHarness();
    $cursorHarness->recordsPerPage = 10;
    $cursorHarness->setMode(PaginationMode::Cursor);
    $cursorPaginator = $cursorHarness->exposePaginateQuery(clone $query);

    Assert::assertInstanceOf(CursorPaginator::class, $cursorPaginator);
});
