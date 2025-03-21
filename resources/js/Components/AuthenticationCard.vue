<template>
    <div class="h-[80vh] flex flex-col justify-center items-center py-12">
        <div class="mb-6">
            <slot name="logo" />
        </div>

        <div
            class="w-full sm:max-w-2xl lg:max-w-3xl mt-6 px-10 py-8 rounded-2xl border"
        >
            <slot />
        </div>
    </div>
</template>
