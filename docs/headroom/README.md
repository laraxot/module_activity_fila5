# Headroom Integration - Activity Module

## Overview

Activity logging and audit trails with efficient context tracking.

## Token Budget: 50,000

### Allocation
- Event logging: 20,000
- Audit trail analysis: 15,000
- Report generation: 15,000

## Configuration

```yaml
module: Activity
priority: medium
auto_compress: true
deduplicate_events: true
archive_old_logs: true
```

## Event Tracking

Activity logs generate high token overhead; use smart filtering:

```bash
# Track activity-related development
headroom track --module Activity --tag events --tag audit

# Compress old activity logs
headroom prune --module Activity --age 30d --archive
```

## Efficient Logging

```bash
# Only track critical activities
headroom filter-events --module Activity --min-severity info
```

## Performance Monitoring

```bash
# Monitor activity logging performance
headroom profile --module Activity
```

## See Also
- [Activity Logging Guide](../../docs/activity-logging.md)
- [Audit Trail Documentation](../../docs/audit-trails.md)
