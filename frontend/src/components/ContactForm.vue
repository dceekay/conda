<template>
  <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-lg rounded-2xl p-10 max-w-lg w-full mx-auto transform transition-transform duration-500 ease-in-out hover:scale-105">
      <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-8">Contact Us</h1>
      <form @submit.prevent="submitForm" class="space-y-8">
        <FormInput
          id="name"
          label="Name"
          v-model="form.name"
          :error="v$.form.name.$error ? 'Name is required' : null"
          required
        />
        <FormInput
          id="email"
          label="Email"
          type="email"
          v-model="form.email"
          :error="v$.form.email.$error ? 'Invalid email' : null"
          required
        />
        <FormInput
          id="subject"
          label="Subject"
          v-model="form.subject"
          :error="v$.form.subject.$error ? 'Subject is required' : null"
          required
        />
        <div class="relative">
          <label for="message" class="block text-sm font-semibold text-gray-600">Message</label>
          <textarea
            id="message"
            v-model="form.message"
            class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out transform hover:scale-105"
            required
            placeholder="Write your message here..."
            rows="5"
          ></textarea>
          <span v-if="v$.form.message.$error" class="text-red-500 text-sm absolute mt-1">Message is required</span>
        </div>
        <button 
          type="submit" 
          :disabled="isSubmitting"
          class="relative w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-3 px-6 rounded-lg shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 disabled:opacity-50"
        >
          <span v-if="!isSubmitting">Send Message</span>
          <span v-else>
            <svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
          </span>
        </button>
        <div v-if="successMessage" class="bg-green-100 text-green-800 p-4 rounded-lg mt-4">
          {{ successMessage }}
        </div>
        <div v-if="errors.general" class="bg-red-100 text-red-800 p-4 rounded-lg mt-4">
          {{ errors.general }}
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { required, email } from '@vuelidate/validators'
import useVuelidate from '@vuelidate/core'
import FormInput from './FormInput.vue'

export default {
  components: { FormInput },
  data() {
    return {
      form: {
        name: '',
        email: '',
        subject: '',
        message: ''
      },
      errors: {},
      successMessage: '',
      isSubmitting: false
    };
  },
  validations() {
    return {
      form: {
        name: { required },
        email: { required, email },
        subject: { required },
        message: { required }
      }
    }
  },
  setup() {
    return { v$: useVuelidate() }
  },
  methods: {
    async submitForm() {
      this.successMessage = '';
      this.errors = {};
      this.isSubmitting = true;

      this.v$.$touch();
      if (this.v$.$invalid) {
        this.isSubmitting = false;
        return;
      }

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
          this.successMessage = 'Message sent successfully!';
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
      this.v$.$reset();
    }
  }
};
</script>
