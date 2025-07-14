<template>
  <AppLayout>
    <!-- All your dashboard content here -->
    <div class="grid grid-cols-2 gap-4">
      <AddTaskForm @task-created="refreshTasks" />
      <TaskList :onEdit="openEditDialog" />
    </div>

    <EditTaskDialog
      :task="selectedTask"
      :show="showDialog"
      @close="showDialog = false"
      @updated="refreshTasks"
    />
  </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import AddTaskForm from '@/Components/AddTaskForm.vue';
import TaskList from '@/Components/TaskList.vue';
import EditTaskDialog from '@/Components/EditTaskDialog.vue';

export default {
  components: {
    AppLayout,
    AddTaskForm,
    TaskList,
    EditTaskDialog,
  },
  data() {
    return {
      selectedTask: null,
      showDialog: false,
    };
  },
  methods: {
    openEditDialog(task) {
      this.selectedTask = task;
      this.showDialog = true;
    },
    refreshTasks() {
      // Optional: trigger child fetch
    },
  },
};
</script>
