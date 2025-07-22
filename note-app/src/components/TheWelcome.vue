<template>
  <div class="note-card">
    <textarea
      v-model="noteText"
      placeholder="Write your note here..."
      class="note-textarea"
    ></textarea>

    <h3 class="note-title">{{ title }}</h3>
    <p class="note-content">{{ content }}</p>

    <div class="note-actions">
      <button @click="onEdit" class="btn edit-btn">Edit</button>
      <button @click="onDelete" class="btn delete-btn">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NoteCard',
  props: {
    title: String,
    content: String
  },
  data() {
    return {
      noteText: ''
    };
  },
  methods: {
    onEdit() {
      this.$emit('edit', this.noteText);
    },
    onDelete() {
      this.$emit('delete');
    }
  }
};
</script>

<style scoped>
.note-card {
  background: linear-gradient(145deg, #fefefe, #e6e6e6);
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
  border-radius: 18px;
  padding: 20px;
  margin: 15px;
  max-width: 340px;
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
}

.note-textarea {
  width: 100%;
  resize: none;
  border: 1px solid #ccc;
  border-radius: 12px;
  padding: 10px;
  font-size: 1rem;
  margin-bottom: 15px;
  font-family: inherit;
  min-height: 80px;
  transition: border-color 0.3s ease;
}

.note-textarea:focus {
  outline: none;
  border-color: #4caf50;
}

.note-title {
  font-size: 1.3rem;
  font-weight: bold;
  color: #2d2d2d;
  margin-bottom: 8px;
}

.note-content {
  font-size: 1rem;
  color: #4a4a4a;
  margin-bottom: 20px;
}

.note-actions {
  display: flex;
  justify-content: space-between;
  gap: 10px;
}

.btn {
  padding: 8px 16px;
  border: none;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.2s ease-in-out;
}

.edit-btn {
  background-color: #4caf50;
  color: white;
}

.edit-btn:hover {
  background-color: #45a049;
}

.delete-btn {
  background-color: #f44336;
  color: white;
}

.delete-btn:hover {
  background-color: #e53935;
}
</style>
