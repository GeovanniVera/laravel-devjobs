<button {{ $attributes->merge(['type' => 'submit', 'class' => ' px-4 py-2 bg-indigo-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-indigo-800 uppercase tracking-widest hover:bg-indigo-600 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
