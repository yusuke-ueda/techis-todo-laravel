@props([
    'href'=> '',
    'theme'=> 'primary'])

@php
    if(!function_exists('getThemeClassForButtonA')){
        function getThemeClassForButtonA($theme){
            return match($theme){
                'primary'=>'text-white bg-text-blue-500 hover:bg-text-blue-600 focus:ring-text-blue-500',
                'secondary'=>'text-white bg-text-blue-500 hover:bg-text-blue-600 focus:ring-text-blue-500',
                'default'=>'',
            };
        }
    }
@endphp

<a href="{{$href}}" class="
    inline-flex 
    justify-center 
    py-2 px-4 
    border border-transparent
    shadow-sm
    text-sm
    font-medium
    rounded-md 
    bg-green-500 hover:bg-blue-600 focus:ring-blue-500
    focus:outline-none focus:ring-2 focus:ring-offset-2
    {{getThemeClassForButtonA($theme)}}">
    {{ $slot }}
</a>