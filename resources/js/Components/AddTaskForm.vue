<template>
  <form @submit.prevent="submitForm">
    <div>
      <label class="block mb-1 font-semibold">Title</label>
      <input v-model="form.title" class="border p-2 rounded w-full" required />
    </div>

    <div class="mt-4">
      <label class="block mb-1 font-semibold">Description</label>
      <textarea v-model="form.description" class="border p-2 rounded w-full"></textarea>
    </div>

    <div class="mt-4">
      <label class="block mb-1 font-semibold">Deadline</label>
      <input type="date" v-model="form.deadline" class="border p-2 rounded w-full" required />
    </div>

    <div class="mt-4">
      <label class="block mb-1 font-semibold">Status</label>
      <select v-model="form.status" class="border p-2 rounded w-full">
        <option>Pending</option>
        <option>In Progress</option>
        <option>Completed</option>
      </select>
    </div>

    <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Add Task</button>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        title: '',
        description: '',
        deadline: '',
        status: 'Pending',
      }
    };
  },
  methods: {
    async submitForm() {
      try {
        await axios.post('/tasks', this.form);
        this.$emit('task-created');
        this.form = { title: '', description: '', deadline: '', status: 'Pending' };
      } catch (error) {
        console.error('Error saving task:', error);
      }
    }
  }
}
</script>
