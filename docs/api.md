---
title: "Activity Module API"
type: reference
tags: [activity, api]
created: 2026-07-28
<<<<<<< .merge_file_TM0cP0
updated: 2026-09-17
=======
updated: 2026-07-28
>>>>>>> .merge_file_LqyxAw
---

# Activity Module — API

## LogActivityAction

<<<<<<< .merge_file_TM0cP0
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
=======
```php
execute(array $data): Activity
```

- `description` (string): Activity description
- `subject` (Model): Target entity
- `causer` (Model): User performing action
- `type` (string): Event type (user.created, post.updated, etc.)
- `properties` (array): Metadata
>>>>>>> .merge_file_LqyxAw

## Activity Model

```php
Activity::find($id);
<<<<<<< .merge_file_TM0cP0
$activity->subject;       // Polymorphic: any Model
$activity->causer;        // Modules\User\Models\User
=======
$activity->subject;       // Polymorphic: User, Post, etc.
$activity->causer;        // User performing action
>>>>>>> .merge_file_LqyxAw
$activity->properties;    // JSON metadata
```
