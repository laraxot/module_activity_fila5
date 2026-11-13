<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\ActivityResource\Tables;

use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
use Modules\UI\Filament\Tables\Columns\IDColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class ActivitiesTable extends XotBaseResourceTable
{
    /**
     * @return array<int|string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => IDColumn::make('id')->searchable()->sortable(),
            'log_name' => TextColumn::make('log_name')->searchable(),
            'description' => TextColumn::make('description')->searchable(),
            'event' => TextColumn::make('event')->searchable(),
            'subject_type' => TextColumn::make('subject_type')->searchable(),
            'subject_id' => TextColumn::make('subject_id')->searchable(),
            'causer_type' => TextColumn::make('causer_type')->searchable(),
            'causer_id' => TextColumn::make('causer_id')->searchable(),
            'properties' => TextColumn::make('properties')->limit(50),
            'batch_uuid' => TextColumn::make('batch_uuid')->limit(30),
            'created_at' => TextColumn::make('created_at')->dateTime(),
            'updated_at' => TextColumn::make('updated_at')->dateTime(),
        ];
    }

    /**
     * Filters for the operational roles' audit trail: user, role, event (the "cancellation of
     * X" macro-search — `event` already encodes category and subcategory, e.g.
     * `order.cancelled` vs `order_item.cancelled`, see CancelOrderAction/CancelOrderItemAction)
     * and a time-of-day range.
     *
     * @return array<string, \Filament\Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'causer_id' => SelectFilter::make('causer_id')
                ->label('User')
                ->options(fn (): array => User::query()->orderBy('email')->pluck('email', 'id')->all())
                ->searchable(),
            'role' => SelectFilter::make('role')
                ->label('Role')
                ->options(fn (): array => array_combine(
                    \Modules\Restaurant\Enums\RestaurantRoleEnum::values(),
                    \Modules\Restaurant\Enums\RestaurantRoleEnum::values(),
                ))
                ->query(function (Builder $query, array $data): Builder {
                    if (blank($data['value'] ?? null)) {
                        return $query;
                    }

                    return $query->whereHasMorph('causer', [User::class], function (Builder $userQuery) use ($data): void {
                        $userQuery->whereHas('roles', function (Builder $roleQuery) use ($data): void {
                            $roleQuery->where('name', $data['value']);
                        });
                    });
                }),
            'event' => SelectFilter::make('event')
                ->label('Event (cancellation, discount, ...)')
                ->options(fn (): array => Activity::query()
                    ->whereNotNull('event')
                    ->distinct()
                    ->orderBy('event')
                    ->pluck('event', 'event')
                    ->all())
                ->searchable(),
            'time_of_day' => Filter::make('time_of_day')
                ->schema([
                    TimePicker::make('from')->label('From time'),
                    TimePicker::make('until')->label('Until time'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['from'] ?? null, fn (Builder $q, string $time): Builder => $q->whereTime('created_at', '>=', $time))
                        ->when($data['until'] ?? null, fn (Builder $q, string $time): Builder => $q->whereTime('created_at', '<=', $time));
                }),
        ];
    }
}
