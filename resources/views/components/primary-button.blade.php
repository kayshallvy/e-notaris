<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-sage border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-kopi focus:bg-kopi active:bg-kopi focus:outline-none focus:ring-2 focus:ring-kopi focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
