<template>
  <div class="app-container">
    <div class="header">
      <h1>NOTE TAKING APP</h1>
      <button @click="showModal = true" class="add-note-btn">+ Add Note</button>
    </div>

    <NoteModal :visible="showModal" @close="showModal = false" @save="createNote" />

    <div class="note-list">
      <NoteCard
        v-for="note in notes"
        :key="note.id"
        :note="note"
        @save="updateNote"
        @delete="deleteNote"
      />
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import NoteCard from './components/NoteCard.vue';
import NoteModal from './components/NoteModal.vue';

export default {
  components: { NoteCard, NoteModal },
  data() {
    return {
      notes: [],
      showModal: false
    };
  },
  mounted() {
    this.fetchNotes();
  },
  methods: {
    fetchNotes() {
      axios.get('http://localhost:8000/api/notes').then(res => {
        this.notes = res.data;
      });
    },
    createNote(newNote) {
      axios
        .post('http://localhost:8000/api/notes', newNote)
        .then(() => {
          this.fetchNotes();
          this.showModal = false;
        });
    },
    updateNote(note) {
      axios
        .put(`http://localhost:8000/api/notes/${note.id}`, note)
        .then(() => this.fetchNotes());
    },
    deleteNote(id) {
      axios
        .delete(`http://localhost:8000/api/notes/${id}`)
        .then(() => this.fetchNotes());
    }
  }
};
</script>

<style scoped>
.app-container {
  max-width: 1200px;
  margin: auto;
  padding: 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 25px;
}

h1 {
  font-size: 2rem;
  color: #333;
}

.add-note-btn {
  background-color: #4caf50;
  color: white;
  border: none;
  padding: 10px 18px;
  font-weight: bold;
  border-radius: 10px;
  font-size: 1rem;
  cursor: pointer;
  transition: 0.3s ease-in-out;
}

.add-note-btn:hover {
  background-color: #43a047;
}

.note-list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}
</style>
