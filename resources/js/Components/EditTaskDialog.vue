<template>
  <div v-if="task" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow w-full max-w-md">
      <h2 class="text-xl font-bold mb-4">Edit Task</h2>

      <form @submit.prevent="updateTask">
        <div class="mb-3">
          <label class="block font-medium mb-1">Title</label>
          <input v-model="form.title" class="border p-2 rounded w-full" required />
        </div>

        <div class="mb-3">
          <label class="block font-medium mb-1">Description</label>
          <textarea v-model="form.description" class="border p-2 rounded w-full" />
        </div>

        <div class="mb-3">
          <label class="block font-medium mb-1">Deadline</label>
          <input type="date" v-model="form.deadline" class="border p-2 rounded w-full" required />
        </div>

        <div class="mb-3">
          <label class="block font-medium mb-1">Status</label>
          <select v-model="form.status" class="border p-2 rounded w-full">
            <option>Pending</option>
            <option>In Progress</option>
            <option>Completed</option>
          </select>
        </div>

        <div class="flex justify-end space-x-2">
          <button type="button" class="bg-gray-300 text-black px-4 py-2 rounded" @click="$emit('close')">Cancel</button>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    task: Object,
  },
  data() {
    return {
      form: {
        title: '',
        description: '',
        deadline: '',
        status: 'Pending',
      },
    };
  },
  watch: {
    task: {
      immediate: true,
      handler(newVal) {
        if (newVal) {
          this.form = { ...newVal };
        }
      }
    }
  },
  methods: {
    async updateTask() {
      try {
        await axios.put(`/tasks/${this.task.id}`, this.form);
        this.$emit('updated');
        this.$emit('close');
      } catch (error) {
        console.error('Failed to update task.', error);
      }
    }
  }
}
</script>
