<template>
  <div class="bg-white shadow-lg rounded-2xl p-10 max-w-lg mx-auto mt-16 transition-transform duration-500 ease-in-out transform hover:scale-105">
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-8">Contact Us</h1>
    <form @submit.prevent="submitForm" class="space-y-8">
      <div class="relative">
        <label class="block text-sm font-semibold text-gray-600">Name</label>
        <input 
          v-model="form.name" 
          type="text" 
          class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out transform hover:scale-105" 
          required
          placeholder="Your Name"
        >
        <span v-if="errors.name" class="text-red-500 text-sm absolute mt-1">{{ errors.name[0] }}</span>
      </div>
      <div class="relative">
        <label class="block text-sm font-semibold text-gray-600">Email</label>
        <input 
          v-model="form.email" 
          type="email" 
          class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out transform hover:scale-105" 
          required
          placeholder="you@example.com"
        >
        <span v-if="errors.email" class="text-red-500 text-sm absolute mt-1">{{ errors.email[0] }}</span>
      </div>
      <div class="relative">
        <label class="block text-sm font-semibold text-gray-600">Subject</label>
        <input 
          v-model="form.subject" 
          type="text" 
          class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out transform hover:scale-105" 
          required
          placeholder="Subject"
        >
        <span v-if="errors.subject" class="text-red-500 text-sm absolute mt-1">{{ errors.subject[0] }}</span>
      </div>
      <div class="relative">
        <label class="block text-sm font-semibold text-gray-600">Message</label>
        <textarea 
          v-model="form.message" 
          class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out transform hover:scale-105" 
          required
          placeholder="Write your message here..."
          rows="5"
        ></textarea>
        <span v-if="errors.message" class="text-red-500 text-sm absolute mt-1">{{ errors.message[0] }}</span>
      </div>
      <button 
        type="submit" 
        :disabled="isSubmitting"
        class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-3 px-6 rounded-lg shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 disabled:opacity-50"
      >
        {{ isSubmitting ? 'Sending...' : 'Send Message' }}
      </button>
      <div v-if="errors.general" class="text-red-500 text-sm mt-4 text-center">
        {{ errors.general }}
      </div>
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
      errors: {},
      isSubmitting: false
    };
  },
  methods: {
    async submitForm() {
      this.errors = {};
      this.isSubmitting = true;

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
          this.resetForm();
          alert('Message sent successfully!');  
        } else {
          this.errors = result.errors || { general: 'An error occurred' };
        }
      } catch (error) {
        this.errors.general = 'Error occurred: ' + error.message;
      } finally {
        this.isSubmitting = false;
      }
    },
    resetForm() {
      this.form.name = '';
      this.form.email = '';
      this.form.subject = '';
      this.form.message = '';
      this.errors = {};
    }
  }
};
</script>
