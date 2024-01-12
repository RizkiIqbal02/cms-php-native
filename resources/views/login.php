<?php include "partials/header.php" ?>

<div class="flex w-full h-screen justify-center items-center">

    <div class="card w-2/6 bg-base-100 shadow-2xl">
        <!-- <figure class="px-10 pt-10">
            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" />
        </figure> -->
        <div class="card-body items-center text-center w-full">
            <h2 class="card-title">Login to your account</h2>
            <form class="flex flex-row gap-3 flex-wrap justify-center" action="/login" method="post">
                <label class="form-control w-full max-w-md">
                    <div class="label">
                        <span class="label-text">Type your email</span>
                    </div>
                    <input required type="email" name="email" placeholder="Type your email" class="input input-bordered" />
                    <div class="label">
                        <span class="label-text-alt"></span>
                        <!-- <span class="label-text-alt">Bottom Right label</span> -->
                    </div>
                </label>
                <label class="form-control w-full max-w-md">
                    <div class="label">
                        <span class="label-text">Type your password</span>
                    </div>
                    <input required type="password" name="password" placeholder="Type password" class="input input-bordered w-full max-w-md" />
                    <div class="label">
                        <span class="label-text-alt"></span>
                        <!-- <span class="label-text-alt">Bottom Right label</span> -->
                    </div>
                </label>

                <button type="submit" class="btn btn-block max-w-md bg-fuchsia-500 text-slate-200 hover:bg-fuchsia-800">Create account</button>
            </form>
        </div>
    </div>
</div>

<?php include "partials/footer.php" ?>