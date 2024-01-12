<div class="navbar bg-base-100 border border-black-500 shadow-md">
    <div class="navbar-start">
        <div class="drawer">
            <?php if (isset($_SESSION['user'])) :  ?>
                <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    <!-- Page content here -->
                    <label for="my-drawer" class="btn btn-circle drawer-button bg-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </label>
                </div>
            <?php endif; ?>
            <div class="drawer-side z-50">
                <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
                    <div class="flex justify-center mt-20 mb-5">
                        <div class="avatar online">
                            <div class="w-28 rounded-full">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar content here -->
                    <li><a href="/dashboard/create">Create a new post</a></li>
                    <li><a>Posts</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost text-xl">WordClick</a>
    </div>
    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <?php if (isset($_SESSION['user'])) :  ?>
                        <img alt="Tailwind CSS Navbar component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    <?php else : ?>
                        <img alt="Tailwind CSS Navbar component" src="svg/person-circle.svg" />
                    <?php endif; ?>
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <?php if (isset($_SESSION['user'])) :  ?>
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li>
                        <button onclick="my_modal_5.showModal()">Logout</button>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="/register" class="justify-between">
                            Register
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Posts</a></li>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<!-- Open the modal using ID.showModal() method -->

<dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Warning</h3>
        <p class="py-4">This is your last changes, are you sure to logout?</p>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn bg-red-500 text-slate-100 hover:bg-red-700">Cancel</button>
                <a href="/logout" class="btn">I'm sure</a>
            </form>
        </div>
    </div>
</dialog>