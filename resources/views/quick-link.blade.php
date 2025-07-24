@props(['icon', 'text', 'color', 'route'])

<a href="{{ route($route) }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition transform hover:scale-105">
    <div class="p-2 rounded-lg bg-{{ $color }}-100 text-{{ $color }}-600 mr-3">
        <i class="fas {{ $icon }}"></i>
    </div>
    <span class="text-gray-700">{{ $text }}</span>
</a>
