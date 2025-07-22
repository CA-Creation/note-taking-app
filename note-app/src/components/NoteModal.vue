<template>
  <div v-if="visible" class="overlay">
    <div class="modal-card">
      <h2 class="modal-title">Create New Note</h2>

      <input
        v-model="title"
        @input="clearWarning('title')"
        placeholder="Enter Title"
        class="input-title"
      />
      <p v-if="warnings.title" class="warning-msg">{{ warnings.title }}</p>

      <textarea
        v-model="content"
        @input="clearWarning('content')"
        placeholder="Write your note..."
        class="input-content"
      ></textarea>
      <p v-if="warnings.content" class="warning-msg">{{ warnings.content }}</p>

      <div class="modal-actions">
        <button class="btn save-btn" @click="saveNote">Save</button>
        <button class="btn cancel-btn" @click="$emit('close')">Cancel</button>
      </div>
    </div>
  </div>
</template>



<script>
export default {
  props: ['visible'],
  data() {
    return {
      title: '',
      content: '',
      warnings: {
        title: '',
        content: ''
      }
    };
  },
  methods: {
    saveNote() {
      this.warnings.title = '';
      this.warnings.content = '';

      if (!this.title.trim()) {
        this.warnings.title = "Title can't be empty";
      }
      if (!this.content.trim()) {
        this.warnings.content = "Content can't be empty";
      }

      if (this.warnings.title || this.warnings.content) return;

      this.$emit('save', {
        title: this.title,
        content: this.content
      });

      this.title = '';
      this.content = '';
      this.warnings.title = '';
      this.warnings.content = '';
    },
    clearWarning(field) {
      this.warnings[field] = '';
    }
  }
};
</script>



<style scoped>
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(20, 20, 20, 0.7);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}
.warning-msg {
  color: #ff9800;
  font-size: 0.85rem;
  margin-top: -12px;
  margin-bottom: 12px;
  padding-left: 4px;
}

.modal-card {
  background: #ffffff;
  width: 90%;
  max-width: 500px;
  padding: 24px;
  border-radius: 18px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  display: flex;
  flex-direction: column;
}

.modal-title {
  margin-bottom: 16px;
  font-size: 1.6rem;
  text-align: center;
}

.input-title,
.input-content {
  width: 100%;
  padding: 10px 14px;
  border: 1px solid #ccc;
  border-radius: 12px;
  font-size: 1rem;
  margin-bottom: 16px;
}

.input-content {
  min-height: 100px;
  resize: vertical;
}

.modal-actions {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

.btn {
  padding: 10px 18px;
  border-radius: 10px;
  font-weight: bold;
  border: none;
  cursor: pointer;
  font-size: 1rem;
}

.save-btn {
  background: #4caf50;
  color: white;
}

.cancel-btn {
  background: #ccc;
}
</style>
