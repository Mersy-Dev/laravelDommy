@if(session()->has('mssg'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform-translate-x-1/2 bg-laravel text-white px-40 py-3" role="alert">
        <p>
            {{ session()->get('mssg') }}
        </p>
    </div>
    
@endif