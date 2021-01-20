<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ show: true }" x-show="show">
    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
        <span class="text-xl inline-block mr-5 align-middle" @click="show = !show" >
            <i class="fas fa-bell" />
        </span>
        <span class="inline-block align-middle mr-8">
            <b class="capitalize">Success</b> {{ Session::get('success') }}
        </span>
        <button @click="show = false" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
</div>