# laravel-modular-monolith
Laravel modular monolith suggested architecture. 

Modular Monolith Course Assessment

**Modular Monolith Course Assessment**

**Description**

You are tasked with creating a backend system for a doctor appointment booking application. The system will be designed for a specific single doctor and should handle the logic behind managing and booking appointments. The project focuses on implementing the necessary APIs and functionality to meet the business requirements.

**Business Requirements:**

Your application should adhere to the following business requirements:

**

#### Doctor Availability:

**

1.  As a doctor, I want to be able to list my slots
    
2.  As a doctor, I want to be able to add new slots where a single time slot should have the following:
    

1.  Id: Guid [?]
    
2.  Time: Date → 22/02/2023 04:30 pm [timestamp]
    
3.  DoctorId: Guid [doctor_id]
    
4.  DoctorName: string [doctor_name] (from relation)

5.  IsReserved: bool 
    
6.  Cost: Decimal 
    

**

#### Appointment Booking:

** 

1.  As a **Patient,** I want to be able to **view** all doctors' available (only) **slots**
> Note: isReserved == true should not be shown, before now slots
    
2.  As a **Patient,** I want to be able to **book** an appointment on a free **slot where.** An Appointment should have the following:
    

1.  Id: Guid 
    
2.  SlotId: Guid [slot_id]
    
3.  PatientId: Guid
    
4.  PatientName: string [from relation]
    
5.  ReservedAt: Datetime
    

**

#### Appointment Confirmation:

**

1.  Once a patient schedules an appointment, the system should send a confirmation notification to the **patient** and the **doctor**
    
2.  The confirmation notification should include the appointment details, such as the patient's name, appointment time, and Doctor's name.
    
3.  For the sake of this assessment, the notification could be just a **Log message**
    

**

#### Doctor Appointment Management:

**

1.  As a Doctor, I want to be able to view my upcoming **appointments**.
    
2.  As a Doctor, I want to be able to mark appointments as **completed** or **cancel** them if necessary.
> Note: we can add "booked" status for the appointment as the default

**

#### Data Persistence:

**

1.  Use any db engine or even **in-memory list** with no db at all
    

#### **Specifications:**

1.  You don’t need to care about authentication or authorization, make it public APIs
    
2.  Assume the system is serving a single Doctor only
    
3.  Apply **modular monolith architecture**
    
4.  The system should consist of **four** modules each with a different architecture as follows:
    

1.  **DoctorAvailability Module**: Traditional Layered Architecture
    
2.  **Appointment Booking Module**: Clean architecture
    
3.  **Appointment Confirmation Module**: Simplest architecture possible
    
**

4. **Doctor Appointment Management** : Hexagonal Architecture

**

6.  **(A plus** **point**)Write unit and integration testing
    

**Deliverables**

Push the complete source code of your application to a source code repository of your choice (e.g., GitHub, GitLab, Bitbucket).

Ensure that commits are done incrementally and reflect your progress throughout development.

**Evaluation Criteria**

Your project will be evaluated based on the following criteria:

1.  Correct implementation of all the required business requirements.
    
2.  Compliance with each specified architecture rule
    
3.  Proper Modularity and integration between them
    
4.  Code quality, including readability, maintainability, adherence to best practices, and separation of concerns
    

Good luck!
