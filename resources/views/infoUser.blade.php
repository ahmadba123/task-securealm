<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        /* Add your custom styles here */

    </style>
</head>
<body>
    <div class="container">
        <h1>User Information</h1>
        {{-- @if ($user) --}}
            {{-- <p><span class="info-label">Name:</span> <span class="info-value">{{ $user->name }}</span></p>
            <p><span class="info-label">Email:</span> <span class="info-value">{{ $user->email }}</span></p>
            <p><span class="info-label">Sex:</span> <span class="info-value">{{ $user->sex }}</span></p>
            <p><span class="info-label">Role:</span> <span class="info-value">{{ $user->role }}</span></p>
            <p><span class="info-label">Blood Type:</span> <span class="info-value">{{ $user->blood_type ?: 'N/A' }}</span></p>
            <p><span class="info-label">Approved:</span> <span class="info-value {{ $user->approved ? 'approved' : 'not-approved' }}">{{ $user->approved ? 'Yes' : 'No' }}</span></p> --}}
        {{-- @else --}}
            <p>User not found.</p>
        {{-- @endif --}}
    </div>
</body>
</html>
