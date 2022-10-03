<x-only-header title="Thông tin">
    <ul>
        <li>
            {{ Auth::guard('customer')->user()->name }}
        </li>
        <li>
            {{ Auth::guard('customer')->user()->email }}
        </li>
        <li>
            {{ Auth::guard('customer')->user()->phone }}
        </li>
        <li>
            <img src="/storage/avatar/{{ Auth::guard('customer')->user()->avatar }}" width="150" height="150" alt="">
        </li>
    </ul>
</x-only-header>
