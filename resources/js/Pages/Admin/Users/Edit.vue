<script setup>
import { useForm } from "@inertiajs/vue3";

const { user } = defineProps({
    user: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: user.name || "",
    email: user.email || "",
    title: user.title || "",
    department: user.department || "",
    image: user.image || "",
    status: user.status || "Active",
    role: user.role || "",
    password: "",
});

function submit() {
    form.patch(route("users.update", user.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset("password"); // Reset the password field after a successful update
        },
    });
}
</script>

<template>
    <div class="max-w-3xl mx-auto mt-10">
        <h1 class="text-xl font-bold text-gray-800">Edit User</h1>
        <form @submit.prevent="submit" class="mt-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700"
                    >Name</label
                >
                <input
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                />
                <p v-if="form.errors.name" class="mt-1 text-red-600">
                    {{ form.errors.name }}
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"
                    >Email</label
                >
                <input
                    v-model="form.email"
                    type="email"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                />
                <p v-if="form.errors.email" class="mt-1 text-red-600">
                    {{ form.errors.email }}
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"
                    >Title</label
                >
                <input
                    v-model="form.title"
                    type="text"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                />
                <p v-if="form.errors.title" class="mt-1 text-red-600">
                    {{ form.errors.title }}
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"
                    >Department</label
                >
                <input
                    v-model="form.department"
                    type="text"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                />
                <p v-if="form.errors.department" class="mt-1 text-red-600">
                    {{ form.errors.department }}
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"
                    >Image URL</label
                >
                <input
                    v-model="form.image"
                    type="url"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                />
                <p v-if="form.errors.image" class="mt-1 text-red-600">
                    {{ form.errors.image }}
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"
                    >Status</label
                >
                <select
                    v-model="form.status"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                >
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <p v-if="form.errors.status" class="mt-1 text-red-600">
                    {{ form.errors.status }}
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"
                    >Role</label
                >
                <input
                    v-model="form.role"
                    type="text"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                />
                <p v-if="form.errors.role" class="mt-1 text-red-600">
                    {{ form.errors.role }}
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"
                    >Password</label
                >
                <input
                    v-model="form.password"
                    type="password"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                />
                <p v-if="form.errors.password" class="mt-1 text-red-600">
                    {{ form.errors.password }}
                </p>
            </div>
            <div>
                <button
                    type="submit"
                    class="px-4 py-2 text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500"
                >
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</template>
