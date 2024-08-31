<template>
  <div class="bg-white shadow-md rounded-lg p-8 max-w-md mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Contact Us</h1>
    <form @submit.prevent="submitForm" class="space-y-6">
      <div>
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input 
          v-model="form.name" 
          type="text" 
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
          required
          placeholder="Your Name"
        >
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input 
          v-model="form.email" 
          type="email" 
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
          required
          placeholder="you@example.com"
        >
        <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Subject</label>
        <input 
          v-model="form.subject" 
          type="text" 
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
          required
          placeholder="Subject"
        >
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Message</label>
        <textarea 
          v-model="form.message" 
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
          required
          placeholder="Write your message here..."
          rows="5"
        ></textarea>
      </div>
      <button 
        type="submit" 
        class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50"
      >
        Send Message
      </button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        subject: '',
        message: ''
      },
      errors: {}
    };
  },
  methods: {
    async submitForm() {
      this.errors = {};
      try {
        const response = await fetch('http://localhost:8000/api/contact', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(this.form)
        });
        const result = await response.json();
        if (response.ok) {
          alert('Message sent successfully!');
          this.form.name = '';
          this.form.email = '';
          this.form.subject = '';
          this.form.message = '';
        } else {
          this.errors = result.errors || { general: 'An error occurred' };
        }
      } catch (error) {
        alert('Error occurred: ' + error.message);
      }
    }
  }
};
</script>
