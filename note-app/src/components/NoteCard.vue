<template>
  <div class="note-card">
    <div v-if="editing">
      <p class="note-head">Title</p>
      <input v-model="localNote.title" class="note-title-input" />
      
      <p class="note-head">Content</p>
      <textarea v-model="localNote.content" class="note-textarea"></textarea>
      
      <div class="note-actions">
        <button @click="save" class="btn edit-btn">Save</button>
        <button @click="cancel" class="btn cancel-btn">Cancel</button>
      </div>
    </div>
    <div v-else>
      <p class="note-head">Titile</p>
      <h3 class="note-title">{{ note.title }}</h3>
      <p class="note-head">Content</p>
      <p class="note-content">{{ note.content }}</p>
      <div class="note-actions">
        <button @click="editing = true" class="btn edit-btn">Edit</button>
        <button @click="$emit('delete', note.id)" class="btn delete-btn">Delete</button>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props: {
    note: Object
  },
  data() {
    return {
      editing: false,
      localNote: { ...this.note }
    }
  },
  methods: {
    save() {
      this.$emit('save', this.localNote)
      this.editing = false
    },
    cancel() {
      this.localNote = { ...this.note }
      this.editing = false
    }
  }
}
</script>


<style scoped>
.note-head {
  margin-bottom: 0;
  opacity: 0.5;
  
}
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

.note-title {
  border: none;
  outline: none;
}

.note-title-input {
  width: 100%;
  border: none;
  outline: none;
  background: transparent;
  font-size: 1.3rem;
  font-weight: bold;
  margin-bottom: 10px;
  font-family: inherit;
  padding: 6px 10px;
  border-radius: 12px;
  transition: border-color 0.3s ease;
}

.note-textarea {
  width: 100%;
  resize: none;
  border: none;
  border-radius: 12px;
  padding: 10px;
  font-size: 1rem;
  margin-bottom: 15px;
  font-family: inherit;
  min-height: 80px;
  background: transparent;
  transition: border-color 0.3s ease;
}

.note-textarea:focus,
.note-title-input:focus {
  outline: none;
  border-color: transparent;
  box-shadow: none;
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



.note-textarea:focus {
  outline: none;
  border-color: transparent; 
  box-shadow: none;           
}

</style>