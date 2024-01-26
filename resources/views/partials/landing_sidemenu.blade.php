<div x-show="sidebar_open" x-transition.opacity
    class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-green-600 z-50"
    @click.outside="sidebar_open = false">
    <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex justify-between">
            <a href="/" class="btn btn-ghost normal-case text-xl"><img width="40px"
                    src="{{ asset('assets/static/image/logo.png') }}"></a>
            <svg x-on:click="sidebar_open=!sidebar_open" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>

        </div>
        <div class="my-2 bg-green-700 h-[1px]"></div>
    </div>
    <a href="/daftar">
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-700 text-white">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Daftar Sekarang</span>
        </div>
    </a>
    <a href="/#alur">
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-700 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Alur Pendaftaran</span>
        </div>
    </a>
    <a href="/#brosur">
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-700 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Brosur</span>
        </div>
    </a>
    <a href="/#narahubung">
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-700 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Narahubung</span>
        </div>
    </a>
    <div class="my-4 bg-green-700 h-[1px]"></div>
    <a href="/masuk">
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-700 text-white">
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">MASUK</span>
        </div>
    </a>
</div>
