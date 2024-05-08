@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        {{ $status }}
        <small>resources/views/components/auth-session-status.blade.php</small>
    </div>
@endif
