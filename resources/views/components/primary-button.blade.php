<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-800 uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-200 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
