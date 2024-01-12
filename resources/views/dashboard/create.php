<?php include __DIR__ . "/../partials/layouts/header.php" ?>

<?php include __DIR__ . "/../partials/components/navbar.php" ?>

<?php include __DIR__ . "/../partials/components/breadcrumbs.php" ?>


<div class="flex flex-col gap-10 justify-center items-center mb-10">
    <h1 class="text-4xl">Create your post</h1>
    <form class="flex flex-col gap-10 justify-center items-center mb-10" action="/dashboard/post" method="post">
        <label class="form-control w-full max-w-xl">
            <div class="label">
                <span class="label-text">What's the title?</span>
            </div>
            <input type="text" placeholder="Type here" name="title" class="input input-bordered w-full max-w-xl" />
        </label>
        <label class="form-control w-full max-w-xl">
            <div class="label">
                <span class="label-text">Description</span>
            </div>
            <input type="text" placeholder="Type here" name="description" class="input input-bordered w-full max-w-xl" />
        </label>
        <input type="hidden" name="user_id" value="<?php echo ($_SESSION['user']['id']) ?>">
        <textarea name="body" id="textarea"></textarea>
        <!-- The button to open modal -->
        <label for="my_modal_6" class="btn bg-fuchsia-600 hover:bg-fuchsia-700 text-slate-200 w-full">Publish</label>
        <input type="checkbox" id="my_modal_6" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Are you sure?</h3>
                <p class="py-4">This is your last change, make sure your post before publishing </p>
                <div class="modal-action">
                    <label for="my_modal_6" class="btn bg-red-500 hover:bg-red-800 text-slate-200">Cancel</label>
                    <button type="submit" for="my_modal_6" class="btn bg-green-500 hover:bg-green-800 text-slate-100">Save</button>
                </div>
            </div>
        </div>

    </form>
</div>

<script src="/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>

<?php include __DIR__ . "/../partials/layouts/footer.php" ?>