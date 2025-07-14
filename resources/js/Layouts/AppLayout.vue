<template>
  <div>
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
      <div class="flex items-center">
        <img src="../../../public/images/download.png" alt="Logo" class="w-28 h-14 mr-2" />
        <span class="font-bold">Task Management System</span>
      </div>
      <div>
        <Link href="/dashboard" class="mr-4">Dashboard</Link>
        <Link href="/profile">Profile</Link>
      </div>
    </nav>

    <!-- Page content -->
    <main class="p-4">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
