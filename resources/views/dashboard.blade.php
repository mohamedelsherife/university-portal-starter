@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<h1 class="page-title text-center"><i class="fa-solid fa-gauge"></i> Dashboard</h1>
<x-card>

<div class="stats-grid">

    <div class="stat-card">
        <i class="fa-regular fa-building" style="color:#3B82F6;"></i>
        <h3 style="color:#3B82F6;">Departments</h3>
        <h1 style="color:#3B82F6;">{{ $departmentsCount }}</h1>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-user-graduate" style="color:#10B981;"></i>
        <h3 style="color:#10B981;">Students</h3>
        <h1 style="color:#10B981;">{{ $studentsCount }}</h1>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-book" style="color:#F59E0B;"></i>
        <h3 style="color:#F59E0B;">Courses</h3>
        <h1 style="color:#F59E0B;">{{ $coursesCount }}</h1>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-person-chalkboard" style="color:#EF4444;"></i>
        <h3 style="color:#EF4444;">Professors</h3>
        <h1 style="color:#EF4444;">{{ $professorsCount }}</h1>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-users" style="color:#8B5CF6;"></i>
        <h3 style="color:#8B5CF6;">Enrollments</h3>
        <h1 style="color:#8B5CF6;">{{ $enrollmentsCount }}</h1>
    </div>

</div>

<hr style="margin:35px 0;">

<div class="overview-grid">

    <div class="overview-box">
        <h3 style="margin-bottom:10px;">
            <i class="fa-solid fa-circle-info" style="color:#F59E0B;"></i>
            System Overview
        </h3>

        <p style="line-height:1.8; color:#333;">
            This dashboard provides a quick overview of the university portal.
            It displays live statistics from the database, so the numbers update
            automatically when records are added, edited, or deleted.
        </p>
    </div>

    <div class="modules-box">
        <h3 style="margin-bottom:15px;">Main Modules</h3>

        <p><i class="fa-regular fa-building" style="color:#3B82F6;"></i> Department Management</p>
        <p><i class="fa-solid fa-user-graduate" style="color:#10B981;"></i> Student Management</p>
        <p><i class="fa-solid fa-book" style="color:#F59E0B;"></i> Course Management</p>
        <p><i class="fa-solid fa-person-chalkboard" style="color:#EF4444;"></i> Professor Management</p>
        <p><i class="fa-solid fa-users" style="color:#8B5CF6;"></i> Enrollment Management</p>
    </div>

</div>

</x-card>

@endsection