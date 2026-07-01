@props([
    'type' => 'success', // success | error | warning | info
])

@php
    $styles = [
        'success' => [
            'bg' => 'rgba(40, 167, 90, 0.1)',
            'border' => '#28a75a',
            'text' => '#1e7e42',
            'icon' => '✓',
        ],
        'error' => [
            'bg' => 'rgba(220, 53, 69, 0.1)',
            'border' => '#dc3545',
            'text' => '#c82333',
            'icon' => '✕',
        ],
        'warning' => [
            'bg' => 'rgba(242, 179, 61, 0.12)',
            'border' => '#F2B33D',
            'text' => '#8a6415',
            'icon' => '!',
        ],
        'info' => [
            'bg' => 'rgba(10, 10, 10, 0.05)',
            'border' => '#0a0a0a',
            'text' => '#0a0a0a',
            'icon' => 'i',
        ],
    ];
    $s = $styles[$type] ?? $styles['success'];
    $alertId = 'alert-' . uniqid();
@endphp

<div
    id="{{ $alertId }}"
    class="app-alert"
    style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 18px;
        margin-bottom: 20px;
        border-radius: 10px;
        background-color: {{ $s['bg'] }};
        border: 1px solid {{ $s['border'] }};
        color: {{ $s['text'] }};
        font-weight: 500;
        font-size: 0.95rem;
        transition: opacity 0.3s ease, transform 0.3s ease;
    "
>
    <div style="display: flex; align-items: center; gap: 10px;">
        <span style="
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: {{ $s['border'] }};
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            flex-shrink: 0;
        ">{{ $s['icon'] }}</span>

        <span>{{ $slot }}</span>
    </div>

    <button
        type="button"
        onclick="closeAppAlert('{{ $alertId }}')"
        style="
            background: none;
            border: none;
            font-size: 1.1rem;
            line-height: 1;
            cursor: pointer;
            color: {{ $s['text'] }};
            opacity: 0.6;
            padding: 0 4px;
        "
        onmouseover="this.style.opacity=1"
        onmouseout="this.style.opacity=0.6"
    >&times;</button>
</div>

@once
    <script>
        function closeAppAlert(id) {
            const el = document.getElementById(id);
            if (!el) return;
            el.style.opacity = '0';
            el.style.transform = 'translateY(-6px)';
            setTimeout(() => el.remove(), 300);
        }

        // Auto-dismiss all app alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.app-alert').forEach((alertEl) => {
                setTimeout(() => {
                    if (alertEl.id) closeAppAlert(alertEl.id);
                }, 5000);
            });
        });
    </script>
@endonce