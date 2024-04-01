<div x-cloak x-data="{open: false}" x-show="open"  @flash-message.window="open = true; setTimeout(() => open=false,5000)">
    <div   class="border-2 {{ $type ? $colors[$type] : '' }} px-1 py-2 rounded">
        {{ $message }}
    </div>
</div>
