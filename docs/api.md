---
title: "Activity Module API"
type: reference
tags: [activity, api]
created: 2026-07-28
updated: 2026-09-17
---

# Activity Module — API

## LogActivityAction

Constructor-based Spatie `QueueableAction`, not a static/array-args call. Verified against
`app/Actions/LogActivityAction.php`:

```php
use Modules\Activity\Actions\LogActivityAction;

(new LogActivityAction(
    type: 'user.created',              // string, required, non-empty
    user: $causer,                     // ?Model, must be Modules\User\Models\User when set
    subject: $record,                  // ?Model, target entity
    properties: ['ip' => request()->ip()], // ?array<string, mixed>
    description: 'User created',       // ?string, defaults to "Activity: {type}"
))->execute(); // : Activity
```

`execute()` takes no arguments — all data is passed through the constructor. See
`app/Actions/LogUserLoginAction.php` for a real call site.

## Activity Model

```php
Activity::find($id);
$activity->subject;       // Polymorphic: any Model
$activity->causer;        // Modules\User\Models\User
$activity->properties;    // JSON metadata
```
