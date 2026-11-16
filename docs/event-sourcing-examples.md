<<<<<<< .merge_file_zzxdN3
---
module: theme
topic: event-sourcing-examples
canonical: ../../../Themes/docs/shared-components/event-sourcing-examples-duplicate.md
---
=======
<<<<<<< HEAD
# Practical Event Sourcing Examples for Healthcare
>>>>>>> .merge_file_Z2V5aA

## Table of Contents
- [Patient Management](#patient-management)
- [Appointment Scheduling](#appointment-scheduling)
- [Medical Records](#medical-records)
- [Billing and Insurance](#billing-and-insurance)
- [Pharmacy and Prescriptions](#pharmacy-and-prescriptions)
- [Integration Patterns](#integration-patterns)
- [Testing Strategies](#testing-strategies)

## Patient Management

### 1. Patient Registration

**Event**: `PatientRegistered`
```php
class PatientRegistered implements ShouldBeStored
{
    public function __construct(
        public string $patientId,
        public string $firstName,
        public string $lastName,
        public string $email,
        public DateTimeImmutable $registeredAt
    ) {}
}

// Usage in Aggregate
public function registerPatient(
    string $patientId,
    string $firstName,
    string $lastName,
    string $email
): void {
    $this->recordThat(new PatientRegistered(
        patientId: $patientId,
        firstName: $firstName,
        lastName: $lastName,
        email: $email,
        registeredAt: new DateTimeImmutable()
    ));
<<<<<<< .merge_file_zzxdN3
=======
}
>>>>>>> .merge_file_Z2V5aA
```

### 2. Patient Information Update

**Event**: `PatientInformationUpdated`
<<<<<<< .merge_file_zzxdN3
class PatientInformationUpdated implements ShouldBeStored
        public array $changes,
        public string $updatedBy,
        public DateTimeImmutable $updatedAt
=======
```php
class PatientInformationUpdated implements ShouldBeStored
{
    public function __construct(
        public string $patientId,
        public array $changes,
        public string $updatedBy,
        public DateTimeImmutable $updatedAt
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

## Appointment Scheduling

### 1. Scheduling an Appointment

**Event**: `AppointmentScheduled`
<<<<<<< .merge_file_zzxdN3
class AppointmentScheduled implements ShouldBeStored
        public string $appointmentId,
=======
```php
class AppointmentScheduled implements ShouldBeStored
{
    public function __construct(
        public string $appointmentId,
        public string $patientId,
>>>>>>> .merge_file_Z2V5aA
        public string $doctorId,
        public DateTimeImmutable $scheduledTime,
        public int $durationMinutes,
        public string $reason,
        public string $scheduledBy
<<<<<<< .merge_file_zzxdN3
=======
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

### 2. Rescheduling an Appointment

**Event**: `AppointmentRescheduled`
<<<<<<< .merge_file_zzxdN3
class AppointmentRescheduled implements ShouldBeStored
        public DateTimeImmutable $oldTime,
        public DateTimeImmutable $newTime,
        public string $rescheduledBy
=======
```php
class AppointmentRescheduled implements ShouldBeStored
{
    public function __construct(
        public string $appointmentId,
        public DateTimeImmutable $oldTime,
        public DateTimeImmutable $newTime,
        public string $reason,
        public string $rescheduledBy
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

## Medical Records

### 1. Adding a Medical Note

**Event**: `MedicalNoteAdded`
<<<<<<< .merge_file_zzxdN3
class MedicalNoteAdded implements ShouldBeStored
        public string $noteId,
=======
```php
class MedicalNoteAdded implements ShouldBeStored
{
    public function __construct(
        public string $noteId,
        public string $patientId,
        public string $doctorId,
>>>>>>> .merge_file_Z2V5aA
        public string $content,
        public array $tags,
        public bool $isConfidential,
        public DateTimeImmutable $recordedAt
<<<<<<< .merge_file_zzxdN3
=======
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

### 2. Updating Vital Signs

**Event**: `VitalSignsRecorded`
<<<<<<< .merge_file_zzxdN3
class VitalSignsRecorded implements ShouldBeStored
        public string $recordingId,
        public string $recordedBy,
        public array $vitals, // [type => value, unit]
        public ?string $notes,
=======
```php
class VitalSignsRecorded implements ShouldBeStored
{
    public function __construct(
        public string $recordingId,
        public string $patientId,
        public string $recordedBy,
        public array $vitals, // [type => value, unit]
        public ?string $notes,
        public DateTimeImmutable $recordedAt
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

## Billing and Insurance

### 1. Creating an Invoice

**Event**: `InvoiceCreated`
<<<<<<< .merge_file_zzxdN3
class InvoiceCreated implements ShouldBeStored
        public string $invoiceId,
=======
```php
class InvoiceCreated implements ShouldBeStored
{
    public function __construct(
        public string $invoiceId,
        public string $patientId,
>>>>>>> .merge_file_Z2V5aA
        public array $lineItems,
        public string $status,
        public float $totalAmount,
        public string $currency,
        public DateTimeImmutable $createdAt
<<<<<<< .merge_file_zzxdN3
=======
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

### 2. Insurance Claim Filed

**Event**: `InsuranceClaimFiled`
<<<<<<< .merge_file_zzxdN3
class InsuranceClaimFiled implements ShouldBeStored
        public string $claimId,
        public string $insuranceProviderId,
        public array $services, // [serviceId, description, amount]
        public DateTimeImmutable $filedAt
=======
```php
class InsuranceClaimFiled implements ShouldBeStored
{
    public function __construct(
        public string $claimId,
        public string $patientId,
        public string $insuranceProviderId,
        public array $services, // [serviceId, description, amount]
        public string $status,
        public DateTimeImmutable $filedAt
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

## Pharmacy and Prescriptions

### 1. Prescription Filled

**Event**: `PrescriptionFilled`
<<<<<<< .merge_file_zzxdN3
class PrescriptionFilled implements ShouldBeStored
=======
```php
class PrescriptionFilled implements ShouldBeStored
{
    public function __construct(
>>>>>>> .merge_file_Z2V5aA
        public string $fulfillmentId,
        public string $prescriptionId,
        public string $pharmacyId,
        public string $pharmacistId,
        public array $medications, // [medId, name, dosage, quantity]
<<<<<<< .merge_file_zzxdN3
        public DateTimeImmutable $filledAt
=======
        public string $status,
        public DateTimeImmutable $filledAt
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

## Integration Patterns

### 1. External System Integration

**Event**: `ExternalSystemNotificationSent`
<<<<<<< .merge_file_zzxdN3
class ExternalSystemNotificationSent implements ShouldBeStored
=======
```php
class ExternalSystemNotificationSent implements ShouldBeStored
{
    public function __construct(
>>>>>>> .merge_file_Z2V5aA
        public string $notificationId,
        public string $systemName,
        public string $eventType,
        public array $payload,
<<<<<<< .merge_file_zzxdN3
        public ?string $response,
        public DateTimeImmutable $sentAt
=======
        public string $status,
        public ?string $response,
        public DateTimeImmutable $sentAt
    ) {}
}
```
>>>>>>> .merge_file_Z2V5aA

## Testing Strategies

### 1. Unit Testing Aggregates

<<<<<<< .merge_file_zzxdN3
class PatientAggregateTest extends TestCase
    /** @test */
    public function it_can_register_a_patient()
        $patientId = 'patient-123';

        $aggregate = PatientAggregate::retrieve($patientId);

        $aggregate->registerPatient(
=======
```php
class PatientAggregateTest extends TestCase
{
    /** @test */
    public function it_can_register_a_patient()
    {
        $patientId = 'patient-123';
        
        $aggregate = PatientAggregate::retrieve($patientId);
        
        $aggregate->registerPatient(
            patientId: $patientId,
>>>>>>> .merge_file_Z2V5aA
            firstName: 'John',
            lastName: 'Doe',
            email: 'john@example.com'
        )->persist();
<<<<<<< .merge_file_zzxdN3

=======
        
>>>>>>> .merge_file_Z2V5aA
        $this->assertDatabaseHas('stored_events', [
            'event_class' => PatientRegistered::class,
            'aggregate_uuid' => $patientId
        ]);
<<<<<<< .merge_file_zzxdN3

### 2. Testing Projectors

class PatientProjectorTest extends TestCase
    use RefreshProjection;

    public function it_projects_patient_registration()
        $event = new PatientRegistered(
=======
    }
}
```

### 2. Testing Projectors

```php
class PatientProjectorTest extends TestCase
{
    use RefreshProjection;
    
    /** @test */
    public function it_projects_patient_registration()
    {
        $patientId = 'patient-123';
        $event = new PatientRegistered(
            patientId: $patientId,
>>>>>>> .merge_file_Z2V5aA
            firstName: 'Jane',
            lastName: 'Smith',
            email: 'jane@example.com',
            registeredAt: now()
        );
<<<<<<< .merge_file_zzxdN3

        event($event);

=======
        
        event($event);
        
        $this->assertDatabaseHas('patients', [
            'id' => $patientId,
            'email' => 'jane@example.com',
            'full_name' => 'Jane Smith'
        ]);
    }
}
```

## Conclusion

These examples demonstrate how event sourcing can be applied to various aspects of a healthcare application. By modeling domain events explicitly, we create a system that is:

1. **Auditable**: Every change is recorded
2. **Extensible**: New features can be added by introducing new events
3. **Resilient**: The system can be rebuilt by replaying events
4. **Understandable**: The business logic is expressed in terms of domain events

Remember to always consider the specific needs of your healthcare application and adjust these patterns accordingly.
=======
<<<<<<< HEAD
<<<<<<< HEAD
# Practical Event Sourcing Examples for Healthcare

## Table of Contents
- [Patient Management](#patient-management)
- [Appointment Scheduling](#appointment-scheduling)
- [Medical Records](#medical-records)
- [Billing and Insurance](#billing-and-insurance)
- [Pharmacy and Prescriptions](#pharmacy-and-prescriptions)
- [Integration Patterns](#integration-patterns)
- [Testing Strategies](#testing-strategies)

## Patient Management

### 1. Patient Registration

**Event**: `PatientRegistered`
```php
class PatientRegistered implements ShouldBeStored
{
    public function __construct(
        public string $patientId,
        public string $firstName,
        public string $lastName,
        public string $email,
        public DateTimeImmutable $registeredAt
    ) {}
}

// Usage in Aggregate
public function registerPatient(
    string $patientId,
    string $firstName,
    string $lastName,
    string $email
): void {
    $this->recordThat(new PatientRegistered(
        patientId: $patientId,
        firstName: $firstName,
        lastName: $lastName,
        email: $email,
        registeredAt: new DateTimeImmutable()
    ));
}
```

### 2. Patient Information Update

**Event**: `PatientInformationUpdated`
```php
class PatientInformationUpdated implements ShouldBeStored
{
    public function __construct(
        public string $patientId,
        public array $changes,
        public string $updatedBy,
        public DateTimeImmutable $updatedAt
    ) {}
}
```

## Appointment Scheduling

### 1. Scheduling an Appointment

**Event**: `AppointmentScheduled`
```php
class AppointmentScheduled implements ShouldBeStored
{
    public function __construct(
        public string $appointmentId,
        public string $patientId,
        public string $doctorId,
        public DateTimeImmutable $scheduledTime,
        public int $durationMinutes,
        public string $reason,
        public string $scheduledBy
    ) {}
}
```

### 2. Rescheduling an Appointment

**Event**: `AppointmentRescheduled`
```php
class AppointmentRescheduled implements ShouldBeStored
{
    public function __construct(
        public string $appointmentId,
        public DateTimeImmutable $oldTime,
        public DateTimeImmutable $newTime,
        public string $reason,
        public string $rescheduledBy
    ) {}
}
```

## Medical Records

### 1. Adding a Medical Note

**Event**: `MedicalNoteAdded`
```php
class MedicalNoteAdded implements ShouldBeStored
{
    public function __construct(
        public string $noteId,
        public string $patientId,
        public string $doctorId,
        public string $content,
        public array $tags,
        public bool $isConfidential,
        public DateTimeImmutable $recordedAt
    ) {}
}
```

### 2. Updating Vital Signs

**Event**: `VitalSignsRecorded`
```php
class VitalSignsRecorded implements ShouldBeStored
{
    public function __construct(
        public string $recordingId,
        public string $patientId,
        public string $recordedBy,
        public array $vitals, // [type => value, unit]
        public ?string $notes,
        public DateTimeImmutable $recordedAt
    ) {}
}
```

## Billing and Insurance

### 1. Creating an Invoice

**Event**: `InvoiceCreated`
```php
class InvoiceCreated implements ShouldBeStored
{
    public function __construct(
        public string $invoiceId,
        public string $patientId,
        public array $lineItems,
        public string $status,
        public float $totalAmount,
        public string $currency,
        public DateTimeImmutable $createdAt
    ) {}
}
```

### 2. Insurance Claim Filed

**Event**: `InsuranceClaimFiled`
```php
class InsuranceClaimFiled implements ShouldBeStored
{
    public function __construct(
        public string $claimId,
        public string $patientId,
        public string $insuranceProviderId,
        public array $services, // [serviceId, description, amount]
        public string $status,
        public DateTimeImmutable $filedAt
    ) {}
}
```

## Pharmacy and Prescriptions

### 1. Prescription Filled

**Event**: `PrescriptionFilled`
```php
class PrescriptionFilled implements ShouldBeStored
{
    public function __construct(
        public string $fulfillmentId,
        public string $prescriptionId,
        public string $pharmacyId,
        public string $pharmacistId,
        public array $medications, // [medId, name, dosage, quantity]
        public string $status,
        public DateTimeImmutable $filledAt
    ) {}
}
```

## Integration Patterns

### 1. External System Integration

**Event**: `ExternalSystemNotificationSent`
```php
class ExternalSystemNotificationSent implements ShouldBeStored
{
    public function __construct(
        public string $notificationId,
        public string $systemName,
        public string $eventType,
        public array $payload,
        public string $status,
        public ?string $response,
        public DateTimeImmutable $sentAt
    ) {}
}
```

## Testing Strategies

### 1. Unit Testing Aggregates

```php
class PatientAggregateTest extends TestCase
{
    /** @test */
    public function it_can_register_a_patient()
    {
        $patientId = 'patient-123';
        
        $aggregate = PatientAggregate::retrieve($patientId);
        
        $aggregate->registerPatient(
            patientId: $patientId,
            firstName: 'John',
            lastName: 'Doe',
            email: 'john@example.com'
        )->persist();
        
        $this->assertDatabaseHas('stored_events', [
            'event_class' => PatientRegistered::class,
            'aggregate_uuid' => $patientId
        ]);
    }
}
```

### 2. Testing Projectors

```php
class PatientProjectorTest extends TestCase
{
    use RefreshProjection;
    
    /** @test */
    public function it_projects_patient_registration()
    {
        $patientId = 'patient-123';
        $event = new PatientRegistered(
            patientId: $patientId,
            firstName: 'Jane',
            lastName: 'Smith',
            email: 'jane@example.com',
            registeredAt: now()
        );
        
        event($event);
        
>>>>>>> .merge_file_Z2V5aA
        $this->assertDatabaseHas('patients', [
            'id' => $patientId,
            'email' => 'jane@example.com',
            'full_name' => 'Jane Smith'
<<<<<<< .merge_file_zzxdN3
=======
        ]);
    }
}
```
>>>>>>> .merge_file_Z2V5aA

## Conclusion

These examples demonstrate how event sourcing can be applied to various aspects of a healthcare application. By modeling domain events explicitly, we create a system that is:

1. **Auditable**: Every change is recorded
2. **Extensible**: New features can be added by introducing new events
3. **Resilient**: The system can be rebuilt by replaying events
4. **Understandable**: The business logic is expressed in terms of domain events

Remember to always consider the specific needs of your healthcare application and adjust these patterns accordingly.
<<<<<<< .merge_file_zzxdN3
=======
=======
=======
>>>>>>> 35d8cf69 (Initial commit)
>>>>>>> .merge_file_Z2V5aA
---
title: "Practical Event Sourcing Examples for Healthcare"
type: note
status: draft
updated: 2026-10-08
tags: [docs, activity]
qmd: "practical event sourcing examples for healthcare activity"
---
# Practical Event Sourcing Examples for Healthcare

## Table of Contents
- [Patient Management](#patient-management)
- [Appointment Scheduling](#appointment-scheduling)
- [Medical Records](#medical-records)
- [Billing and Insurance](#billing-and-insurance)
- [Pharmacy and Prescriptions](#pharmacy-and-prescriptions)
- [Integration Patterns](#integration-patterns)
- [Testing Strategies](#testing-strategies)

## Patient Management

### 1. Patient Registration

**Event**: `PatientRegistered`
```php
class PatientRegistered implements ShouldBeStored
{
    public function __construct(
        public string $patientId,
        public string $firstName,
        public string $lastName,
        public string $email,
        public DateTimeImmutable $registeredAt
    ) {}
}

// Usage in Aggregate
public function registerPatient(
    string $patientId,
    string $firstName,
    string $lastName,
    string $email
): void {
    $this->recordThat(new PatientRegistered(
        patientId: $patientId,
        firstName: $firstName,
        lastName: $lastName,
        email: $email,
        registeredAt: new DateTimeImmutable()
    ));
}
```

### 2. Patient Information Update

**Event**: `PatientInformationUpdated`
```php
class PatientInformationUpdated implements ShouldBeStored
{
    public function __construct(
        public string $patientId,
        public array $changes,
        public string $updatedBy,
        public DateTimeImmutable $updatedAt
    ) {}
}
```

## Appointment Scheduling

### 1. Scheduling an Appointment

**Event**: `AppointmentScheduled`
```php
class AppointmentScheduled implements ShouldBeStored
{
    public function __construct(
        public string $appointmentId,
        public string $patientId,
        public string $doctorId,
        public DateTimeImmutable $scheduledTime,
        public int $durationMinutes,
        public string $reason,
        public string $scheduledBy
    ) {}
}
```

### 2. Rescheduling an Appointment

**Event**: `AppointmentRescheduled`
```php
class AppointmentRescheduled implements ShouldBeStored
{
    public function __construct(
        public string $appointmentId,
        public DateTimeImmutable $oldTime,
        public DateTimeImmutable $newTime,
        public string $reason,
        public string $rescheduledBy
    ) {}
}
```

## Medical Records

### 1. Adding a Medical Note

**Event**: `MedicalNoteAdded`
```php
class MedicalNoteAdded implements ShouldBeStored
{
    public function __construct(
        public string $noteId,
        public string $patientId,
        public string $doctorId,
        public string $content,
        public array $tags,
        public bool $isConfidential,
        public DateTimeImmutable $recordedAt
    ) {}
}
```

### 2. Updating Vital Signs

**Event**: `VitalSignsRecorded`
```php
class VitalSignsRecorded implements ShouldBeStored
{
    public function __construct(
        public string $recordingId,
        public string $patientId,
        public string $recordedBy,
        public array $vitals, // [type => value, unit]
        public ?string $notes,
        public DateTimeImmutable $recordedAt
    ) {}
}
```

## Billing and Insurance

### 1. Creating an Invoice

**Event**: `InvoiceCreated`
```php
class InvoiceCreated implements ShouldBeStored
{
    public function __construct(
        public string $invoiceId,
        public string $patientId,
        public array $lineItems,
        public string $status,
        public float $totalAmount,
        public string $currency,
        public DateTimeImmutable $createdAt
    ) {}
}
```

### 2. Insurance Claim Filed

**Event**: `InsuranceClaimFiled`
```php
class InsuranceClaimFiled implements ShouldBeStored
{
    public function __construct(
        public string $claimId,
        public string $patientId,
        public string $insuranceProviderId,
        public array $services, // [serviceId, description, amount]
        public string $status,
        public DateTimeImmutable $filedAt
    ) {}
}
```

## Pharmacy and Prescriptions

### 1. Prescription Filled

**Event**: `PrescriptionFilled`
```php
class PrescriptionFilled implements ShouldBeStored
{
    public function __construct(
        public string $fulfillmentId,
        public string $prescriptionId,
        public string $pharmacyId,
        public string $pharmacistId,
        public array $medications, // [medId, name, dosage, quantity]
        public string $status,
        public DateTimeImmutable $filledAt
    ) {}
}
```

## Integration Patterns

### 1. External System Integration

**Event**: `ExternalSystemNotificationSent`
```php
class ExternalSystemNotificationSent implements ShouldBeStored
{
    public function __construct(
        public string $notificationId,
        public string $systemName,
        public string $eventType,
        public array $payload,
        public string $status,
        public ?string $response,
        public DateTimeImmutable $sentAt
    ) {}
}
```

## Testing Strategies

### 1. Unit Testing Aggregates

```php
class PatientAggregateTest extends TestCase
{
    /** @test */
    public function it_can_register_a_patient()
    {
        $patientId = 'patient-123';
        
        $aggregate = PatientAggregate::retrieve($patientId);
        
        $aggregate->registerPatient(
            patientId: $patientId,
            firstName: 'John',
            lastName: 'Doe',
            email: 'john@example.com'
        )->persist();
        
        $this->assertDatabaseHas('stored_events', [
            'event_class' => PatientRegistered::class,
            'aggregate_uuid' => $patientId
        ]);
    }
}
```

### 2. Testing Projectors

```php
class PatientProjectorTest extends TestCase
{
    use RefreshProjection;
    
    /** @test */
    public function it_projects_patient_registration()
    {
        $patientId = 'patient-123';
        $event = new PatientRegistered(
            patientId: $patientId,
            firstName: 'Jane',
            lastName: 'Smith',
            email: 'jane@example.com',
            registeredAt: now()
        );
        
        event($event);
        
        $this->assertDatabaseHas('patients', [
            'id' => $patientId,
            'email' => 'jane@example.com',
            'full_name' => 'Jane Smith'
        ]);
    }
}
```

## Conclusion

These examples demonstrate how event sourcing can be applied to various aspects of a healthcare application. By modeling domain events explicitly, we create a system that is:

1. **Auditable**: Every change is recorded
2. **Extensible**: New features can be added by introducing new events
3. **Resilient**: The system can be rebuilt by replaying events
4. **Understandable**: The business logic is expressed in terms of domain events

Remember to always consider the specific needs of your healthcare application and adjust these patterns accordingly.---
module: theme
topic: event-sourcing-examples
canonical: ../../../Themes/docs/shared-components/event-sourcing-examples-duplicate.md

<<<<<<< .merge_file_ISssVj
See canonical documentation: ../../../Themes/docs/shared-components/event-sourcing-examples-duplicate.md
<<<<<<< HEAD
>>>>>>> 0a02158a (.)
=======
>>>>>>> 35d8cf69 (Initial commit)
>>>>>>> laraxot/dev
=======
See canonical documentation: ../../../Themes/docs/shared-components/event-sourcing-examples-duplicate.md
>>>>>>> .merge_file_AwWl6o
