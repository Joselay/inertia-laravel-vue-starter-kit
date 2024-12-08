<script setup>
import { router } from "@inertiajs/vue3";
import { ref } from "vue";

const { users } = defineProps({
    users: {
        type: Array,
        required: true,
    },
});

const people = ref([...users]);

function deleteUser(id) {
    router.delete(route("users.destroy", id), {
        onSuccess: () => {
            people.value = people.value.filter((user) => user.id !== id);
        },
        onError: (errors) => {
            console.error("Delete error:", errors);
        },
    });
}
</script>

<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">
                    Users
                </h1>
                <p class="mt-2 text-sm text-gray-700">
                    A list of all the users in your account including their
                    name, title, email, and role.
                </p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <Link
                    href="/admin/users/add"
                    class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Add user
                </Link>
            </div>
        </div>
        <div class="flow-root mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                >
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th
                                    scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                                >
                                    Name
                                </th>
                                <th
                                    scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                >
                                    Title
                                </th>
                                <th
                                    scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                >
                                    Status
                                </th>
                                <th
                                    scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                >
                                    Role
                                </th>
                                <th
                                    scope="col"
                                    class="relative py-3.5 pl-3 pr-4 sm:pr-0"
                                >
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="person in people" :key="person.id">
                                <td
                                    class="py-5 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-0"
                                >
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-11 w-11">
                                            <img
                                                class="rounded-full h-11 w-11"
                                                :src="person.image"
                                                alt=""
                                            />
                                        </div>
                                        <div class="ml-4">
                                            <div
                                                class="font-medium text-gray-900"
                                            >
                                                {{ person.name }}
                                            </div>
                                            <div class="mt-1 text-gray-500">
                                                {{ person.email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-3 py-5 text-sm text-gray-500 whitespace-nowrap"
                                >
                                    <div class="text-gray-900">
                                        {{ person.title }}
                                    </div>
                                    <div class="mt-1 text-gray-500">
                                        {{ person.department }}
                                    </div>
                                </td>
                                <td
                                    class="px-3 py-5 text-sm text-gray-500 whitespace-nowrap"
                                >
                                    <span
                                        v-if="person.status === 'Active'"
                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 rounded-md bg-green-50 ring-1 ring-inset ring-green-600/20"
                                    >
                                        Active
                                    </span>
                                    <span
                                        v-else
                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-700 rounded-md bg-red-50 ring-1 ring-inset ring-red-600/20"
                                    >
                                        Inactive
                                    </span>
                                </td>
                                <td
                                    class="px-3 py-5 text-sm text-gray-500 whitespace-nowrap"
                                >
                                    {{ person.role }}
                                </td>
                                <td
                                    class="relative py-5 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0"
                                >
                                    <Link
                                        :href="route('users.edit', person.id)"
                                        class="text-indigo-600 hover:text-indigo-900"
                                    >
                                        Edit<span class="sr-only"
                                            >, {{ person.name }}</span
                                        >
                                    </Link>
                                </td>
                                <td
                                    class="relative py-5 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0"
                                >
                                    <button
                                        @click="deleteUser(person.id)"
                                        class="text-red-600 hover:text-red-900"
                                    >
                                        Delete<span class="sr-only"
                                            >, {{ person.name }}</span
                                        >
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
