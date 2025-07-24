@props(['icon', 'text', 'color' => 'blue', 'route'])

<a href="{{ route($route) }}"
   class="group flex items-center p-3 rounded-xl transition-all duration-300 transform hover:scale-[1.03] hover:shadow-lg bg-white border border-gray-100 hover:border-{{ $color }}-200">
    <div class="p-3 rounded-xl bg-{{ $color }}-100 text-{{ $color }}-600 shadow-sm group-hover:shadow-md transition-all duration-300">
        <i class="fas {{ $icon }} text-lg"></i>
    </div>
    <span class="ml-4 font-medium text-gray-700 group-hover:text-{{ $color }}-700 transition-colors duration-300">
        {{ $text }}
    </span>
</a>
