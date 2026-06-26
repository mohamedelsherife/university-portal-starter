# 🎓 University Portal — Full CRUD Laravel Project

A complete university portal system built with **Laravel**, using a **Controller → Service → DTO → Blade View** architecture to manage Departments, Students, Courses, Professors, and Enrollments.

---

## 📌 Overview

The project is split across team members, where each student builds a full CRUD module (Create, Read, Update, Delete) following a shared, consistent structure:

```
Controller → Service → DTO → Blade Views
```

---

## 🧩 Team Structure & Responsibilities

### 👤 Student 1 — Mohamed: Core UI & Department Management

**Module A (Shared): Core UI**
- Create the main layout `layouts/app.blade.php` (navigation, header, footer)
- Create reusable Blade components used by the whole team:
  - `<x-button>`
  - `<x-form-input>`
  - `<x-card>`

**Module B: Department Management**

| Operation | Description |
|---|---|
| Create | Form to add a new department (e.g., "Computer Science") |
| Read | Page listing all departments |
| Update | Form to edit a department's name |
| Delete | Button to remove a department |

**Files:**
```
DepartmentController.php
DepartmentService.php
DepartmentDTO.php
views/departments/index.blade.php
views/departments/create.blade.php
views/departments/edit.blade.php
```

---

### 👤 Student 2 — Ahlem: Student Management

| Operation | Description |
|---|---|
| Create | Form to add a new student |
| Read | Page listing all students (using `@foreach` and arrays) |
| Update | Form to edit a student's details |
| Delete | Delete a student |

**Files:**
```
StudentController.php
StudentService.php
StudentDTO.php
views/students/index.blade.php
views/students/create.blade.php
views/students/edit.blade.php
```

---

### 👤 Student 3 — Farah: Course Management

| Operation | Description |
|---|---|
| Create | Form to add a new course |
| Read | Page listing all courses |
| Update | Form to edit a course's details (title, course code) |
| Delete | Delete a course |

**Files:**
```
CourseController.php
CourseService.php
CourseDTO.php
views/courses/index.blade.php
views/courses/create.blade.php
views/courses/edit.blade.php
```

---

### 🌟 Optional — Professor Management

| Operation | Description |
|---|---|
| Create | Add a new professor |
| Read | List all professors |
| Update | Edit a professor's details (name, department) |
| Delete | Delete a professor |

**Files:**
```
ProfessorController.php
ProfessorService.php
ProfessorDTO.php
views/professors/index.blade.php
views/professors/create.blade.php
views/professors/edit.blade.php
```

---

### 🌟 Optional — Enrollment Management

Connects students and courses.

| Operation | Description |
|---|---|
| Create | Enroll a student in a course (using dropdowns for students/courses) |
| Read | List all enrollments (e.g., "Student X is in Course Y") |
| Update | Edit an enrollment (e.g., add a final grade) |
| Delete | Drop a student from a course |

**Files:**
```
EnrollmentController.php
EnrollmentService.php
EnrollmentDTO.php
views/enrollments/index.blade.php
views/enrollments/create.blade.php
views/enrollments/edit.blade.php
```

---

## 🏗️ Architecture Pattern

```
┌─────────────┐     ┌─────────┐     ┌──────┐     ┌──────────────┐
│  Controller │ --> │ Service │ --> │  DTO │ --> │ Blade Views  │
└─────────────┘     └─────────┘     └──────┘     └──────────────┘
```

- **Controller**: receives the request and delegates to the Service
- **Service**: contains the business logic
- **DTO**: carries structured data between layers
- **Blade Views**: built on top of the shared layout/components from Student 1

---

## ✅ Intended Learning Outcomes (ILOs) Covered

| Week | Skill | Applied In |
|---|---|---|
| W10 | Arrays, `@foreach`, form data handling | Student/Course/Enrollment Read & Create |
| W11 | OOP (Classes) | All Service & DTO files |
| W12 | Artisan usage | Generating Controllers |
| W13 | Layouts & Views | Using `layouts/app.blade.php` |
| W14 | Reusable Components | `<x-button>`, `<x-form-input>`, `<x-card>` |

---

## 🚀 Setup

```bash
git clone <repo-url>
cd university-portal
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 👥 Team Breakdown

| Student | Module |
|---|---|
| Mohamed (Student 1) | Core UI + Department Management |
| Ahlem (Student 2) | Student Management |
| Farah (Student 3) | Course Management |
| Optional | Professor Management |
| Optional | Enrollment Management |

---

## 📄 License

This project is for educational purposes as part of a university course.