<div class="navbar bg-green-700 text-white">
    <div class="navbar-start">
        <label x-show="sidebar_open == false" tabindex="0" class="btn btn-ghost lg:hidden"
            x-on:click="sidebar_open=!sidebar_open">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
        </label>

        <a href="/" class="btn btn-ghost normal-case text-xl"><img width="150px"
                src="{{ asset('assets/static/image/logo.png') }}"></a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a class="btn bg-green-700 border-0 hover:bg-green-800" href="/daftar">Daftar Sekarang</a></li>
            <li><a class="btn bg-green-700 border-0 hover:bg-green-800" href="/#alur">Alur Pendaftaran Online</a>
            </li>
            <li><a class="btn bg-green-700 border-0 hover:bg-green-800" href="/#brosur">Brosur</a>
            </li>
            <li><a class="btn bg-green-700 border-0 hover:bg-green-800" href="/#narahubung">Narahubung</a></li>

        </ul>
    </div>
    <div class="navbar-end">
        <a href="/masuk" class="btn bg-green-700 border-0 hover:bg-green-800">Masuk</a>
    </div>
</div>
