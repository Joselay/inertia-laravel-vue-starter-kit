<script setup>
defineOptions({
    layout: null,
});
import { ref } from "vue";
import Logo from "@/Layouts/Logo.vue";
import { PhotoIcon, UserCircleIcon } from "@heroicons/vue/24/solid";
import { ChevronDownIcon } from "@heroicons/vue/16/solid";
import {
    Dialog,
    DialogPanel,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { useForm, Link } from "@inertiajs/vue3";

import {
    Bars3Icon,
    CalendarIcon,
    ChartPieIcon,
    DocumentDuplicateIcon,
    FolderIcon,
    HomeIcon,
    UsersIcon,
    XMarkIcon,
} from "@heroicons/vue/24/outline";

const navigation = [
    { name: "Dashboard", href: "/admin", icon: HomeIcon, current: true },
];

const sidebarOpen = ref(false);

const form = useForm({
    name: "",
    title: "",
    department: "",
    email: "",
    role: "",
    image: "",
    status: "Active",
    password: "",
});

const submit = () => {
    form.post(route("users.store"));
};
</script>

<template>
    <div>
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog
                class="relative z-50 lg:hidden"
                @close="sidebarOpen = false"
            >
                <TransitionChild
                    as="template"
                    enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-gray-900/80" />
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <TransitionChild
                        as="template"
                        enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full"
                        enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform"
                        leave-from="translate-x-0"
                        leave-to="-translate-x-full"
                    >
                        <DialogPanel
                            class="relative flex flex-1 w-full max-w-xs mr-16"
                        >
                            <TransitionChild
                                as="template"
                                enter="ease-in-out duration-300"
                                enter-from="opacity-0"
                                enter-to="opacity-100"
                                leave="ease-in-out duration-300"
                                leave-from="opacity-100"
                                leave-to="opacity-0"
                            >
                                <div
                                    class="absolute top-0 flex justify-center w-16 pt-5 left-full"
                                >
                                    <button
                                        type="button"
                                        class="-m-2.5 p-2.5"
                                        @click="sidebarOpen = false"
                                    >
                                        <span class="sr-only"
                                            >Close sidebar</span
                                        >
                                        <XMarkIcon
                                            class="w-6 h-6 text-white"
                                            aria-hidden="true"
                                        />
                                    </button>
                                </div>
                            </TransitionChild>
                            <!-- Sidebar component, swap this element with another sidebar if you like -->
                            <div
                                class="flex flex-col px-6 pb-2 overflow-y-auto bg-white grow gap-y-5"
                            >
                                <div class="flex items-center h-16 shrink-0">
                                    <Logo />
                                </div>
                                <nav class="flex flex-col flex-1">
                                    <ul
                                        role="list"
                                        class="flex flex-col flex-1 gap-y-7"
                                    >
                                        <li>
                                            <ul
                                                role="list"
                                                class="-mx-2 space-y-1"
                                            >
                                                <li
                                                    v-for="item in navigation"
                                                    :key="item.name"
                                                >
                                                    <Link
                                                        :href="item.href"
                                                        :class="[
                                                            item.current
                                                                ? 'bg-gray-50 text-indigo-600'
                                                                : 'text-gray-700 hover:bg-gray-50 hover:text-indigo-600',
                                                            'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6',
                                                        ]"
                                                    >
                                                        <component
                                                            :is="item.icon"
                                                            :class="[
                                                                item.current
                                                                    ? 'text-indigo-600'
                                                                    : 'text-gray-400 group-hover:text-indigo-600',
                                                                'h-6 w-6 shrink-0',
                                                            ]"
                                                            aria-hidden="true"
                                                        />
                                                        {{ item.name }}
                                                    </Link>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div
            class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col"
        >
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div
                class="flex flex-col px-6 overflow-y-auto bg-white border-r border-gray-200 grow gap-y-5"
            >
                <div class="flex items-center h-16 shrink-0">
                    <Logo />
                </div>
                <nav class="flex flex-col flex-1">
                    <ul role="list" class="flex flex-col flex-1 gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li v-for="item in navigation" :key="item.name">
                                    <Link
                                        :href="item.href"
                                        :class="[
                                            item.current
                                                ? 'bg-gray-50 text-indigo-600'
                                                : 'text-gray-700 hover:bg-gray-50 hover:text-indigo-600',
                                            'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6',
                                        ]"
                                    >
                                        <component
                                            :is="item.icon"
                                            :class="[
                                                item.current
                                                    ? 'text-indigo-600'
                                                    : 'text-gray-400 group-hover:text-indigo-600',
                                                'h-6 w-6 shrink-0',
                                            ]"
                                            aria-hidden="true"
                                        />
                                        {{ item.name }}
                                    </Link>
                                </li>
                            </ul>
                        </li>

                        <li class="mt-auto -mx-6">
                            <Link
                                href="#"
                                class="flex items-center px-6 py-3 text-sm font-semibold leading-6 text-gray-900 gap-x-4 hover:bg-gray-50"
                            >
                                <img
                                    class="w-8 h-8 rounded-full bg-gray-50"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt=""
                                />
                                <span class="sr-only">Your profile</span>
                                <span aria-hidden="true">Tom Cook</span>
                            </Link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div
            class="sticky top-0 z-40 flex items-center px-4 py-4 bg-white shadow-sm gap-x-6 sm:px-6 lg:hidden"
        >
            <button
                type="button"
                class="-m-2.5 p-2.5 text-gray-700 lg:hidden"
                @click="sidebarOpen = true"
            >
                <span class="sr-only">Open sidebar</span>
                <Bars3Icon class="w-6 h-6" aria-hidden="true" />
            </button>
            <div class="flex-1 text-sm font-semibold leading-6 text-gray-900">
                Dashboard
            </div>
            <Link href="#">
                <span class="sr-only">Your profile</span>
                <img
                    class="w-8 h-8 rounded-full bg-gray-50"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt=""
                />
            </Link>
        </div>

        <main class="lg:pl-72">
            <div class="xl:pl-96">
                <div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-6">
                    <form @submit.prevent="submit">
                        <div class="space-y-12">
                            <div class="pb-12 border-b border-gray-900/10">
                                <h2
                                    class="font-semibold text-gray-900 text-base/7"
                                >
                                    Personal Information
                                </h2>
                                <p class="mt-1 text-gray-600 text-sm/6">
                                    Use a permanent address where you can
                                    receive mail.
                                </p>

                                <div
                                    class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6"
                                >
                                    <div class="sm:col-span-3">
                                        <label
                                            for="name"
                                            class="block font-medium text-gray-900 text-sm/6"
                                            >Name</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                v-model="form.name"
                                                type="text"
                                                name="name"
                                                id="name"
                                                autocomplete="name"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label
                                            for="email"
                                            class="block font-medium text-gray-900 text-sm/6"
                                            >Email address</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                v-model="form.email"
                                                id="email"
                                                name="email"
                                                type="email"
                                                autocomplete="email"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-full">
                                        <label
                                            for="password"
                                            class="block font-medium text-gray-900 text-sm/6"
                                            >Password</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                v-model="form.password"
                                                id="password"
                                                name="password"
                                                type="password"
                                                autocomplete="password"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label
                                            for="title"
                                            class="block font-medium text-gray-900 text-sm/6"
                                            >Title</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                v-model="form.title"
                                                type="text"
                                                name="title"
                                                id="title"
                                                autocomplete="title"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-span-3">
                                        <label
                                            for="department"
                                            class="block font-medium text-gray-900 text-sm/6"
                                            >Department</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                type="text"
                                                v-model="form.department"
                                                name="department"
                                                id="department"
                                                autocomplete="department"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label
                                            for="status"
                                            class="block font-medium text-gray-900 text-sm/6"
                                            >Status</label
                                        >
                                        <div class="grid grid-cols-1 mt-2">
                                            <select
                                                v-model="form.status"
                                                id="status"
                                                name="status"
                                                autocomplete="status"
                                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            >
                                                <option value="Active">
                                                    Active
                                                </option>
                                                <option value="Inactive">
                                                    Inactive
                                                </option>
                                            </select>
                                            <ChevronDownIcon
                                                class="self-center col-start-1 row-start-1 mr-2 text-gray-500 pointer-events-none size-5 justify-self-end sm:size-4"
                                                aria-hidden="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-span-3">
                                        <label
                                            for="role"
                                            class="block font-medium text-gray-900 text-sm/6"
                                            >Role</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                type="text"
                                                v-model="form.role"
                                                name="role"
                                                id="role"
                                                autocomplete="role"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label
                                            for="image"
                                            class="block font-medium text-gray-900 text-sm/6"
                                            >Image</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                placeholder="https://example.com"
                                                type="text"
                                                v-model="form.image"
                                                name="image"
                                                id="image"
                                                autocomplete="image"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 gap-x-6">
                            <Link
                                href="/admin"
                                type="button"
                                class="font-semibold text-gray-900 text-sm/6"
                            >
                                Cancel
                            </Link>
                            <button
                                type="submit"
                                class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <aside
            class="fixed inset-y-0 hidden px-4 py-6 overflow-y-auto border-r border-gray-200 left-72 w-96 sm:px-6 lg:px-8 xl:block"
        >
            <!-- Secondary column (hidden on smaller screens) -->
        </aside>
    </div>
</template>
