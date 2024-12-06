<script setup></script>

<template>
    <div>
        <header class="text-white bg-indigo-500">
            <nav
                class="flex items-center justify-center max-w-screen-lg p-4 mx-auto"
            >
                <div class="space-x-6">
                    <Link :href="route('home')">Home</Link>
                    <Link :href="route('about')">About</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
