<template>
  <div>
    <h2 class="text-xl font-bold mb-4">Your Tasks</h2>

    <!-- Task List -->
    <ul>
      <li v-for="task in tasks" :key="task.id" class="mb-2 p-2 border rounded">
        <div class="flex justify-between items-center">
          <div>
            <p class="font-semibold">{{ task.title }}</p>
            <p class="text-sm text-gray-600">{{ task.status }}</p>
            <p class="text-sm text-gray-500">{{ task.deadline }}</p>
          </div>
          <div class="space-x-2">
            <button @click="startEdit(task)" class="text-blue-500 hover:underline">Edit</button>
            <button @click="deleteTask(task.id)" class="text-red-500 hover:underline">Delete</button>
          </div>
        </div>
      </li>
    </ul>

    <!-- Edit Dialog -->
    <div v-if="editingTask" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
        <h3 class="text-lg font-bold mb-4">Edit Task</h3>

        <div class="space-y-4">
          <input v-model="editingTask.title" placeholder="Title" class="w-full border p-2 rounded" />
          <textarea v-model="editingTask.description" placeholder="Description" class="w-full border p-2 rounded"></textarea>

          <select v-model="editingTask.status" class="w-full border p-2 rounded">
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
          </select>

          <input type="date" v-model="editingTask.deadline" class="w-full border p-2 rounded" />
        </div>

        <div class="mt-6 flex justify-end space-x-3">
          <button @click="cancelEdit" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
          <button @click="updateTask" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      tasks: [],
      editingTask: null,
    };
  },
  mounted() {
    this.fetchTasks();
  },
  methods: {
    async fetchTasks() {
      try {
        const response = await axios.get('/tasks');
        this.tasks = response.data;
      } catch (error) {
        console.error('Error fetching tasks:', error);
      }
    },
    startEdit(task) {
      this.editingTask = { ...task }; // clone to avoid direct mutation
    },
    cancelEdit() {
      this.editingTask = null;
    },
    async updateTask() {
      try {
        await axios.put(`/tasks/${this.editingTask.id}`, this.editingTask);
        this.editingTask = null;
        this.fetchTasks();
      } catch (error) {
        console.error('Error updating task:', error);
        alert('Failed to update task.');
      }
    },
    async deleteTask(id) {
      if (confirm('Are you sure you want to delete this task?')) {
        try {
          await axios.delete(`/tasks/${id}`);
          this.fetchTasks();
        } catch (error) {
          console.error('Error deleting task:', error);
        }
      }
    },
  },
};
</script>
